<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Satpen;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    public function selectSatpen(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = Satpen::select("id", "nama_satpen")
                ->where('nama_satpen', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }

    public function selectGolongan()
    {
        $data = Golongan::all();
        return response()->json($data);
    }
}