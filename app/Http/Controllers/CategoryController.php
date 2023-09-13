<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(auth()->check()){
            $categories = Category::where('user_id', auth()->user()->id)->get();
            
            return view('categories.index', ['categories' => $categories]);
        }
        else{
            $categories = Category::all();
            return view('categories.index', ['categories' => $categories]);
        }


       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories|max:255',
            'color'=>'required|max:7'
        ]);
        $user = auth()->user();
        $category = new Category();
        $category->name = $request->name;
        $category->color = $request->color;
        $category->user_id = $user->id;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Se ha creado la categoria correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('categories.show', ['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        $category = Category::find($id);
        $category->name = $request->name;
        $category->color = $request->color;
        $category->user_id = $user->id;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Se ha actializado la categoria correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->tasks()->each(function($task){
            $task->delete();
        });
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Se ha eliminado la categoria correctamente');
    }
}
