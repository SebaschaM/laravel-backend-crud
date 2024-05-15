<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Identification;
use Illuminate\Http\Request;

class identificationController extends Controller
{
    public function obtenerTiposIdentificaciones (){
        $identificacion = Identification::all();

        if ($identificacion->isEmpty()) {
            $data = [
                'message' => 'No se encontraron identificaciones',
                'data' => [],
                'status' => 404
            ];

            return response()->json($data);
        }

        $data = [
            'message' => 'Identificaciones encontradas',
            'data' => $identificacion,
            'status' => 200
        ];

        return response()->json($data);
    }
}
