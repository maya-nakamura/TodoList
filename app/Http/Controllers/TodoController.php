<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests\TodoRequest;
use App\Tag;
use App\Todo;
use App\Merge;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('index')->with(['todos' => $todos]);  
    }
    public function show(Todo $todo){
        return view('show')->with(['todo' => $todo]);
    }
    public function create(){
        return view('create');
    }
    public function store(Todo $todo, TodoRequest $request){    //保存
        $input = $request['todo'];
        $todo->fill($input)->save();
        return redirect('/todos/' . $todo->id);
    }
    public function edit(Todo $todo){   //編集ページ
        return view('edit')->with(['todo' => $todo]);
    }
    public function update(TodoRequest $request, Todo $todo){   //編集ページ
        $input_todo = $request['todo'];
        $todo->fill($input_todo)->save();
        return redirect('/' .$todo->id);
    }
    
    public function destroy(Todo $todo){
        $todo->delete();
        return redirect('/');
    }
}