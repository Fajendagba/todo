@extends('layouts.app')

@section('content')
    <h2>Tasks</h2>
    <div class="list-group" id="task-list">
        @foreach ($tasks as $task)
            <div class="list-group-item" data-id="{{ $task->id }}">
                {{ $task->name }}
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary float-right ml-2">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="float-right">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
    <a href="{{ route('tasks.create') }}" class="btn btn-success mt-3">Create Task</a>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#task-list").sortable({
                update: function(event, ui) {
                    var ids = [];
                    $("#task-list .list-group-item").each(function(index, element) {
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
