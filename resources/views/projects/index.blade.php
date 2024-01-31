@extends('layouts.app')

@section('content')
    <h2>Projects</h2>
    <ul>
        @foreach ($projects as $project)
            <li class="mb-2">
                {{ $project->name }}
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-todo btn-sm ml-2">
                    Edit
                </a>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-todo btn-sm">
                        Delete
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('projects.create') }}" class="btn btn-outline-todo btn-md mt-2">
        Create Project
    </a>
@endsection
