@if($tasks->count() != 0)
    <table class="table mt-3 table-hover" v-drag-and-drop:options="{ dropzoneSelector:'tr'}">
        <thead>
        <tr>
            <th scope="col">Task</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <th scope="row">{{ $task->name }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>

@else
    <a href="/tasks/create">
        <td>Great Work! You have completed all of your tasks. Ready to add more?</td>
    </a>
@endif
