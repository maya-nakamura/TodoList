<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <title style="text-align:center">TodoList</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <br/>
    
    <body style="text-align:center">
        <h1>Todo</h1>
        <p class='edit'>[<a href="/todos/{{ $todo->id }}/edit">edit</a>]</p>
        
        <form action="/todos/{{ $todo->id }}" id="from_delete" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none"/>
            <p class='delete'>[<span onclick="deleteTodo(this)">delete</span>]</p> 
        </form>
        <br/>
        
        <div class='contents'>
            <h2>{{ $todo->title }}</h2>
            <p>
                @foreach($todo->tags as $tag)
                    {{$tag->tagname}}
                @endforeach
            </p>
            <p>{{ $todo->body }}</p>
            <p>{{ $todo->deadline }}</p>
        </div>
        
        <div class='back'>[<a href='/'>back</a>]</div>
        
        <script>
        function deleteTodo(e){
            'use strict';
            if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                document.getElementById('from_delete').submit();
            }
        }
        </script>
        
    </body>
    
</html>