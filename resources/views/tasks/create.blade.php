@extends('layouts.app')

@section('content')
    <h2>Create Task</h2>
    <form method="post" action="{{ route('tasks.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Task Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="project_id">Project:</label>
            <select class="form-control" id="project_id" name="project_id">
                <option value="">Select Project</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="priority">Priority:</label>
            <input type="number" class="form-control" id="priority" name="priority" required>
        </div>
        <button type="submit" class="btn btn-outline-todo btn-md mt-2">Create Task</button>
    </form>
    <a href="{{ route('tasks.index') }}" class="btn btn-outline-todo btn-md mt-2">Back to Tasks</a>
@endsection
