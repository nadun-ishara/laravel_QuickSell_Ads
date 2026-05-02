<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations =[
            ['name' => 'Colombo', 'slug' => 'colombo'],
            ['name' => 'Galle', 'slug' => 'galle'],
            ['name' => 'Kandy', 'slug' => 'kandy'],
            ['name' => 'Matara', 'slug' => 'matara'],
            ['name' => 'Gampaha', 'slug' => 'gampaha'],
            ['name' => 'Jaffna', 'slug' => 'jaffna'],
            ['name' => 'Kurunegala', 'slug' => 'kurunegala']
        ];

        foreach($locations as $loc){
            Location::updateOrCreate(
                ['slug' => $loc['slug']],
                ['name' => $loc['name']]
            );
        }
    }
}
