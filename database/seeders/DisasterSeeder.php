<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Disaster;

class DisasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $disasters = [
            ["location" => "Banda Aceh", "disaster" => "Banjir", "description" => "Aids delivered", "latitude" => 5.5483, "longitude" => 95.3238],
            ["location" => "Medan", "disaster" => "Gempa", "description" => "Aids not delivered", "latitude" => 3.5952, "longitude" => 98.6722],
            ["location" => "Jakarta", "disaster" => "Banjir", "description" => "Aids not delivered", "latitude" => -6.2088, "longitude" => 106.8456],
            ["location" => "Semarang", "disaster" => "Gempa", "description" => "Aids not delivered", "latitude" => -6.9667, "longitude" => 110.4167],
            ["location" => "Surabaya", "disaster" => "Banjir", "description" => "Aids delivered", "latitude" => -7.2504, "longitude" => 112.7688],
            ["location" => "Balikpapan", "disaster" => "Kebakaran", "description" => "Aids not delivered", "latitude" => -1.2379, "longitude" => 116.8525],
            ["location" => "Jambi", "disaster" => "Banjir", "description" => "Aids delivered", "latitude" => -1.6101, "longitude" => 103.6131]
        ];

        foreach ($disasters as $disaster) {
            Disaster::create($disaster);
        }
    }

}
