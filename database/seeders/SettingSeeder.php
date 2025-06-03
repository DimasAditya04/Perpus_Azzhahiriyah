<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if settings already exist to prevent duplicates
        if (DB::table('settings')->count() == 0) {
            DB::table('settings')->insert([
                [
                    'key' => 'webname',
                    'value' => 'Perpustakaan Azzhahiriyah',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'key' => 'description',
                    'value' => 'AZHARA',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}