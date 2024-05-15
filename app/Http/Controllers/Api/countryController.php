<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class countryController extends Controller
{
    public function obtenerPaises()
    {
        $paises = Country::all();

        if($paises->isEmpty()){
            $data = [
                'message' => 'No se encontraron paises',
                'data' => [],
                'status' => 404
            ];

            return response()->json($data);
        }

        $data = [
            'message' => 'Paises encontrados',
            'data' => $paises,
            'status' => 200
        ];

        return response()->json($data);

    }
}
