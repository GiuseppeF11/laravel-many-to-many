<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Technology;

// Helpers
use Illuminate\Support\Facades\Schema;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Technology::truncate();
        Schema::enableForeignKeyConstraints();

        $technologies = [
            'News',
            'Updates',
            'Release',
            'Technology',
            'Web',
            'Software',
            'Hardware',
            'Blockchain',
            'AI',
            'Machine Learning',
            'ChatGPT',
        ];

        foreach ($technologies as $singleTechnology) {
            $technology = Technology::create([
                'title' => $singleTechnology,
                'slug' => str()->slug($singleTechnology),
            ]);
        }
    }
}