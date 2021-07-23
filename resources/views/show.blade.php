<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <title style="text-align:center">TodoList</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <h1 style="text-align:center">Todo</h1>
        <p style="text-align:center" class='edit'>[<a href="/todos/{{ $todo->id }}/edit">edit</a>]</p>
        
        <form action="/todos/{{ $todo->id }}" id="from_delete" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none"/>
            <p style="text-align:center" class='delete'>[<span onclick="deleteTodo(this)">delete</span>]</p> 
        </form>
        
        <div class='contents'>
            <h2 style="text-align:center">{{ $todo->title }}</h2>
            <p style="text-align:center">
                @foreach($todo->tags as $tag)
                    {{$tag->tagname}}
                @endforeach
            </p>
            <p style="text-align:center">{{ $todo->body }}</p>
            <p style="text-align:center">{{ $todo->deadline }}</p>
        </div>
        
        <div style="text-align:center" class='back' style="text-align:center">[<a href='/'>back</a>]</div>
        
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