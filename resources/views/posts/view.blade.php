@extends("../layouts/layout")
@section("title") Index @endsection
@section("body")
    <div class="container">
        <div class="card my-4 col-12">  
            <div class="card-body">
                <h3 class="card-title">{{$post->title}}</h3>
                <p>{!! Illuminate\Mail\Markdown::parse($post->content) !!}</p>
                <div style="float:right;">
                    @if(Auth::user()->id === $post->user_id)
                    <form method="POST" style="display:inline-block;" action="/post/{{$post->id}}">
                        <button type="submit" class="btn btn-outline-warning">Edit Post</button>
                    </form>
                    <form method="DELETE" style="display:inline-block;" action="/post/{{$post->id}}">
                        <a href="/post/{{$post->id}}" class="btn btn-outline-danger">Delete Post</a>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="card my-4">  
            <div class="card-body">
                <form class="mb-3">
                    <label for="comment" class="form-label">
                        <b>Comment</b>
                    </label>
                    <textarea style="overflow:auto;resize:none;" placeholder="Add comment ..."
                     class="form-control" id="comment" rows="3"></textarea>
                </form>
                <a href="/post/{{$post->id}}" class="btn btn-outline-success" style="float:right;">Add Comment</a>
            </div>
        </div>
    </div>
@endsection