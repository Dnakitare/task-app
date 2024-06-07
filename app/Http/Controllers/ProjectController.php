<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $project = Project::create([
            ...$request->all(),
            'slug' => Project::createSlug($request->name),
        ]);
        return response()->json($project, 201);
    }
}
