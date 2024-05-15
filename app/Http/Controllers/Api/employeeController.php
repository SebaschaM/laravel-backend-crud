<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class employeeController extends Controller
{
    public function obtenerEmpleados()
    {
        $empleados = Employee::with('area', 'country', 'identification')->get();

        if ($empleados->isEmpty()) {
            $data = [
                'message' => 'No se encontraron empleados',
                'data' => [],
                'status' => 404
            ];

            return response()->json($data);
        }

        $data = [
            'message' => 'Empleados encontrados',
            'data' => $empleados,
            'status' => 200
        ];

        return response()->json($data);
    }

    public function agregarEmpleado(Request $request)
    {
        $validator = Validator::make($request->all(), Employee::$rules);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error al validar los datos',
                'data' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }
        $empleado = Employee::create(array_merge($request->all(), ['fecha_registro' => now()]));

        if (!$empleado->save()) {
            $data = [
                'message' => 'Error al guardar el empleado',
                'status' => 500
            ];

            return response()->json($data, 500);
        }

        $data = [
            'message' => 'Empleado creado',
            'data' => $empleado
        ];

        return response()->json($data);
    }

    public function obtenerEmpleadoId($id)
    {
        $empleado = Employee::find($id);

        if (!$empleado) {
            $data = [
                'message' => 'Empleado no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Empleado encontrado',
            'data' => $empleado,
            'status' => 200
        ];

        return response()->json($data);
    }

    public function verificarCorreoDuplicado(Request $request)
    {
        $correo = $request->correo_electronico;
        $empleado = Employee::where('correo_electronico', $correo)->first();

        if ($empleado) {
            $data = [
                'message' => 'Correo duplicado',
                'duplicate' => 'true',
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        $data = [
            'message' => 'Correo no duplicado',
            'duplicate' => 'false',
            'status' => 200
        ];

        return response()->json($data);
    }

    public function eliminarEmpleadoId($id)
    {
        $empleado = Employee::find($id);

        if (!$empleado) {
            $data = [
                'message' => 'Empleado no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        if (!$empleado->delete()) {
            $data = [
                'message' => 'Error al eliminar el empleado',
                'status' => 500
            ];

            return response()->json($data, 500);
        }

        $data = [
            'message' => 'Empleado eliminado',
            'status' => 200
        ];

        return response()->json($data);
    }
}
