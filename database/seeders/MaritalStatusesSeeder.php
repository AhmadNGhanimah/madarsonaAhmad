<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaritalStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marital_statuses')->truncate();
        DB::table('marital_statuses')->insert([
            ['name_en' => 'Single', 'name_ar' => 'اعزب'],
            ['name_en' => 'Married', 'name_ar' => 'متزوج'],                                  
           
        ]);
    }
}
