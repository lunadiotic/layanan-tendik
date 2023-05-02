<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use DataTables;

class DaftarPengajuanController extends Controller
{
    public function index(Request $request, $layanan)
    {
        $layanan = Layanan::where('nama_layanan_slug', $layanan)->first();
        if ($request->ajax()) {
            $model = Pengajuan::where('layanan_id', $layanan->id)->with(['satpen', 'tendik']);
            return DataTables::of($model)
                ->addColumn('action', function ($model) use ($layanan) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'buttons' => [
                            [
                                'url' => route('daftar.pengajuan.proses', [$layanan->nama_layanan_slug, $model->id]),
                                'title' => 'Proses',
                                'color' => 'info',

                            ]
                        ]
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.daftar-pengajuan.index', compact('layanan'));
    }

    public function proses(Request $request, $layanan, $pengajuan_id)
    {
        $layanan = Layanan::where('nama_layanan_slug', $layanan)->firstOrFail();
        $pengajuan = Pengajuan::findOrFail($pengajuan_id);
        $syaratLayanan = $layanan->persyaratan;
        $tendik = $pengajuan->tendik;
        $satpen = $pengajuan->satpen;

        return view('pages.daftar-pengajuan.proses', compact('layanan', 'pengajuan', 'syaratLayanan', 'tendik', 'satpen'));
    }

    public function storeProses(Request $request, $layanan, $pengajuan_id)
    {
        $layanan = Layanan::where('nama_layanan_slug', $layanan)->firstOrFail();
        $pengajuan = Pengajuan::findOrFail($pengajuan_id);

        $pengajuan->update([
            "tanggal_terbit" => $request->tanggal_terbit,
            "tanggal_selesai" => $request->tanggal_selesai,
            "keterangan" => $request->keterangan,
            "dokumen_sk" => $request->dokumen_sk,
            "status" => $request->status,
        ]);

        $pengajuan->syarat()->sync($request->persyaratan_id);

        return redirect()->route('daftar.pengajuan.index', $layanan->nama_layanan_slug);
    }
}
