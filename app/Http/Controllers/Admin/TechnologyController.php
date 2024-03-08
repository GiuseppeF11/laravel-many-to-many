<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Technology;

// Form Requests
use App\Http\Requests\Auth\Technology\StoreTechnologyRequest;
use App\Http\Requests\Auth\Technology\UpdateTechnologyRequest;
use GuzzleHttp\Psr7\Request as Psr7Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $technologyData = $request->validated();

        $slug = str()->slug($technologyData['title']);

        $technology = Technology::create([
            'title' => $technologyData['title'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.technologies.show', ['technology' => $technology->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $technologyData = $request->validated();

        $slug = str()->slug($technologyData['title']);

        $technology->update([
            'title' => $technologyData['title'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.technologies.show', ['technology' => $technology->id]);
    }

    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index');
    }
}
