<?php

namespace Database\Seeders;

use App\Models\Tweet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tweet::create([
            'content' => 'Esto es el tweet del admin',
            'user_id' => 1,
            
        ]);
        Tweet::create([
            'content' => 'Esto es el tweet de Carlos',
            'user_id' => 2,
            
        ]);
        Tweet::factory()
        ->count(100)
        ->create();

        Tweet::factory()
        ->count(50)
        ->reply()
        ->create();
    }
}
