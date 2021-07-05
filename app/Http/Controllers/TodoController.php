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
    public function store(TodoRequest $request){    //一度で複数のテーブルに保存
        $todo = new Todo;    //モデルのTodo //インスタンス
        $input = $request['todo'];
        $todo->fill($input)->save();
        
        $tag = new Tag;
        $input_tag = $request['tag'];
        $tag->fill($input_tag)->save();

        $merge = new Merge;
        $merge->todo_id = $todo->id;
        $merge->tag_id = $tag->id;
        $merge->save();
        
        return redirect('/todos/' . $todo->id);
    }
    public function edit(Todo $todo){   //編集ページ
        return view('edit')->with(['todo' => $todo]);
    }
    public function update(TodoRequest $request){   //編集ページ
        $todo = Sample::find($request->id);   //モデルのTodo //インスタンス
        $input_2 = $request['todo'];
        $todo->fill($input_2)->save();
        
        $tag = Sample::find($request->id);
        $input_tag_2 = $request['tag'];
        $tag->fill($input_tag_2)->save();

        $merge = Sample::find($request->id);
        $merge->todo_id = $todo->id;
        $merge->tag_id = $tag->id;
        $merge->save();
        
        return redirect('/todos/' .$todo->id);
    }
    public function destroy(){
        $todo = new Todo;
        $todo->destroy(1);
        
        $tag = new Tag;
        $tag->destroy(1);
        
        $merge = new Merge;
        $merge->todo_id = delete();
        $merge->tag_id = delete();
        
        return redirect('/');
    }
}