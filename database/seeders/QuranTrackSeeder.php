<?php

namespace Database\Seeders;

use App\Models\QuranTrack;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuranTrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           $users = User::inRandomOrder()->take(30)->get();

           foreach ($users as $user) {
              QuranTrack::create([
                   'user_id' => $user->id,
                   'ayat' => rand(1, 200),
                   'page' => rand(1, 100),
                   'para' => rand(1, 2),
                   'created_at' => now(),
                   'updated_at' => now(),
               ]);
           }
    }
}
