<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    public function run()
    {
        // Insert dummy data into the destinations table
        Destination::create([
            'name' => 'Paris',
            'description' => 'The city of light and romance.',
            'country' => 'France',
            'city' => 'Paris',
            'activity_type' => 'Sightseeing',
            'image' => 'https://example.com/paris.jpg',
        ]);

        Destination::create([
            'name' => 'Tokyo',
            'description' => 'A city where tradition meets modernity.',
            'country' => 'Japan',
            'city' => 'Tokyo',
            'activity_type' => 'Cultural Experience',
            'image' => 'https://example.com/tokyo.jpg',
        ]);

        Destination::create([
            'name' => 'New York',
            'description' => 'The city that never sleeps.',
            'country' => 'USA',
            'city' => 'New York',
            'activity_type' => 'Urban Adventure',
            'image' => 'https://example.com/ny.jpg',
        ]);
    }
}
