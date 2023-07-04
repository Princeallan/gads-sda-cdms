<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PropertyStatus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
//            PropertyTypeSeeder::class,
//            PropertyStatusSeeder::class,
//            CategorySeeder::class,
//            LocationSeeder::class
            RolesAndPermissionsSeeder::class
        ]);

//         \App\Models\Property::factory(50)->create();
//        User::factory()->create([
//            'email' => 'demoadmin@example.com',
//            'name' => 'Demo Admin',
//            'password' => bcrypt('Secret123!'),
//            'email_verified_at' => Carbon::now()
//        ]);
    }
}
