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
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'user_photo' => 'https://res.cloudinary.com/meigemn/image/upload/v1739475926/2288-C_Jackson_Custom_Shop_Randy_Rhoads_Pinstripe_with_Concorde_Features_U20926_2_grande_iikn2i.jpg',
            'password' => Hash::make('admin'), // Contraseña: "password"
            'role' => 'admin',
            'email_verified_at' => now()
        ]);
        User::create([
            'name' => 'carlos',
            'email' => 'carlos@gmail.com',
            'user_photo' => 'https://res.cloudinary.com/meigemn/image/upload/v1739475926/2288-C_Jackson_Custom_Shop_Randy_Rhoads_Pinstripe_with_Concorde_Features_U20926_2_grande_iikn2i.jpg',
            'password' => Hash::make('1234'), // Contraseña: "password"
            'role' => 'user',
            'email_verified_at' => now()
        ]);

        User::factory()
        ->count(10)
        ->create();
    }
}
