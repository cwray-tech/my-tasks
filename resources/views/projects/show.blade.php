@extends('layouts.app')

@section('content')
    <h1 class="h1">{{ $project->name }}</h1>
    <div class="card bg-white mt-4">
        <div class="card-body">
            <div class="d-flex align-items-baseline">
                <h2 class="card-title">Tasks to Complete</h2>
                <a href="/tasks/create" class="btn btn-outline-primary ml-auto">New Task</a>
            </div>
            @include('.tasks.partials._table')
        </div>
    </div>
@endsection
