<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name' => 'Admin 1',
        'username' => 'admin1',
        'password' => Hash::make('password'),
        'role' => 'admin'
    ]);

    User::create([
        'name' => 'Owner 1',
        'username' => 'owner1',
        'password' => Hash::make('password'),
        'role' => 'owner'
    ]);
    }
}
