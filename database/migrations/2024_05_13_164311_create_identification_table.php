<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('identification', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_identificacion', ['CÉDULA DE CIUDADANÍA', 'CÉDULA DE EXTRANJERÍA', 'PASAPORTE', 'PERMISO ESPECIAL'])->nullable(false);
            $table->timestamps();
        });

        DB::table('identification')->insert([
            ['tipo_identificacion' => 'Cédula de ciudadanía'],
            ['tipo_identificacion' => 'Cédula de extranjería'],
            ['tipo_identificacion' => 'Pasaporte'],
            ['tipo_identificacion' => 'Permiso especial'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identification');
    }
};
