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
        </div>
    </div>
@endsection
