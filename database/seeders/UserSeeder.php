<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(['login' => 'test'], [
            'first_name' => 'User',
            'last_name' => 'User',
            'login' => 'test',
            'birthday' => '1990-01-01',
            'password' => '12345678',
        ]);
    }
}
