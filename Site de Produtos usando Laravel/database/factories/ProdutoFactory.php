<?php

namespace Database\Factories;

use \App\Models\Categorias;
use \App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   $nome = $this->faker->unique()->sentence();
        return [
            //SLUG: URL
            'Nome' => $nome,
            'Descrição' => $this->faker->paragraph(),
            'Preço' => $this->faker->randomNumber(2),
            'Slug' => Str::Slug($nome),
            'imagem' => $this->faker->imageUrl(400, 400),
            'id_user' => User::pluck('id')->random(),
            'id_categoria' => Categorias::pluck('id')->random(),
        ];
    }
}
