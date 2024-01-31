<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('priority')
            ->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        Log::info("message");
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'project_id' => 'exists:projects,id',
        ]);

        Task::create($request->all());

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'name' => 'required',
            'project_id' => 'exists:projects,id',
        ]);

        $task->update($request->all());

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }

    public function updateOrder(Request $request)
    {
        $ids = $request->input('ids');
        foreach ($ids as $index => $id) {
            Task::where('id', $id)->update([
                'priority' => $index + 1
            ]);
        }

        return response()->json([
            'success' => true
        ]);
    }
}
