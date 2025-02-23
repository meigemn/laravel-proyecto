<?php

namespace Database\Factories;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    protected $model = Tweet::class;
    public function definition(): array
    {
        return [
            'content' => $this->faker->realText(280), // Texto de hasta 280 caracteres
            'user_id' => User::inRandomOrder()->first()->id, // Usuario existente aleatorio
            'tweet_id' => null, // Valor por defecto (tweet principal)
            
        ];
    }
    public function reply()
    {
        return $this->state(function (array $attributes) {
            return [
                'tweet_id' => \App\Models\Tweet::inRandomOrder()->first()->id
            ];
        });
    }

}