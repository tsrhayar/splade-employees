<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
        \App\Models\Country::factory(10)->create();
        \App\Models\State::factory(30)->create();
        \App\Models\City::factory(70)->create();
        \App\Models\Department::factory(6)->create();
        \App\Models\User::factory(20)->create();

        $admin = \App\Models\User::factory()->create([
            'username' => 'admin',
            'first_name' => 'Taha',
            'last_name' => 'Srhayar',
            'email' => 'tahasrhayar@gmail.com',
            'password' => 'password',
        ]);

        $role = Role::create(['name' => 'admin']);

        $admin->assignRole($role);
    }
}