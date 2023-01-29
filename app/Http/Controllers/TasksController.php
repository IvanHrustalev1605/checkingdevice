<?php

namespace App\Http\Controllers;

use App\Models\Objects;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function create($ObjID){
        $object = Objects::find($ObjID);
       return view('tasks.edit', ['object' => $object]);
    }
    public function store(Request $request, $id){
        $task = Tasks::add($request->all());
        $task->ObjID = $id;
        $task->save();
        return redirect()->route('thisObject',['id' => $id]);
    }
    public function changeStatus($id){
        $task = Tasks::find($id);
        $value = $task->is_done;
        $task->is_done =$task-> changeIsDone($value);
        $task->save();
        return redirect()->back();
    }
}
