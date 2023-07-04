<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Task;
class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        return view('index', [
            "tasks" => $tasks,
            "title" => "All Tasks"
        ]);
    }
    public function inProgress() {
        $tasks = Task::where('status', 1)->get();
        return view('index', [
            "tasks" => $tasks,
            "title" => "In Progress"
        ]);
    }

    public function finished() {
        $tasks = Task::where('finished', 1)->get();
        return view('index', [
            "tasks" => $tasks,
            "title" => "Finished"
        ]);
    }

    public function finishedToggle($id) {
        $task = Task::find($id);
        $task->finished = !$task->finished;
        $task->status = false;
        $task->save();
        return back();
    }

    public function statusToggle($id) {
        $task = Task::find($id);
        $task->status = !$task->status;
        $task->save();
        return back();
    }

    public function delete($id) {
        $task = Task::find($id);
        $task->delete();
        return back();
    }

    public function add() {
        $task = new Task;

        $validator = validator(request()->all(), [
            "body" => "required"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $task->body = request()->body;
        $task->save();
        return back();
    }
}
