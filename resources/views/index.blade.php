<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TodoList</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
    </head>
    <body>
        <br/> 
        <br/>
        <h1 style="text-align:center">Todoリスト</h1>
        <br/>
        <h3 style="text-align:center"><a href='/todos/create'>新規作成</a></h3>
        <br/> 
        
        <form class="form-inline my-2 my-lg-0 ml-2">
            <div class="form-group">
                <input type="search"  style="position: absolute; left: 100px; top: 100px"/ class="form-control mr-sm-2" name="search" value="{{request('search')}}" placeholder="タグ検索" aria-label="検索...">
                <input type="submit"  style="position: absolute; left: 325px; top: 100px"/ value="検索" class="btn btn-info">
            </div>
            <div class="form-group_date">
                <input type="search"  style="position: absolute; left: 100px; top: 150px"/ class="flatpickr" name="search_date" value="{{request('search_date')}}" placeholder="日付検索", aria-label="検索...">
                <script>
                    flatpickr('.flatpickr');
                </script>
                <input type="submit"  style="position: absolute; left: 325px; top: 150px"/ value="検索" class="btn btn-info">
            </div>
        </form>
        
        @foreach ($todos as $todo)
                <h3 style="text-align:center"><a href="/todos/{{$todo->id}}">{{$todo->title}}</a></h3>
                <p style="text-align:center">タグ:
                    @foreach($todo->tags as $tag)
                        {{$tag->tagname}}
                    @endforeach
                </p>
                <!--<p style="text-align:center">body: {{$todo->body}}</p>-->
                <p style="text-align:center">締め切り: {{$todo->deadline}}</p>
                <form action="/todos/{{ $todo->id }}" id="from_delete" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" style="display:none"/>
                    <p style="text-align:center" class='delete'>[<span onclick="deleteTodo(this)">削除</span>]</p> 
                </form>
                <script>
                    function deleteTodo(e){
                        'use strict';
                        if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                            document.getElementById('from_delete').submit();
                        }   
                    }
                </script>
                <br/> 
        @endforeach
    </body>
</html>