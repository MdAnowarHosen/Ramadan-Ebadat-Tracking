<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
                'name' => 'সকালের যিকর',
            ],
            [
                'name' => 'সন্ধ্যার যিকর',
            ],
            [
                'name' => 'দান-সাদাকা',
            ],
            [
                'name' => 'দিনের কাজ',
            ],
            [
                'name' => 'কমপক্ষ্যে ৭০ বার ইস্তেগফার',
            ],
            [
                'name' => 'কুরআন তিলাওয়াত ও তাদাব্বুর',
            ],
            [
                'name' => 'ঘুমের পূর্বের যিকর',
            ],
            [
                'name' => "দিনের দু'আ মুখস্থ",
            ],
            [
                'name' => 'আল্লাহর নাম মুখস্থ',
            ],

            [
                'name' => 'জামাআতে সালাত আদায়',
            ],
            [
                'name' => 'নতুন কিছু শেখা',
            ],
            [
                'name' => 'দিনের হাদীস',
            ],
        );

        collect($data)->each(function ($row) {
            Task::updateOrCreate(['name' => $row['name']],$row);
        });
    }
}
