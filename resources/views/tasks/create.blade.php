@extends('layouts.app')

@section('content')
    <h1 class="h1">Create a New Task</h1>
    <div class="card mt-3">
        <form class="card-body" action="/tasks" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Task</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="{{ old('name') }}">
            </div>
            <select name="project" class="form-control" id="project">
                @php
                    $projects = auth()->user()->projects()->get();
                @endphp
                <option>Select a Project</option>
                @forelse($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @empty
                    <option disabled>No Projects Added yet!</option>
                @endforelse
            </select>
            <div class="form-group form-check mt-4">
                <input type="checkbox" class="form-check-input" name="completed" id="completed">
                <label class="form-check-label" for="completed">Are you finished with this task?</label>
            </div>
            <button type="submit" class="btn btn-primary">Add Task!</button>
        </form>
    </div>
@endsection
