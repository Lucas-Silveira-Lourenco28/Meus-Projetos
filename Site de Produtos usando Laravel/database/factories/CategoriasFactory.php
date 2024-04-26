<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoriasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //faker vai gerar registros falsos de forma automatica
            // Word vai gerar um nome
            'Nome' => $this->faker->unique()->word,
            'Descrição' => $this->faker->randomNumber(2),
        ];
    }
}
