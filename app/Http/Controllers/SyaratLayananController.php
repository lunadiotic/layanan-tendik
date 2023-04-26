<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use DataTables;

class SyaratLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);
        if ($request->ajax()) {
            $model = $layanan->persyaratan();
            return DataTables::of($model)
                ->addColumn('action', function ($model) use ($layanan) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'url_edit' => route('layanan.syarat.edit', [$layanan->id, $model->id]),
                        'url_destroy' => route('layanan.syarat.destroy', [$layanan->id, $model->id])
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.persyaratan-layanan.index', compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('pages.persyaratan-layanan.create', compact('layanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->persyaratan()->create($request->all());
        return redirect()->route('layanan.syarat.index', $layanan->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $idLayanan, string $idSyarat)
    {
        $layanan = Layanan::findOrFail($idLayanan);
        $syarat = $layanan->persyaratan()->findOrFail($idSyarat);
        return view('pages.persyaratan-layanan.edit', compact('layanan', 'syarat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idLayanan, string $idSyarat)
    {
        $layanan = Layanan::findOrFail($idLayanan);
        $syarat = $layanan->persyaratan()->findOrFail($idSyarat);
        $syarat->update($request->all());
        return redirect()->route('layanan.syarat.index', $layanan->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idLayanan, string $idSyarat)
    {
        $layanan = Layanan::findOrFail($idLayanan);
        $syarat = $layanan->persyaratan()->findOrFail($idSyarat);
        $syarat->delete();
        return redirect()->route('layanan.syarat.index', $layanan->id);
    }
}
