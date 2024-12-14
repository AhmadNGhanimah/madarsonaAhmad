<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class SexesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sexes')->truncate();
        DB::table('sexes')->insert([
             ['name_en' => 'Male', 'name_ar' => 'ذكر'],
            ['name_en' => 'Female', 'name_ar' => 'أنثى'],
        ]);
    }
}
