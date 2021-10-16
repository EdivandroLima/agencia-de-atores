<?php

namespace Database\Factories;

use App\Models\Ator;
use Illuminate\Database\Eloquent\Factories\Factory;

class AtorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ator::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'altura' => '1,66m',
            'peso' => $this->faker->numberBetween(55, 100) . 'kg',
            'manequim' => '/imagens/img3.jpg',
            'sexo' => $this->faker->randomElement(['Masculino', 'Feminino']),
            'data_nasc' => $this->faker->date('Y-m-d', '2005-01-01'),
            'sapato' => $this->faker->numberBetween(35, 40),
            'pele' => $this->faker->randomElement(['Branca', 'Parda', 'Preta', 'Amarela']),
            'olhos' => 'Castanho',
            'cabelo' => 'Pretos',
            'video' => 'http://video.com',
        ];
    }
}
