<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TaskController extends Controller
{

    public function index(Request $request) {
        if ($request -> search) {
            $task = Task::where('task', 'LIKE', "%$request->search%")
            ->get();

            return $task;
        }
        $task = Task::paginate(3);
        return view('task.index',[
            'data' => $task
        ]);
        
    }

    public function show($id) {
        $task = Task::find($id);
        return $task;
    }

    public function create(){
        return view('task.create');
    }

    public function store(TaskRequest $request){

        Task::create([
            'task' => $request->task,
            'user' => $request->user
        ]);
        // return 'Success';
        return redirect('/tasks');
    }
    
public function edit($id){
    $task = Task::find($id);
    return view('task.edit', compact('task'));
}

    public function update(TaskRequest $request, $id){
        $task = Task::find($id);
        $task->update([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return redirect('/tasks');
    }

    public function delete($id) {
        $task = Task::find($id)
        ->delete();
        return redirect('/tasks');
    }

}