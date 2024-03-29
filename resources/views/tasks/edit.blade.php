@extends('layouts.app')

@section('content')
    <h2>Edit Task</h2>
    <form method="post" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Task Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
        </div>
        <div class="form-group">
            <label for="project_id">Project:</label>
            <select class="form-control" id="project_id" name="project_id">
                <option value="">Select Project</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="priority">Priority:</label>
            <input type="number" class="form-control" id="priority" name="priority" value="{{ $task->priority }}"
                required>
        </div>
        <button type="submit" class="btn btn-outline-todo btn-md mt-2">
            Update Task
        </button>
    </form>
    <a href="{{ route('tasks.index') }}" class="btn btn-outline-todo btn-md mt-2">
        Back to Tasks
    </a>
@endsection
