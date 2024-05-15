<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function identification()
    {
        return $this->hasOne(Identification::class, 'id', 'identification_id');
    }

    public function area()
    {
        return $this->hasOne(Area::class, 'id', 'area_id');
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    const CREATED_AT = 'fecha_registro';
    const UPDATED_AT = null;

    protected $table = "employee";

    protected $fillable = [
        'primer_nombre',
        'primer_apellido',
        'segundo_apellido',
        'otros_nombres',
        'area_id',
        'country_id',
        'identification_id',
        'numero_identificacion',
        'estado',
        'correo_electronico',
        'fecha_ingreso',
        'fecha_registro',
        'fecha_modificacion',
    ];

    public static $rules = [
        'primer_nombre' => 'required|string|max:20',
        'primer_apellido' => 'required|string|max:20',
        'segundo_apellido' => 'required|string|max:20',
        'otros_nombres' => 'nullable|string|max:50',
        'area_id' => 'required|exists:area,id',
        'country_id' => 'required|exists:country,id',
        'identification_id' => 'required|exists:identification,id',
        'numero_identificacion' => 'required|regex:/^[a-zA-Z0-9]+$/|max:20|unique:employee',
        'estado' => 'required|in:ACTIVO',
        'correo_electronico' => 'nullable|email|max:300|unique:employee',
        'fecha_ingreso' => 'required|date',
        'fecha_registro' => 'nullable|date',
        'fecha_modificacion' => 'nullable|date',
    ];
}
