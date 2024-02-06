<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = include base_path('data/projects.php');

        foreach ($projects as $projectData) {
            $project = new Project();
            $project->title = $projectData['title'];
            $project->category = $projectData['category'];
            $project->start_date = $projectData['start_date'];
            $project->end_date = $projectData['end_date'];
            $project->language = $projectData['language'];
            $project->status = $projectData['status'];
            $project->save();
        }
    }
}
