<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\TaskProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        // using the name query parameter to filter the projects, paginate the results, and return the projects in descending order of their creation date
        $projects = Project::query()
            ->when(request('name'), function ($query, $name) {
                return $query->where('name', 'like', "%$name%");
            })
            ->latest()
            ->paginate(10);

        return $projects;
    }

    public function show(Project $project)
    {
        return $project->load('task_progress');
    }

    public function store(Request $request)
    {
        DB::beginTransaction(function () use ($request) {
            $project = Project::create([
                ...$request->all(),
                'slug' => Project::createSlug($request->name),
            ]);

            $project->task_progress()->create([
                'pinned_on_dashboard' => TaskProgress::NOT_PINNED_ON_DASHBOARD,
                'progress' => TaskProgress::INITIAL_PROJECT_PROGRESS,
            ]);

            return response($project, 201);
        });
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

    public function pinOnDashboard(Project $project)
    {
        $project->task_progress->update([
            'pinned_on_dashboard' => TaskProgress::PINNED_ON_DASHBOARD,
        ]);

        return response()->json($project, 200);
    }

    public function unpinFromDashboard(Project $project)
    {
        $project->task_progress->update([
            'pinned_on_dashboard' => TaskProgress::NOT_PINNED_ON_DASHBOARD,
        ]);

        return response()->json($project, 200);
    }
}
