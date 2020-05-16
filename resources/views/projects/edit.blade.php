@extends('layouts.app')

@section('content')
    <h1 class="h1">Edit Project</h1>
    <form action="/projects/{{ $project->id }}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Project Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="{{ $project->name }}">
            <small id="nameHelp" class="form-text text-muted">Edit the Name of your Project</small>
        </div>
        <div class="form-group">
            <label for="description">Project Description</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{ $project->description }}</textarea>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" value="1" name="completed" id="completed">
            <label class="form-check-label" for="completed">Are you finished with this project?</label>
        </div>
        <div class="d-flex align-items-baseline">
            <button type="submit" class="btn btn-primary">Save Changes!</button>
            <div class="btn btn-danger ml-auto" data-toggle="modal" data-target="#deleteTask">Delete Project</div>
        </div>
    </form>
    <!-- Modal to delete Task -->
    <div class="modal fade" id="deleteTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this project?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Project: {{ $project->name }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Close</button>
                    <form id="deleteTask" action="/projects/{{ $project->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
