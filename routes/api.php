<?php

use App\Http\Controllers\Api\areaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\employeeController;
use App\Http\Controllers\Api\countryController;
use App\Http\Controllers\Api\identificationController;

//ÁREA
Route::get('/areas', [areaController::class, 'obtenerAreas']);

//TIPO IDENTIFICACION
Route::get('/identifications', [identificationController::class, 'obtenerTiposIdentificaciones']);

//PAIS
Route::get('/countries', [countryController::class, 'obtenerPaises']);

//EMPLOYEES
Route::get('/employees/pagination/{page}', [EmployeeController::class, 'obtenerEmpleados']);

Route::post('/employees', [EmployeeController::class, 'agregarEmpleado']);

Route::get('/employees/{id}', [EmployeeController::class, 'obtenerEmpleadoId']);

Route::post('/verify-email', [EmployeeController::class, 'verificarCorreoDuplicado']);

Route::delete('/employees/{id}', [EmployeeController::class, 'eliminarEmpleadoId']);

Route::put('/employees/{id}',[EmployeeController::class, 'actualizarEmpleadoId']);
