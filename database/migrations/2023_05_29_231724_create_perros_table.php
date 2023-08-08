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
        Schema::create('perro', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',15);
            $table->string('foto',100)->nullable();;
            $table->string('descripcion',200)->nullable();
            $table->enum('sexo', ['macho', 'hembra']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perro');
    }
};
