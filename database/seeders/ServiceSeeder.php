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
    public function run(): void
    {
        $services = [
            ['name' => 'Real Estate', 'is_active' => true],
            ['name' => 'Automotive', 'is_active' => true],
            ['name' => 'Legal Services', 'is_active' => true],
            ['name' => 'Financial Services', 'is_active' => true],
            ['name' => 'Healthcare', 'is_active' => true],
            ['name' => 'Education', 'is_active' => true],
            ['name' => 'Home Services', 'is_active' => true],
            ['name' => 'Travel and Hospitality', 'is_active' => true],
            ['name' => 'Web Design', 'is_active' => true],
            ['name' => 'Marketing and Advertising', 'is_active' => true]
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['name' => $service['name']], $service);
        }
    }
}
