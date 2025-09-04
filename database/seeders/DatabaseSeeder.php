<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blog;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ✅ Create one test user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'), 
            'is_admin' => true,
        ]);
        

        // ✅ Create some demo users
        User::factory(5)->create();

        // ✅ Seed some blogs
        Blog::factory(5)->create();

        // ✅ Seed some services
        Service::factory(5)->create();
    }
}
