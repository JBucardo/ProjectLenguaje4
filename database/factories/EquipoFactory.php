<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User; // <-- ¡No olvides importar!

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\equipo>
 */
class EquipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->state() , // nombre de equipo ficticio
            'disciplina' => $this->faker->randomElement(['futbol', 'voleibol', 'baloncesto']), // una de las 3 disciplinas
            'fecha_creacion' => $this->faker->date(), // fecha aleatoria
            'sede' => $this->faker->cityPrefix() , 
         'user_id' => User::factory(), // Crea automáticamente un usuario válido

        ];
    }
}
