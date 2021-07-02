<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    
    <body>
        <h1 class="title">編集ページ</h1>
        
        <div class="content">
            
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="content_title">
                    <h2>Title</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ $post->title }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                
                <div class="content_body">
                    <h2>Body</h2>
                    <input type="text" name="post[body]" placeholder="本日の内容" value="{{ $post->body }}"/>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                
                <input type="submit" value="serve"/>
            </form>
        </div>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
    
</html>