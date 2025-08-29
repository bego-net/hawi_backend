<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    

public function run()
{
    Service::create([
        'title' => 'Web Development',
        'description' => 'We build modern and scalable web applications.',
        'icon' => 'fa-solid fa-code',
    ]);

    Service::create([
        'title' => 'Mobile App Development',
        'description' => 'We create Android and iOS apps with great UI/UX.',
        'icon' => 'fa-solid fa-mobile-alt',
    ]);

    Service::create([
        'title' => 'Cloud Solutions',
        'description' => 'We provide secure cloud hosting and DevOps services.',
        'icon' => 'fa-solid fa-cloud',
    ]);
}

}
