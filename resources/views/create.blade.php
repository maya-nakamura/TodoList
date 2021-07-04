<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Todo</title>
    </head>
    
    <body>
        <h1>Todo</h1>
        <form action="/todos" method="POST">    <!--method調べる-->
            @csrf
            
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="todo[title]" placeholder="task" value="{{ old('todo.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('todo.title') }}</p>
            </div>
            <div class="tag">
                <h2>Tag</h2>
                <input type="text" name="tag[tagname]" placeholder="tag" value="{{ old('tag.tagname') }}"/>
                <p class="tag__error" style="color:red">{{ $errors->first('tag.tagname') }}</p>
            </div>
            <div class="body">
                <h2>Details</h2>
                <textarea name="todo[body]" placeholder="memo">{{ old('todo.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('todo.body') }}</p>
            </div>
            <div class="deadline">
                <h2>Deadline</h2>
                <input type="text" name="todo[deadline]" placeholder="211231">{{ old('todo.deadline') }}</textarea>
                <p class="deadline__error" style="color:red">{{ $errors->first('todo.deadline') }}</p>
            </div>
            
            <input type="submit" value="serve"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
    
</html>