<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class areaController extends Controller
{
    public function obtenerAreas()
    {
        $areas = Area::all();

        if ($areas->isEmpty()) {
            $data = [
                'message' => 'No se encontraron áreas',
                'data' => [],
                'status' => 404
            ];

            return response()->json($data);
        }

        $data = [
            'message' => 'Áreas encontradas',
            'data' => $areas,
            'status' => 200
        ];

        return response()->json($data);
    }
}
