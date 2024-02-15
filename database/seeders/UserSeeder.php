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
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::create([
            'name' => 'Jaider Quimbaya',
            'email' => 'superadmin@bolsaTalentum.net',
            'password' => Hash::make('superadmin123456') 
        ]);

        $super_admin->assignRole('Super Administrator');

        $admin = User::create([
            'name' => 'michael Laiton',
            'email' => 'admin@bolsaTalentum.net',
            'password' => Hash::make('admin1234567') 
        ]);

        $admin->assignRole('Administrator');
    }
}