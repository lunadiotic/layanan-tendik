<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Layanan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class PengajuanController extends Controller
{
    public function index(Request $request, $layanan)
    {
        $layanan = Layanan::where('nama_layanan_slug', $layanan)->first();
        $tendik = Auth::user()->tendik;
        if ($request->ajax()) {
            $relations = ['satpen'];
            if ($layanan->nama_layanan_slug == 'kenaikan-pangkat') {
                array_push($relations, 'golonganLama', 'golonganBaru');
            }
            if ($layanan->nama_layanan_slug == 'mutasi') {
                array_push($relations, 'satpenLama', 'satpenBaru');
            }
            $model = $tendik->pengajuan()->where('layanan_id', $layanan->id)->with($relations);
            return DataTables::of($model)
                ->addColumn('action', function ($model) {
                    if ($model->status == 'revisi') {
                        return view('layouts.partials._action', [
                            'model' => $model,
                            'url_edit' => route('pengajuan.edit', [$model->layanan->nama_layanan_slug, $model->id]),
                        ]);
                    }
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.pengajuan.' . $layanan->nama_layanan_slug . '.index', compact('layanan', 'tendik'));
    }

    public function create($layanan)
    {
        $layanan = Layanan::where('nama_layanan_slug', $layanan)->first();

        $dataToView = [
            'layanan' => $layanan
        ];

        if ($layanan->nama_layanan_slug == 'kenaikan-pangkat') {
            $dataToView = array_merge($dataToView, [
                'golongan' => Golongan::all()
            ]);
        }

        return view('pages.pengajuan.' . $layanan->nama_layanan_slug . '.create')->with($dataToView);
    }

    public function store(Request $request, $layanan)
    {
        $layanan = Layanan::where('nama_layanan_slug', $layanan)->first();
        $tendik = Auth::user()->tendik;
        $inputData = [
            'layanan_id' => $layanan->id,
            'dokumen_persyaratan' => $request->dokumen_persyaratan,
        ];

        if ($layanan->nama_layanan_slug == 'izin-memimpin') {
            $inputData = array_merge($inputData, [
                'satpen_id' => $request->satpen_id
            ]);
        }

        if ($layanan->nama_layanan_slug == 'kenaikan-pangkat') {
            $inputData = array_merge($inputData, [
                'golongan_lama' => $request->golongan_lama,
                'golongan_baru' => $request->golongan_baru,
                'satpen_id' => $request->satpen_id
            ]);
        }

        if ($layanan->nama_layanan_slug == 'mutasi') {
            $inputData = array_merge($inputData, [
                'satpen_lama' => $request->satpen_lama,
                'satpen_baru' => $request->satpen_baru,
            ]);
        }

        $tendik->pengajuan()->create($inputData);

        return redirect()->route('pengajuan.index', $layanan->nama_layanan_slug);
    }

    public function edit($layanan, $id)
    {
        $layanan = Layanan::where('nama_layanan_slug', $layanan)->first();
        $pengajuan = Pengajuan::findOrFail($id);

        $dataToView = [
            'layanan' => $layanan,
            'pengajuan' => $pengajuan
        ];

        if ($layanan->nama_layanan_slug == 'kenaikan-pangkat') {
            $dataToView = array_merge($dataToView, [
                'golongan' => Golongan::all()
            ]);
        }

        return view('pages.pengajuan.' . $layanan->nama_layanan_slug . '.edit')->with($dataToView);
    }

    public function update(Request $request, $layanan, $id)
    {
        $layanan = Layanan::where('nama_layanan_slug', $layanan)->first();
        $pengajuan = Pengajuan::findOrFail($id);

        $inputData = [
            'layanan_id' => $layanan->id,
            'dokumen_persyaratan' => $request->dokumen_persyaratan,
            'status' => 'menunggu'
        ];

        if ($layanan->nama_layanan_slug == 'izin-memimpin') {
            $inputData = array_merge($inputData, [
                'satpen_id' => $request->satpen_id
            ]);
        }

        if ($layanan->nama_layanan_slug == 'kenaikan-pangkat') {
            $inputData = array_merge($inputData, [
                'golongan_lama' => $request->golongan_lama,
                'golongan_baru' => $request->golongan_baru,
                'satpen_id' => $request->satpen_id
            ]);
        }

        if ($layanan->nama_layanan_slug == 'mutasi') {
            $inputData = array_merge($inputData, [
                'satpen_lama' => $request->satpen_lama,
                'satpen_baru' => $request->satpen_baru,
            ]);
        }

        $pengajuan->update($inputData);

        return redirect()->route('pengajuan.index', $layanan->nama_layanan_slug);
    }
}
