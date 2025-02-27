<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(30)->create();

       $admin = User::factory()->create([
            'name' => 'Anowar Hosen',
            'email' => 'anowarhosensoft@gmail.com',
            'password' => Hash::make('87654321'),
            'gender' => 'male',
            'age' => 27,
        ]);

        $admin->forceFill(['is_admin' => true]);
        $admin->save();

        User::factory()->create([
            'name' => 'Jony Islam',
            'email' => 'jony@gmail.com',
            'password' => Hash::make('87654321'),
            'gender' => 'male',
            'age' => 27,
        ]);
    }
}
