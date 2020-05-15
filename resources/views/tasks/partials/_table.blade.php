@if($tasks->count() != 0)
    <div class="table-responsive">
        <table class="table mt-3 table-hover" v-drag-and-drop:options="{ dropzoneSelector:'tr'}">
            <thead>
            <tr>
                <th scope="col">Task</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>
                        <form class="d-flex align-content-center" action="/tasks/{{ $task->id }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="text" onChange="this.form.submit()" class="form-control w-50 mr-2" id="name" name="name" aria-describedby="nameHelp"
                                   value="{{ $task->name }}">
                            <div class="form-group d-flex align-content-center w-50">
                                <select name="project" onChange="this.form.submit()" class="form-control mr-2" id="project">
                                    @php
                                        $projects = auth()->user()->projects()->get();
                                    @endphp
                                    <option>Select a Project</option>
                                    @forelse($projects as $project)
                                        <option @if($task->project_id == $project->id) selected @endif value="{{ $project->id }}">{{ $project->name }}</option>
                                    @empty
                                        <option disabled>No Projects Added yet!</option>
                                    @endforelse
                                </select>
                                <div class="custom-control custom-switch mr-2">
                                    <input type="checkbox" name="completed" onChange="this.form.submit()" value="1"
                                           @if($task->completed == '1') checked @endif class="custom-control-input"
                                           id="{{ $task->id }}completed">
                                    <label class="custom-control-label" for="{{ $task->id }}completed">Task Finished?</label>
                                </div>
                            </div>

                        </form>
                    </td>
                    <td>
                        <a href="/tasks/{{ $task->id }}/edit" class="far fa-edit"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <a href="/tasks/create">
        Great Work! You have completed all of your tasks. Ready to add more?
    </a>
@endif
