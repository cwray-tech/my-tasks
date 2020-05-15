<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PriorityController extends Controller
{
    /**
     * Update the task priority
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tasks = Task::all();

        foreach($tasks as $task){
            foreach($request->taskList as $newTask){
                if($newTask['id'] == $task['id']){
                    $task->update([
                        'priority' => $newTask['priority']
                    ]);
                }
            }
        }
        return response('Update Successful', 200);
    }
}
