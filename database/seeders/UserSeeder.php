<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create([
            'name' => 'Admin',
            'email' => 'raouf@admin.com',
            'password' => 'password',
            'is_admin'=>1
        ]);
        User::Create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
            'is_admin'=>1
        ]);
    }
}
