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
        return view('pages.pengajuan.index', compact('layanan', 'tendik'));
    }
}
