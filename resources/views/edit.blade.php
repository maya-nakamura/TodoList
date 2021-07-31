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
    
    <body>
        <br/>
        <h1 class="title" style="text-align:center">Edit Paged</h1>
        <br/>
        
        <div class="content" style="text-align:center">
            
            <form action="/todos/{{ $todo->id }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="content_title">
                    <h2>Title</h2>
                    <input type="text" name="todo[title]" placeholder="task" value="{{ $todo->title }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('todo.title') }}</p>
                </div>
                
                <div class="content_tag" style="text-align: center;">
                    <h2 style="text-align:center">Tag</h2>
                    @foreach($todo->tags as $tag)
                        <input type="text" name="tag[tagname]" placeholder="tag" value="{{ $tag->tagname }}"/>
                        <p style="text-align:center" class="tag__error" style="color:red">{{ $errors->first('tag.tagname') }}</p>
                    @endforeach
                </div>
                
                <div class="content_body" style="text-align: center;">
                    <h2 style="text-align:center">Details</h2>
                    <input type="text" name="todo[body]" placeholder="memo" value="{{ $todo->body }}"/>
                    <p  style="text-align:center"class="body__error" style="color:red">{{ $errors->first('todo.body') }}</p>
                </div>
                
                <div class="content_deadline" style="text-align: center;">
                    <h2 style="text-align:center">Deadline</h2>
                    <input style="text-align:center" class="flatpickr" type="text" name="todo[deadline]" placeholder="Select Date.." value="{{ $todo->deadline }}"/>
                    <p style="text-align:center" class="deadline__error" style="color:red">{{ $errors->first('todo.deadline') }}</p>
                    <script>
                        flatpickr('.flatpickr');
                    </script>
                </div>
                
                <input style="text-align:center" type="submit" value="serve"/>
            </form>
        </div>
        <div style="text-align:center" class="back">[<a href="/">back</a>]</div>
    </body>
    
</html>