<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use DataTables;

class PersyaratanLayanan extends Controller
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
                        'url_show' => route('layanan.syarat.show', [$layanan->id, $model->id]),
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}