<?php

namespace Database\Seeders;

use App\Models\Disaster;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


    public function run()
    {
        Disaster::create([
            'location' => 'Jakarta',
            'disaster' => 'Banjir',
            'description' => 'Sedang berlangsung'
        ]);

        Disaster::create([
            'location' => 'Surabaya',
            'disaster' => 'Gempa Bumi',
            'description' => 'Selesai'
        ]);
    }

}
