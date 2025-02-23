<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Llamar a otros seeders aquí
        $this->call([
            UserSeeder::class,
            TweetSeeder::class,
            // Agrega más seeders si es necesario
        ]);
    }
}
