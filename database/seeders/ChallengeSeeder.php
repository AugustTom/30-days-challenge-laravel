<?php

namespace Database\Seeders;

use App\Models\Challenge;
use App\Models\User;
use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Challenge::factory(10)->create();
//        foreach (Challenge::all() as $challenge){
//            $user = User::inRandomOrder()->take(rand(1,User::count()))->pluck('id');
//            $challenge->participants()->attach($user);
//        }
    }
}
