<?php

namespace Database\Factories;

use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>  fake()->randomElement([
                'Midnight Drive',
                'Ocean Eyes',
                'Falling Slowly',
                'Neon Lights',
                'Echoes of You',
                'Lost in the City',
                'Golden Hour',
                'Broken Memories',
                'Skyline Dreams',
                'Whispers in the Dark'
            ]),
            'artist' => fake()->randomElement([
                'Ava Rivers',
                'Liam Carter',
                'Nova Sky',
                'Ethan Brooks',
                'Mia Collins',
                'Zane Walker',
                'Aria Bennett',
                'Noah Hayes',
                'Luna Scott',
                'Kai Morgan'
            ]),
            'genre' => fake()->randomElement(['Romance', 'Hip Hop', 'Kpop', 'Slowed', 'Jazz', 'Blue']),
            'duration' => fake()->numberBetween(180, 300),
            'description' => fake()->randomElement([
                'A heartfelt song about love, distance, and memories that never fade.',
                'An energetic track that captures the feeling of late-night freedom.',
                'A calm and emotional piece reflecting on lost connections.',
                'A vibrant mix of rhythm and melody inspired by city life at night.',
            ]),
            'is_active' => true,
            'is_favorite' => false,
            'published_date' => fake()->date(),
            'img_path' => 'images/default_song_image'
        ];
    }
}
