<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Salat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalatUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::inRandomOrder()->take(30)->get();
        $salats = Salat::all();

        foreach ($users as $user) {
            foreach ($salats as $salat) {
                DB::table('salat_user')->insert([
                    'user_id' => $user->id,
                    'salat_id' => $salat->id,
                    'sunnah_rakat' => rand(0, 9), // Example: Random sunnah rakat value (0, 1, or 2)
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
