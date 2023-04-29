<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@oven.com',
            'password' => Hash::make('123456'),
        ]);
        
        Todo::Create([
            'name' => 'Doing something important',
            'execution_time' => '2023-04-28 20:38:00',
            'user_id' => $admin->id
        ]);
        Todo::Create([
            'name' => 'Save the world',
            'execution_time' => '2023-04-29 08:38:00',
            'user_id' => $admin->id
        ]);
    }
}
