<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Tag;
use App\Todo;
use App\Merge;
use DB;

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
    public function store(Todo $todo, Tag $tag, Merge $merge, TodoRequest $request){    //一度で複数のテーブルに保存
        $input = $request['todo'];
        $todo->fill($input)->save();
        $tag->fill($iput)->save();
        $merge->fill($input)->save();
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