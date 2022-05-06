@extends('layouts.app')

@section('title')
    Create Todo
@endsection

@section('content')

    <form action="{{ route('store_todo_task') }}" method="post" class="mt-4 p-4">
    @csrf
        <div class="form-group m-3">
            <label for="name">Todo Name</label>
            <input type="text" class="form-control" name="taskname">
        </div>
        <div class="form-group m-3">
            <label for="description">Todo Description</label>
            <textarea class="form-control" name="tasksummary" rows="3"></textarea>
        </div>
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Submit">
        </div>
    </form>

@endsection