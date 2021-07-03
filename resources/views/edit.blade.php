<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Todo</title>
    </head>
    
    <body>
        <h1 class="title">Edit Paged</h1>
        
        <div class="content">
            
            <form action="/todos/{{ $todo->id }}" method="TODO">
                @csrf
                @method('PUT')
                
                <div class="content_title">
                    <h2>Title</h2>
                    <input type="text" name="todo[title]" placeholder="task" value="{{ $todo->title }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('todo.title') }}</p>
                </div>
                
                <div class="content_tag">
                    <h2>Tag</h2>
                    @foreach($todo->tags as $tag)
                        <input type="text" name="tag[tagname]" placeholder="tag" value="{{ $tag->tagname }}"/>
                        <p class="tag__error" style="color:red">{{ $errors->first('tag.tagname') }}</p>
                    @endforeach
                </div>
                
                <div class="content_body">
                    <h2>Details</h2>
                    <input type="text" name="todo[body]" placeholder="memo" value="{{ $todo->body }}"/>
                    <p class="body__error" style="color:red">{{ $errors->first('todo.body') }}</p>
                </div>
                
                <div class="content_deadline">
                    <h2>Deadline</h2>
                    <input type="text" name="todo[deadline]" placeholder="211231" value="{{ $todo->deadline }}"/>
                    <p class="deadline__error" style="color:red">{{ $errors->first('todo.deadline') }}</p>
                </div>
                
                <input type="submit" value="serve"/>
            </form>
        </div>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
    
</html>