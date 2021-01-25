<?php

namespace Database\Factories;

use App\Models\Challenge;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChallengeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Challenge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = Carbon::now();
        return [
            'text' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'user_id' => User::all()->random()->id,
            'start_date'=>$date->toDateString(),
            'end_date' => $date->addDays(30)->toDateString(),
        ];
    }
}
