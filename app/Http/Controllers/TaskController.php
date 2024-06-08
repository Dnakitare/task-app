<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::query()
            ->when(request('status'), function ($query, $status) {
                return $query->where('status', $status);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $tasks;
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function store(StoreTaskRequest $request)
    {
        DB::transaction(function () use ($request) {
            $task = Task::create($request->all());

            $pivotData = array_fill_keys($request->member_ids, ['project_id' => $request->project_id]);
            $task->task_members()->attach($pivotData);

            return response($task, 201);
        });
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        DB::transaction(function () use ($request, $task) {
            $task->update($request->all());

            $task->task_members()->sync($request->member_ids);

            return response()->json($task, 200);
        });
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response(null, 204);
    }
}
