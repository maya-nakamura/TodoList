<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TodoList</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Todo List</h1>
        <h3><a href='/todos/create'>create</a></h3>
        @foreach ($todos as $todo)
                <h3><a href="/todos/{{$todo->id}}">{{$todo->title}}</a></h3>
                <p>tag:
                    @foreach($todo->tags as $tag)
                        {{$tag->tagname}}
                    @endforeach
                </p>
                <p>body: {{$todo->body}}</p>
                <p>dead_line: {{$todo->deadline}}</p>
        @endforeach
    </body>
</html>