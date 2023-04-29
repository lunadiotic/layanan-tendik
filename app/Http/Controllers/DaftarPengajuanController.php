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
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.daftar-pengajuan.index', compact('layanan'));
    }
}