<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function get(Project $project)
    {
        return $project;
    }

    public function store(Request $request)
    {
        $project = Project::create([
            ...$request->all(),
            'slug' => Project::createSlug($request->name),
        ]);
        return response()->json($project, 201);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update([
            ...$request->all(),
            'slug' => Project::createSlug($request->name),
        ]);
        return response()->json($project, 200);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response(null, 204);
    }
}
