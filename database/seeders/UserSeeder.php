<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'role_id' => Role::where('slug', 'admin')->first()->id,
            'name' => 'Habibur Rahaman',
            'email' => 'admin@demo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'status' => true,
            'remember_token' => Str::random(10),
        ]);
        User::updateOrCreate([
            'role_id' => Role::where('slug', 'user')->first()->id,
            'name' => 'User',
            'email' => 'user@demo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'status' => false,
            'remember_token' => Str::random(10),
        ]);
    }
}
