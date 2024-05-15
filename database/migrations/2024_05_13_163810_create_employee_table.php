<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('primer_apellido', 20)->nullable(false);
            $table->string('segundo_apellido', 20)->nullable(false);
            $table->string('primer_nombre', 20)->nullable(false);
            $table->string('otros_nombres', 50)->nullable(false);
            $table->string('numero_identificacion', 20)->nullable(false)->unique();
            $table->enum('estado', ['ACTIVO'])->nullable(false);
            $table->string('correo_electronico', 300)->unique()->nullable(false);
            $table->dateTime('fecha_ingreso')->format('d/m/Y H:i:s')->nullable(false);
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('identification_id');
            $table->timestamp('fecha_registro')->useCurrent()->format('d/m/Y H:i:s')->nullable(false);
            $table->timestamp('fecha_modificacion')->nullable()->format('d/m/Y H:i:s');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
