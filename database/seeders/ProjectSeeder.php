<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


//Models
use App\Models\Project;
use App\Models\Type;
//Helpers
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i=0; $i < 10; $i++) { 
            $randomType = Type::inRandomOrder()->first();
            $project = new Project();
            $project    -> title=fake()->sentence();
            $project    -> slug=Str::slug($project->title);
            $project    -> type_id = $randomType->id;
            $project    -> url=fake()->url();
            $project    -> description=fake()->paragraph();
            $project    -> save();
        }
    }
}
