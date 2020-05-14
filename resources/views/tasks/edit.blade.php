@extends('layouts.app')

@section('content')
    <h1 class="h1">Edit Task</h1>
    <div class="card mt-3">
        <form class="card-body" action="/tasks/{{ $task->id }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Task</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp"
                       value="{{ $task->name }}">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="completed" @if($task->completed == '1') checked @endif id="completed">
                <label class="form-check-label" for="completed">Are you finished with this task?</label>
            </div>
            <button type="submit" class="btn btn-primary">Add Task!</button>
        </form>
    </div>
@endsection
