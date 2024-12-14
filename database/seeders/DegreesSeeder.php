<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DegreesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('degrees')->truncate();
        DB::table('degrees')->insert([
            ['name_en' => 'Diploma', 'name_ar' => 'دبلوم'],
            ['name_en' => 'Bachelor\'s', 'name_ar' => 'بكالوريوس'],
            ['name_en' => 'Higher Diploma', 'name_ar' => 'دبلوم عالي'],
            ['name_en' => 'Master\'s', 'name_ar' => 'ماجستير'],
            ['name_en' => 'Doctorate', 'name_ar' => 'دكتوراة'],
        ]);
    }
}
