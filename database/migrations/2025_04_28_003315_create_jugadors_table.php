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
        Schema::create('jugadors', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 30);
        $table->enum('genero', ['masculino', 'femenino']);
        $table->integer('edad');
        $table->string('nacionalidad', 60);
        $table->unsignedBigInteger('equipo_id');

        // Clave foránea
        $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadors');
    }
};
