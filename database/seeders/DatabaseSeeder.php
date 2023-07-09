<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $this->call([
        //     CountrySeeder::class,
        //     StateSeeder::class,
        //     CitySeeder::class,
        //     DepartementSeeder::class,
        // ]);
        \App\Models\Country::factory(20)->create();
        \App\Models\User::factory(20)->create();

        \App\Models\User::factory()->create([
            'username' => 'tahasrhayar',
            'first_name' => 'Taha',
            'last_name' => 'Srhayar',
            'email' => 'tahasrhayar@gmail.com',
            'password' => 'password',
        ]);
    }
}
