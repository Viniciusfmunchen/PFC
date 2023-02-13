<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Dragon Ball',
            'synopsis' => 'Goku é um jovem de outro mundo que se une a seus amigos para coletar as sete esferas do dragão e desejar qualquer coisa que quiserem. Eles enfrentam muitos adversários poderosos e desafiantes em sua jornada.',
            'release_date' => '1984-12-08',
            'chapters' => 519,
            'volumes' => 42,
            'producer' => '',
            'author' => 'Akira Toriyama',
            'image' => '',
            'type' => 'manga',
        ];

    }
}
