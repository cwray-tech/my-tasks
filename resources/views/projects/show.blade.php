@extends('layouts.app')

@section('content')
    <h1 class="h1">{{ $project->name }}</h1>
    <p>{{ $project->description }}</p>
    <a href="/projects/{{ $project->id }}/edit" class="btn btn-outline-primary ml-auto">Edit Project</a>
    <div class="card bg-white mt-4">
        <div class="card-body">
            <div class="d-flex align-items-baseline">
                <h2 class="card-title">Tasks to complete in <b>{{ $project->name }}</b></h2>
                <a href="/tasks/create" class="btn btn-outline-primary ml-auto">New Task</a>
            </div>
            @include('.tasks.partials._table')
            <h2 class="h2">Create a New Task</h2>
            <div class="card mt-3">
                <form class="card-body" action="/tasks" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Task</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="{{ old('name') }}">
                    </div>
                    <input type="hidden" name="project" value="{{ $project->id }}">
                    <div class="form-group form-check mt-4">
                        <input type="checkbox" class="form-check-input" name="completed" id="completed">
                        <label class="form-check-label" for="completed">Are you finished with this task?</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Task!</button>
                </form>
            </div>
        </div>
    </div>
@endsection
