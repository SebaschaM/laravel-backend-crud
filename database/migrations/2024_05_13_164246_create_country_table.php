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
        Schema::create('country', function (Blueprint $table) {
            $table->id();
            $table->enum('pais_empleo', ['Colombia', 'Estados Unidos'])->nullable(false);
            $table->timestamps();
        });
        DB::table('country')->insert([
            ['pais_empleo' => 'colombia'],
            ['pais_empleo' => 'estados unidos'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country');
    }
};
