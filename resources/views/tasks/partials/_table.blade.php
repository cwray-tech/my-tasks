@if($tasks->count() != 0)

    <task-list :projects="{{ $projects }}" :tasks="{{ $tasks }}"></task-list>
@else
    <a href="/tasks/create">
        Great Work! You have completed all of your tasks. Ready to add more?
    </a>
@endif
