<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           // UsersSeeder::class,
           // RolesPermissionsSeeder::class,
            DegreesSeeder::class,
            JobTitlesSeeder::class,
            MaritalStatusesSeeder::class,
            NationalitiesTableSeeder::class,
            SexesSeeder::class,
            SpecializationsSeeder::class,
        ]);

        /*\App\Models\User::factory(2)->create();

        Address::factory(2)->create();*/

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
