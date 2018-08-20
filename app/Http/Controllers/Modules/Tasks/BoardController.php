<?php

namespace App\Http\Controllers\Modules\Tasks;

use App\Model\Tasks\BoardTasks;
use App\Model\Tasks\BoardTaskUsers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoardController extends Controller
{
    public function index(){
        // Fetch Users for task
        $users = User::where("account_id", aid())->get(['id', 'name']);
        $alldata = BoardTaskUsers::all();
        
        // Fetch all tasks
        $tasks = BoardTasks::orderBy('task_time')->select('id','title','task_time','task_status','task_status')->get();
        
        // Filter tasks - Todo Tasks
        $tasksTodo = $tasks->filter(function ($task, $key) {
            if($task->task_status == 1)
                return $task->task_status;
        })->values();
        
        // Filter tasks - In Progress Tasks
        $tasksInProgress = $tasks->filter(function ($task, $key) {
            if($task->task_status == 2)
                return $task->task_status;
        })->values();
        
        // Filter tasks - Completed Tasks
        $tasksCompleted = $tasks->filter(function ($task, $key) {
            if($task->task_status == 3)
                return $task->task_status;
        })->values();

        return view("modules.tasks.board.index",compact( "users", "tasksTodo", "tasksInProgress", "tasksCompleted" ));
    }
    /*
    This will store tasks data
    */
    public function store($aid, $id, Request $request)
    {
        $task = BoardTasks::Create(
            [
                "title" => $request->title,
                "category_color" => $request->color,
                "priority" => $request->priority,
                "task_time" => date("Y-m-d H:i", strtotime($request->date)),
                "duration" => $request->duration,
                "description" => $request->description,
                "task_status" => 1,
                "task_added_by" => 1
            ]
        );
        $id = $task->id;
        if($id > 0) {
            $users_data = array();
            $users = $request->user;
            if($users != "") {
                $users_arr = explode(",", $users);
                foreach($users_arr as $key => $val) 
                      $users_data[] = array("board_task_id"=>$id, "user_id"=>$val);
                BoardTaskUsers::insert($users_data);
            }
        }
        flash()->overlay("Task Add", 'Success')->success();
        return ["message" => "success", 'type' => "task"];
    }
    /*
    This will change task's status
    */
    public function status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $id = str_replace("task_", "", $id);
        $status = str_replace("sortable", "", $status);
        $task = BoardTasks::find($id);
        $task->task_status = $status;
        $task->save();
        return ["message" => "success", 'type' => "task"];
    }
}
