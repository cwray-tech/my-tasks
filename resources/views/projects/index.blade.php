@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex">
            @forelse($projects as $project)
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $project->name }}</h2>
                        <p class="card-text">{{ $project->description }}</p>
                        <a href="/projects/{{ $project->id }}" class="btn btn-primary">See Project Tasks</a>
                    </div>
                </div>
            @empty
                <div>Looks like you haven't added any projects yet. Let's fix that!</div>
            @endforelse


        </div>
    </div>
@endsection
