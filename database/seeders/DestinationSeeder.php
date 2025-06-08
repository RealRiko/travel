<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks to truncate tables with relationships
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate destinations and likes tables
        DB::table('likes')->truncate();
        Destination::truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insert dummy data into the destinations table
        Destination::create([
            'name' => 'Paris',
            'description' => 'The city of light and romance.',
            'country' => 'France',
            'activity_type' => 'Sightseeing',
            'image' => 'images/destinations/paris.jpg',
            'youtube_video' => 'https://www.youtube.com/embed/P3RWXEvaiwo',
        ]);

        Destination::create([
            'name' => 'Tokyo',
            'description' => 'A city where tradition meets modernity.',
            'country' => 'Japan',
            'activity_type' => 'Cultural Experience',
            'image' => 'images/destinations/tokyo.jpg',
            'youtube_video' => 'https://www.youtube.com/embed/w1Z5dOcyi7w',
        ]);

        Destination::create([
            'name' => 'New York',
            'description' => 'The city that never sleeps.',
            'country' => 'USA',
            'activity_type' => 'Urban Adventure',
            'image' => 'images/destinations/newyork.jpg',
            'youtube_video' => 'https://www.youtube.com/embed/TT2R5B9F3EQ?si=toqCtbE7RMvxWE-6&amp',
        ]);

        Destination::create([
            'name' => 'Sydney',
            'description' => 'Home of the iconic Opera House and stunning beaches.',
            'country' => 'Australia',
            'activity_type' => 'Beach and Culture',
            'image' => 'images/destinations/sydney.jpg',
            'youtube_video' => 'https://www.youtube.com/embed/hDI8LjLc9F8?si=XPuN02YgLGQxoS9O&amp',
        ]);

        Destination::create([
            'name' => 'Riga',
            'description' => 'The vibrant capital of Latvia, known for its art nouveau architecture.',
            'country' => 'Latvia',
            'activity_type' => 'Historical and Cultural',
            'image' => 'images/destinations/riga.jpg',
            'youtube_video' => 'https://www.youtube.com/embed/EELX9Tzwr_8?si=XFr4Tgrd0BHFOgkP&amp',
        ]);

        Destination::create([
            'name' => 'Rio de Janeiro',
            'description' => 'Famous for its carnival and the Christ the Redeemer statue.',
            'country' => 'Brazil',
            'activity_type' => 'Cultural and Beach',
            'image' => 'images/destinations/rio.jpg',
            'youtube_video' => 'https://www.youtube.com/embed/J3jufq8b7ms?si=JjbPIP4cePyXJHI0&amp',
        ]);

        Destination::create([
            'name' => 'Dubai',
            'description' => 'A city of futuristic skyscrapers and luxury shopping.',
            'country' => 'UAE',
            'activity_type' => 'Luxury and Shopping',
            'image' => 'images/destinations/dubai.jpg',
            'youtube_video' => 'https://www.youtube.com/embed/nxTAlyv6Gt8?si=enW7SzhdyWJ2T5b6&amp',
        ]);

        Destination::create([
            'name' => 'Rome',
            'description' => 'The Eternal City, steeped in history and culture.',
            'country' => 'Italy',
            'activity_type' => 'Historical Exploration',
            'image' => 'images/destinations/rome.jpg',
            'youtube_video' => 'https://www.youtube.com/embed/Z4kt64F8Vi4?si=MFbgcv7gXb3rzviC&amp',
        ]);

        Destination::create([
            'name' => 'Bangkok',
            'description' => 'The bustling capital of Thailand, known for its vibrant street life.',
            'country' => 'Thailand',
            'activity_type' => 'Cultural and Nightlife',
            'image' => 'images/destinations/bangkok.jpg',
            'youtube_video' => 'https://www.youtube.com/embed/Fy1tROVeJW8?si=QnR2B3dqUZrEpe9y&amp',
        ]);
    }
}