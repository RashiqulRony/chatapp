<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 100; $i++) {
            User::create([
                'name' => 'User '.$i,
                'email' => 'user'.$i.'@gmail.com',
                'password' => bcrypt(12345678),
                'email_verified_at' => now()
            ]);
        }
    }
}
