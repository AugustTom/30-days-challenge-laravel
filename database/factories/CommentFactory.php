<?php

namespace Database\Factories;

use App\Models\Challenge;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'user_id' => User::all()->random()->id,
            'challenge_id' => Challenge::all()->random()->id,
        ];
    }
}
