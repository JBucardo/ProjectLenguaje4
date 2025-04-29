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
        Schema::create('equipos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 20); // nombre del equipo
        $table->enum('disciplina', ['futbol', 'voleibol', 'baloncesto']); // solo permite esas opciones
        $table->date('fecha_creacion'); // fecha de creación
        $table->string('sede', 30); // sede o clave de sede

        $table->unsignedBigInteger('user_id'); // clave foránea a users
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // relación

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
