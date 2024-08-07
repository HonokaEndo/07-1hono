
    <x-app-layout>
        <x-slot name="header">
            Index
        </x-slot>

            <h1>Blog Name</h1>
            <a href="/posts/create">[create]</a>
            <div class='posts'>
                @foreach($posts as $post)
                    <div class='posts'>
                        <a href="/posts/{{ $post->id}}"><h2 class='title'>{{ $post->title }}</h2></a>
                        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                        <p class='body'>{{ $post->body }}</p>
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button"onclick="deletePost({{ $post->id }})">delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class='paginate'>{{ $posts->links()}}</div>
            <script>
                function deletePost(id) {
                    'use strict'
                    
                    if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
            <br>
            ログインユーザー：{{ Auth::user()->name }}
    </x-app-layout>


