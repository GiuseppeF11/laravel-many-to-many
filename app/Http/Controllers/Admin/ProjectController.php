<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

// Helpers
use Illuminate\Support\Str;

// Form Requests
use App\Http\Requests\Auth\Project\StoreProjectRequest;
use App\Http\Requests\Auth\Project\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $technologies = Project::all();

        return view('admin.projects.index', compact('projects','technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $projectData = $request->validated();

        $slug = Str::slug($projectData['title']);

        $project = Project::create([
            'title' => $projectData['title'],
            'slug' => $slug,
            'description' => $projectData['description'],
            'url' => $projectData['url'],
            'type_id' => $projectData['type_id'],
        ]);

        $type = $projectData['type_id'];

        if (isset($projectData['technologies'])) {
            foreach ($projectData['technologies'] as $singleTechnologyId) {
                
                $project->technologies()->attach($singleTechnologyId);
            }
        }

        return redirect()->route('admin.projects.show', compact('project'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $projectData = $request->validated();

        $slug = Str::slug($projectData['title']);

        $project->update([
            'title' => $projectData['title'],
            'slug' => $slug,
            'description' => $projectData['description'],
            'url' => $projectData['url'],
            'type_id' => $projectData['type_id'],
        ]);

        if (isset($projectData['technologies'])) {
            $project->technologies()->sync($projectData['technologies']);
        }
        else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
