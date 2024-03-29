@extends('layouts.app')

@section('content')
    <h2>Create Project</h2>
    <form method="post" action="{{ route('projects.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Project Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-outline-todo btn-md">
            Create Project
        </button>
    </form>
    <a href="{{ route('projects.index') }}" class="btn btn-outline-todo btn-md mt-2">
        Back to Projects
    </a>
@endsection
