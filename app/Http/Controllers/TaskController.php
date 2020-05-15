<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all the users tasks.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();
        $tasks = $user->tasks;
        $projects = $user->projects;

        return view('/tasks/index', [
            'tasks' => $tasks,
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(User $user)
    {
        return view('/tasks/create', [
            'projects' => $user->projects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required'
        ]);

        $task = Task::create([
            'name' => $request->name,
            'user_id' => $request->user()->id
        ]);

        $this->complete($request, $task);

        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Task $task)
    {
        return view('/tasks/show', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Task $task, Request $request)
    {
        return view('tasks/edit',[
            'task' => $task,
            'projects' => $request->user()->projects
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $task->update([
            'name' => $request->name,
            'project_id' => $request->project
        ]);

        $this->complete($request, $task);

        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Task $task
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Task $task)
    {
        if($task->user_id == auth()->user()->id){
            try {
                $task->delete();
            } catch (\Exception $e) {
            }
        }
        return redirect('/tasks');
    }


    /**
     * @param Request $request
     * @param $task
     *
     * This completes a task if they have selected to complete it.
     */
    public function complete(Request $request, $task)
    {
        if ($request->completed == '1') {
            $task->update([
                'completed' => '1'
            ]);
        } else {
            $task->update([
                'completed' => '0'
            ]);
        }
    }

}
