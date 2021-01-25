<?php

namespace Database\Factories;

use App\Models\Challenge;
use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'challenge_id'   => Challenge::all()->random()->id,
            'user_id'   => User::all()->random()->id,
        ];
    }
}
