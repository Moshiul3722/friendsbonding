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
        // \App\Models\User::factory(10)->create();

        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'student']);
        Role::create(['name' => 'teacher']);

        \App\Models\User::factory()->create([
            'name'              => 'Gazi Moshiul',
            'userName'          => 'Moshiul',
            'email'             => 'abc@test.com',
            'email_verified_at' => now(),
            'image'             => 'https: //random.imagecdn.app/100/100',
            'password'          => bcrypt('123')
        ])->assignRole('superadmin');

        \App\Models\User::factory()->create([
            'name'              => 'Sajib Bhuian',
            'userName'          => 'Sajib',
            'email'             => 'def@test.com',
            'email_verified_at' => now(),
            'image'             => 'https: //random.imagecdn.app/100/100',
            'password'          => bcrypt('123')
        ])->assignRole('student');
    }
}
