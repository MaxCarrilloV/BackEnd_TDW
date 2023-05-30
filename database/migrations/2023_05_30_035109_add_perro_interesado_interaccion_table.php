<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('interaccion', function (Blueprint $table) {
            $table->unsignedBigInteger('perro_interesado_id');
            $table->foreign('perro_interesado_id')->references('id')->on('perro');
        });
    }


    public function down(): void
    {
        Schema::table('interaccion', function (Blueprint $table) {
            $table->dropForeign('perro_interesado_id');
        });
    }
};
