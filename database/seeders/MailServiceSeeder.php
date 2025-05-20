<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MailServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('mail_services')->insert([
            [
                'name' => 'JNE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shopee',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tiki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
