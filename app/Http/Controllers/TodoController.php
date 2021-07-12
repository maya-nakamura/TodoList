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
    public function update(TodoRequest $request, Todo $todo, Tag $tag){   //編集ページ
        
        $input_2 = $request['todo'];
        $todo->fill($input_2)->save();
        
        $input_tag_2 = $request['tag'];
        $tag->fill($input_tag_2)->save();
        
        //①mergesテーブルのデータを全件取得し、$mergesと置く
        //②その中から、todo_id=$todo->idであるものを取得し、$itemと置く
        //③$itemのtag_idを、$tag_idに置き換える
        //④保存する
        
        //$merge = Merge::all();
        //$item = $merge->where('todo_id', $todo->id);
        $item = Merge::query()->where('todo_id',  '=', $todo->id)->first();
        $item->tag_id = $tag->id;
        $item->save();

        //$merge->todo_id = $todo->id;
        //$merge->tag_id = $tag->id;
        //$merge->save();
        //dd($item);
        
        return redirect('/todos/' .$todo->id);
    }
    public function destroy(Todo $todo){
        
        
        //$tag->delete();
        
        //$merge = new Merge;
        $item = Merge::where('todo_id', $todo->id)->delete();
        
        $todo->delete();    //モデルで消去
        
        return redirect('/');
    }
}