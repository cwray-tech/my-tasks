<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display users projects.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $projects = auth()->user()->projects;
        $tasks = DB::table('tasks')->where('user_id', '=', auth()->user()->id)->orderBy('priority', 'asc')->get();

        return view('/projects/index', [
            'projects' => $projects,
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('/projects/create');
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

        $project = Project::create([
            'name' => $request->name,
            'user_id' => $request->user()->id,
            'description' => $request->description
        ]);

        $this->complete($request, $project);

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Project $project)
    {
        $tasks = DB::table('tasks')->where('project_id', '=', $project->id)->orderBy('priority', 'asc')->get();

        return view('/projects/show',[
            'project' => $project,
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Project $project)
    {
        return view('/projects/edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $project->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        $this->complete($request, $project);

        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    /**
     * @param Request $request
     * @param $project
     */
    public function complete(Request $request, $project)
    {
        if ($request->completed == '1') {
            $project->update([
                'completed' => '1'
            ]);
        } else {
            $project->update([
                'completed' => '0'
            ]);
        }
    }
}
