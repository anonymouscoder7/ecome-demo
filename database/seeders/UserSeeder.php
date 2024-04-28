<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('password');
        $admin->role = 'admin';
        $admin->save();

        $user = new User();
        $user->name = 'user';
        $user->email = 'user@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
    }
}
