<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();

        $selectedProject = $request->get('project_id');
        $tasksQuery = Task::query();

        if ($selectedProject) {
            $tasksQuery->where('project_id', $selectedProject);
        }

        $tasks = $tasksQuery
            ->orderBy('priority', 'asc') // Order by priority in descending order
            ->get(['id', 'name', 'project_id', 'priority']);

        return view('tasks.index', compact('tasks', 'projects', 'selectedProject'));
    }


    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'project_id' => 'exists:projects,id',
            'priority' => 'required|integer|min:1',
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
            'priority' => 'nullable|integer|min:1',
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
