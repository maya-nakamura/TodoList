<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Tag;
use App\Todo;
use App\Merge;
use DB;
use Slack;

class TodoController extends Controller
{
    public function index(){   //検索と一覧表示の機能を持たせる
        echo "今日は", date('Y/m/d'), "です"; 
        
        $search = request('search');
        $search_date = request('search_date');
        
        ////検索
        if (!empty($search) && empty($search_date)){
            $keyword = Tag::query()->where('tagname',  '=', $search)->get('id')->toArray();
            //dd($keyword);
            
            if(!empty($keyword)){
                $filterd = Merge::query()->whereIn('tag_id', $keyword)->get('todo_id')->toArray();
                $todos = Todo::query()->whereIn('id', $filterd)->get();
            }
            else{
                echo "　　　　　　　　　　　　　　　　　　　　　　　　　　　ーーーーーー　一致するタグはありませんでした　ーーーーーー";  //位置を注意
                $todos = Todo::orderBy('deadline', 'asc')->get();
            }
        }
        elseif (!empty($search_date) && empty($search)){
            $keyword_date = Todo::query()->where('deadline',  '=', $search_date)->get('id')->toArray();
            
            if(!empty($keyword_date)){
                $filterd_date = Merge::query()->whereIn('todo_id', $keyword_date)->get('todo_id')->toArray();
                $todos = Todo::query()->whereIn('id', $filterd_date)->get();
            }
            else{
                echo "　　　　　　　　　　　　　　　　　　　　　　　　　　　ーーーーーー　一致する日程はありませんでした　ーーーーーー";  //位置を注意
                $todos = Todo::orderBy('deadline', 'asc')->get();
            }
        }
        else{
            $todos = Todo::orderBy('deadline', 'asc')->get();   //期限順に並び替える
        }
        //////
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
        
        Slack::send("新しく予定が追加されました");
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
        
        $item = Merge::query()->where('todo_id',  '=', $todo->id)->first();
        $item->tag_id = $tag->id;
        $item->save();
        
        Slack::send("予定が変更されました");
        return redirect('/todos/' .$todo->id);
    }
    public function destroy(Todo $todo){
        
        $item = Merge::where('todo_id', $todo->id)->delete();
        
        $todo->delete();    //モデルで消去
        
        return redirect('/');
    }
}