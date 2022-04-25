@extends("../layouts/layout")
@section("title") Index @endsection
@section("body")
    <div class="container">
        @if(session()->has('message'))
            <br>
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="card my-4 col-12">  
            <div class="card-body">
                <h3 class="card-title">{{$post->title}}</h3>
                <p>{!! Illuminate\Mail\Markdown::parse($post->content) !!}</p>
                <div style="clear:both; padding-top:5px;">
                    <div style="float:right;">
                        @if( @Auth::user()->id === $post->user_id )
                        <a href="/posts/{{$post->id}}/edit" data-turbolinks="false" class="btn btn-outline-warning">Edit Post</a>
                        <form method="POST" id="deletePost" onsubmit="conformBeforeSubmit(event)" style="display:inline-block;" action="/posts/{{$post->id}}/delete">
                            @csrf 
                            <button type="submit" class="btn btn-outline-danger">Delete Post</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @Auth
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
        @endAuth
    </div>
    <script>
        function conformBeforeSubmit(event){
            let form = document.getElementById("deletePost");
            event.preventDefault();
            let c = confirm("Are you sure you want to delete this post?");
            if(c == true) form.submit();
        }
    </script>
@endsection