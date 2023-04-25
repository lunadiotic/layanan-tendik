<?php

namespace App\Http\Controllers;

use App\Models\Satpen;
use Illuminate\Http\Request;
use DataTables;

class SatpenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Satpen::query();
            return DataTables::of($model)
                ->addColumn('action', function ($model) {
                    return view('layouts.partials._action', [
                        'model' => $model,
                        'url_edit' => route('satpen.edit', $model->id),
                        'url_destroy' => route('satpen.destroy', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.satpen.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.satpen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Satpen::create($request->all());
        return redirect()->route('satpen.index');
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
        $satpen = Satpen::findOrFail($id);
        return view('pages.satpen.edit', compact('satpen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $satpen = Satpen::findOrFail($id);
        $satpen->update($request->all());
        return redirect()->route('satpen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}