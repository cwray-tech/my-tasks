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
            <div class="form-group">
                <label for="project">Select Project (Optional)</label>
                <select name="project" class="form-control" id="project">
                    @forelse($projects as $project)
                        <option @if($task->project_id == $project->id) selected @endif value="{{ $project->id }}">{{ $project->name }}</option>
                    @empty
                        <option disabled>No Projects Added yet!</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" value="1" class="form-check-input" name="completed" @if($task->completed == '1') checked
                       @endif id="completed">
                <label class="form-check-label" for="completed">Are you finished with this task?</label>
            </div>
            <div class="d-flex align-items-baseline">
                <button type="submit" class="btn btn-primary">Save Changes!</button>
                <div class="btn btn-danger ml-auto" data-toggle="modal" data-target="#deleteTask">Delete Task</div>
            </div>
        </form>
    </div>
    <!-- Modal to delete Task -->
    <div class="modal fade" id="deleteTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this task?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Task: {{ $task->name }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Close</button>
                    <form id="deleteTask" action="/tasks/{{ $task->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
