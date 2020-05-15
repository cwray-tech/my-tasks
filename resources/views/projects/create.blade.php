@extends('layouts.app')

@section('content')
    <h1 class="h1">Create a New Project</h1>
    <div class="card mt-3">
        <form class="card-body" action="/projects" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" value="{{ old('name') }}">
                <small id="nameHelp" class="form-text text-muted">Edit the Name of your Project</small>
            </div>
            <div class="form-group">
                <label for="description">Project Description</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" value="1" name="completed" class="form-check-input" id="completed">
                <label class="form-check-label" for="completed">Are you finished with this project?</label>
            </div>
            <button type="submit" class="btn btn-primary">Create Project!</button>
        </form>
    </div>
@endsection
