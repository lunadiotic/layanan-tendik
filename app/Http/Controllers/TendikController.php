<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Satpen;
use App\Models\Tendik;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class TendikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Tendik::with(['satpen', 'golongan']);
            return DataTables::of($model)
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'url_edit' => route('tendik.edit', $model->id),
                        'url_destroy' => route('tendik.destroy', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.tendik.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $golongan = Golongan::pluck('nama_golongan', 'id');
        $satpen = Satpen::pluck('nama_satpen', 'id');
        return view('pages.tendik.create', compact('golongan', 'satpen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tendik::create($request->all());
        return redirect()->route('tendik.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tendik = Tendik::findOrFail($id);
        $golongan = Golongan::pluck('nama_golongan', 'id');
        $satpen = Satpen::pluck('nama_satpen', 'id');
        return view('pages.tendik.edit', compact('tendik', 'golongan', 'satpen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tendik = Tendik::findOrFail($id);
        $user = User::where('nip', $tendik->nip)->firstOrFail();
        $user->update([
            'nip' => $request->nip
        ]);
        $tendik->update($request->all());
        return redirect()->route('tendik.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tendik = Tendik::findOrFail($id);
        $tendik->delete();
        return redirect()->route('tendik.index');
    }
}