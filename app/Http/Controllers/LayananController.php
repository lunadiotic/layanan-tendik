<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use DataTables;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Layanan::query();
            return DataTables::of($model)
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'url_show' => route('layanan.show', $model->id),
                        'url_edit' => route('layanan.edit', $model->id),
                        'url_destroy' => route('layanan.destroy', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.layanan.index');
    }
}