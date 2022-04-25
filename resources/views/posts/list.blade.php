@extends("../layouts/layout")
@section("title") Index @endsection
@section("body")
    <div class="container">
        @if($posts->count() > 0)
        @foreach ($posts as $post )
            <div class="card my-4">  
                <div class="card-body">
                    <h3 class="card-title">{{$post->title}}</h3>
                    <p>{!! Str::limit(Illuminate\Mail\Markdown::parse($post->content), 250, '...') !!}</p>
                    <div style="float:right;">
                        <a href="/posts/{{$post->id}}" class="btn btn-outline-primary">View Post</a>
                        @if(Auth::user()->id === $post->user_id)
                        <form method="POST" style="display:inline-block;" action="/posts/{{$post->id}}">
                            @csrf
                            <button type="submit" class="btn btn-outline-warning">Edit Post</button>
                        </form>
                        <form method="DELETE" style="display:inline-block;" action="/posts/{{$post->id}}">
                            @csrf
                            <a href="/post/{{$post->id}}" class="btn btn-outline-danger">Delete Post</a>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <h1 class="mt-5 text-center">No News Yet!</h1>
        @endif
    </div>
@endsection