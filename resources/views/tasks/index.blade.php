@extends('layouts.app')

@section('content')
    <h2>Tasks</h2>

    <form method="get" action="{{ route('tasks.index') }}" class="mb-3">
        <div class="form-group">
            <label for="project_id">Filter by Project:</label>
            <select class="form-control" id="project_id" name="project_id">
                <option value="">All Projects</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ $selectedProject == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-outline-todo btn-md btn-block mt-2">Apply Filter</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Task</th>
                <th>Project</th>
                <th>Priority</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="task-list">
            @forelse($tasks as $task)
                <tr data-id="{{ $task->id }}">
                    <td>{{ $task->name }}</td>
                    <td>{{ optional($task->project)->name }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-todo btn-md">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-todo btn-md">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No tasks found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('tasks.create') }}" class="btn btn-outline-todo btn-md mt-2 mb-5">Create Task</a>
    <a href="{{ route('projects.index') }}" class="btn btn-outline-todo btn-md mt-2 mb-5">View Projects</a>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#task-list").sortable({
                update: function(event, ui) {
                    var ids = [];
                    $("#task-list tr").each(function(index, element) {
                        ids.push($(element).data('id'));
                    });

                    $.ajax({
                        url: '{{ route('tasks.updateOrder') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            ids: ids
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    });
                }
            });
        });
    </script>
@endsection
