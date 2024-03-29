@extends('layouts.app')

@section('content')
    <h2>Edit Project</h2>
    <form method="post" action="{{ route('projects.update', $project->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Project Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}" required>
        </div>
        <button type="submit" class="btn btn-outline-todo btn-md">
            Update Project
        </button>
    </form>
    <a href="{{ route('projects.index') }}" class="btn btn-outline-todo btn-md mt-2">
        Back to Projects
    </a>
@endsection
