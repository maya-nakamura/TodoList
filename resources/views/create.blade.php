<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <title style="text-align:center">Todo</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
    </head>
    <br/>
    
    <body>
        <h1 style="text-align:center">Todo</h1>
        <br/>
        <form action="/todos" method="POST" style="text-align: center;"> 
            @csrf
            
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="todo[title]" placeholder="task" value="{{ old('todo.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('todo.title') }}</p>
            </div>
            <div class="tag">
                <h2>Tag</h2>
                <input align="center" type="text" name="tag[tagname]" placeholder="tag" value="{{ old('tag.tagname') }}"/>
                <p class="tag__error" style="color:red">{{ $errors->first('tag.tagname') }}</p>
            </div>
            <div class="body">
                <h2>Details</h2>
                <textarea align="center" name="todo[body]" placeholder="memo">{{ old('todo.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('todo.body') }}</p>
            </div>
            <div class="deadline">
                <h2>Deadline</h2>
                <input align="center" class="flatpickr" type="text" placeholder="Select Date.." name="todo[deadline]">{{ old('todo.deadline') }}</input>
                <script>
                    flatpickr('.flatpickr');
                </script>
                <p class= "deadline__error" style="color:red">{{ $errors->first('todo.deadline') }}</p>
            </div>
            
            <input type="submit" value="serve"/>
        </form>
        <div class="back" style="text-align:center">[<a href="/">back</a>]</div>
    </body>
    
</html>