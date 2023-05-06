<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Layanan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use DataTables;

class DaftarPengajuanController extends Controller
{
    public function index(Request $request, $layanan)
    {
        $layanan = Layanan::where('nama_layanan_slug', $layanan)->first();;
        if ($request->ajax()) {
            $relations = ['satpen', 'tendik'];
            if ($layanan->nama_layanan_slug == 'kenaikan-pangkat') {
                array_push($relations, 'golonganLama', 'golonganBaru');
            }

            if ($layanan->nama_layanan_slug == 'mutasi') {
                array_push($relations, 'satpenLama', 'satpenBaru');
            }

            $model = Pengajuan::where('layanan_id', $layanan->id)->with($relations);

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
        return view('pages.daftar-pengajuan.' . $layanan->nama_layanan_slug  . '.index', compact('layanan'));
    }

    public function proses(Request $request, $layanan, $pengajuan_id)
    {
        $layanan = Layanan::where('nama_layanan_slug', $layanan)->firstOrFail();
        $pengajuan = Pengajuan::findOrFail($pengajuan_id);
        $syaratLayanan = $layanan->persyaratan;
        $tendik = $pengajuan->tendik;
        $satpen = $pengajuan->satpen;

        $dataToView = [
            'layanan' => $layanan,
            'pengajuan' => $pengajuan,
            'syaratLayanan' => $syaratLayanan,
            'tendik' => $tendik,
            'satpen' => $satpen
        ];

        if ($layanan->nama_layanan_slug == 'kenaikan-pangkat') {
            $dataToView = array_merge($dataToView, [
                'golongan' => Golongan::all()
            ]);
        }

        return view('pages.daftar-pengajuan.' . $layanan->nama_layanan_slug  . '.proses')->with($dataToView);
    }

    public function storeProses(Request $request, $layanan, $pengajuan_id)
    {
        $layanan = Layanan::where('nama_layanan_slug', $layanan)->firstOrFail();
        $pengajuan = Pengajuan::findOrFail($pengajuan_id);

        $updatedData = [
            "keterangan" => $request->keterangan,
            "dokumen_sk" => $request->dokumen_sk,
            "status" => $request->status,
        ];

        if ($layanan->nama_layanan_slug == 'izin-memimpin') {
            $updatedData = array_merge($updatedData, [
                "tanggal_terbit" => $request->tanggal_terbit,
                "tanggal_selesai" => $request->tanggal_selesai,
            ]);
            $pengajuan->update($updatedData);
        }

        if ($layanan->nama_layanan_slug == 'kenaikan-pangkat') {
            $updatedData = array_merge($updatedData, [
                "golongan_lama" => $request->golongan_lama,
                "golongan_baru" => $request->golongan_baru,
            ]);
            $pengajuan->update($updatedData);
        }

        if ($layanan->nama_layanan_slug == 'mutasi') {
            $updatedData = array_merge($updatedData, [
                "satpen_lama" => $request->satpen_lama,
                "satpen_baru" => $request->satpen_baru,
            ]);
            $pengajuan->update($updatedData);
        }

        $pengajuan->syarat()->sync($request->persyaratan_id);

        return redirect()->route('daftar.pengajuan.index', $layanan->nama_layanan_slug);
    }
}
