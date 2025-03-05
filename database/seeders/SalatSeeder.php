<?php

namespace Database\Seeders;

use App\Models\Salat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = array(
            [
                'name' => 'ফজর',
                'faraj_rakat' => 2,
                'position' => 1,
            ],
            [
                'name' => 'যোহর',
                'faraj_rakat' => 4,
                'position' => 2,
            ],
            [
                'name' => 'আসর',
                'faraj_rakat' => 4,
                'position' => 4,
            ],
            [
                'name' => 'মাগরিব',
                'faraj_rakat' => 3,
                'position' => 5,
            ],
            [
                'name' => 'ইশা',
                'faraj_rakat' => 4,
                'position' => 6,
            ],
            [
                'name' => "জুম'আ",
                'faraj_rakat' => 2,
                'position' => 3,
            ],
        );

        collect($data)->each(function ($row) {
            Salat::updateOrCreate(['name' => $row['name']],$row);
        });
    }
}
