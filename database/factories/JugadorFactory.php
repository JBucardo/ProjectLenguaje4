<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\equipo; // <-- ¡No olvides importar!

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jugador>
 */
class JugadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    
    {
        // Generar el sexo primero
        $genero = $this->faker->randomElement(['masculino', 'femenino']);
        return [
            'nombre' => $genero === 'masculino' 
                ? $this->faker->firstNameMale()  // Nombre masculino
                : $this->faker->firstNameFemale(), // Nombre femenino
            'genero' => $genero,  // Guardar el sexo
            'edad' => $this->faker->numberBetween(19, 40), // Edad entre 19 y 40
            'nacionalidad' => $this->faker->country(),
            'equipo_id' => equipo::factory(), // Crea automáticamente un usuario válido

            
        ];
    }
}
