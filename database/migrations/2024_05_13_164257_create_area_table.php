<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('area', function (Blueprint $table) {
            $table->id();
            $table->enum('area', ['ADMINISTRACIÓN', 'FINANCIERA', 'COMPRAS', 'INFRAESTRUCTURA', 'OPERACIÓN', 'TALENTO HUMANO', 'SERVICIO VARIOS', 'ENTRE OTROS'])->nullable(false)->unique();
            $table->timestamps();
        });

        DB::table('area')->insert([
            ['area' => 'Administración'],
            ['area' => 'Financiera'],
            ['area' => 'Compras'],
            ['area' => 'Infraestructura'],
            ['area' => 'Operación'],
            ['area' => 'Talento humano'],
            ['area' => 'Servicio varios'],
            ['area' => 'Entre otros'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area');
    }
};
