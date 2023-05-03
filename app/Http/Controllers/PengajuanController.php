<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
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
            $model = $tendik->pengajuan()->where('layanan_id', $layanan->id)->with(['satpen']);
            return DataTables::of($model)
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.pengajuan.' . $layanan->nama_layanan_slug . '.index', compact('layanan', 'tendik'));
    }

    public function create($layanan)
    {
        $layanan = Layanan::where('nama_layanan_slug', $layanan)->first();
        return view('pages.pengajuan.' . $layanan->nama_layanan_slug . '.create', compact('layanan'));
    }

    public function store(Request $request, $layanan)
    {
        $layanan = Layanan::where('nama_layanan_slug', $layanan)->first();
        $tendik = Auth::user()->tendik;
        $tendik->pengajuan()->create([
            'layanan_id' => $layanan->id,
            'satpen_id' => $request->satpen_id,
            'dokumen_persyaratan' => $request->dokumen_persyaratan,
        ]);

        return redirect()->route('pengajuan.index', $layanan->nama_layanan_slug);
    }
}