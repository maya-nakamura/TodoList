<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TodoList</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <br/> 
        <h1 style="text-align:center">Todo List</h1>
        <br/> 
        <h3 style="text-align:center"><a href='/todos/create'>create</a></h3>
        <br/> 
        
        <form class="form-inline my-2 my-lg-0 ml-2">
            <div class="form-group">
                <input type="search"  style="position: absolute; left: 100px; top: 100px"/ class="form-control mr-sm-2" name="search" value="{{request('search')}}" placeholder="タグ検索" aria-label="検索...">
                <input type="submit"  style="position: absolute; left: 325px; top: 100px"/ value="検索" class="btn btn-info">
            </div>
        </form>
        
        @foreach ($todos as $todo)
                <h3 style="text-align:center"><a href="/todos/{{$todo->id}}">{{$todo->title}}</a></h3>
                <p style="text-align:center">tag:
                    @foreach($todo->tags as $tag)
                        {{$tag->tagname}}
                    @endforeach
                </p>
                <p style="text-align:center">body: {{$todo->body}}</p>
                <p style="text-align:center">dead_line: {{$todo->deadline}}</p>
                <br/> 
        @endforeach
    </body>
</html>