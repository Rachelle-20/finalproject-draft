<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
public function run()
    {
User::create(['username' => 'user1', 'password' => bcrypt('password')]);
User::create(['username' => 'user2', 'password' => bcrypt('password')]);
User::create(['username' => 'user3', 'password' => bcrypt('password')]);
User::create(['username' => 'user4', 'password' => bcrypt('password')]);
User::create(['username' => 'user5', 'password' => bcrypt('password')]);
    }
}
