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
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

@endsection
