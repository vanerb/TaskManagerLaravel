<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //

    public function store(Request $request){
        $request->validate([
            'title'=> 'required|min:3'
        ]);

        $task = new Task();
        $user = auth()->user();

        $task->title = $request->title;
        $task->category_id = $request->category_id;
        $task->user_id =  $user->id;
        $task->save();

        return redirect()->route('task')->with('success' , 'Tarea creada correctamente');
    }


    public function index() {
        if(auth()->check()){
            $task = Task::where('user_id', auth()->user()->id)->get();
            $categories = Category::where('user_id', auth()->user()->id)->get();
            return view('task.index', ['tasks'=>$task, 'categories'=>$categories]);
        }
        else{
            $task = Task::all();
            $categories = Category::all();
            return view('task.index', ['tasks'=>$task, 'categories'=>$categories]);
        }
        
        
        
        
    }

    

    public function show($id){
        $task = Task::find($id);
        $categories =  Category::where('user_id', auth()->user()->id)->get();
        return view('task.show', ['tasks'=>$task, 'categories'=>$categories]);
    }

    public function destroy($id){
        $task = Task::find($id);

        $task->delete();
        return redirect()->route('task')->with('success', 'Tarea eliminada');

    }

    public function update(Request $request, $id){
        $user = auth()->user();
        $task = Task::find($id);
        $task->title = $request->title;
        $task->category_id = $request->category_id;
        $task->user_id =  $user->id;
        $task->save();


        //return view('task.index', ['success'=>'Task updated successfully']);
        return redirect()->route('task')->with('success', 'Tarea actualizada');
    }

    
}
