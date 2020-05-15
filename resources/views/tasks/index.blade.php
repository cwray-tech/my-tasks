@extends('layouts.app')

@section('content')
    <h1 class="h1">Your Tasks</h1>
    <div class="card bg-white mt-3">
        <div class="card-body">
            <div class="d-flex align-items-baseline">
                <h2 class="card-title">All Tasks</h2>
                <a href="/tasks/create" class="btn btn-outline-primary ml-auto">New Task</a>
            </div>
            @include('.tasks.partials._table')
        </div>
    </div>
    <h2 class="h2 mt-4">Your Projects</h2>
    <div class="card-columns mt-3">
        @forelse($projects as $project)
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ $project->name }}</h2>
                    <p class="card-text">{{ $project->description }}</p>
                    <a href="/projects/{{ $project->id }}" class="btn btn-primary">See Project Tasks</a>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">No Projects</h2>
                    <p class="card-text">Looks like you haven't added any projects yet. Let's fix that!</p>
                    <a href="/projects/create" class="btn btn-primary">New Project</a>
                </div>
            </div>
        @endforelse
    </div>
@endsection
