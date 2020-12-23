<?php

namespace Database\Seeders;

use App\Models\Challenge;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user -> name = 'admin';
        $user -> email = 'admin@admin';
        $user -> email = 'admin@admin';
        $user -> is_admin = true;
        $user -> password = Hash::make('admin');
        $user -> save();
        User::factory(5)->create();

    }
}
