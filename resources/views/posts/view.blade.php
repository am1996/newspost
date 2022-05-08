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
                <p>{!! Illuminate\Mail\Markdown::parse(htmlentities($post->content)) !!}</p>
                <footer class="blockquote-footer m-0">{{$post->author->name}} 
                    <cite title="Source Title">
                        {{$post->updated_at->format("d M Y h:i A") }}
                    </cite>
                </footer>
                <div style="clear:both;">
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
        @livewire('comment', ['post_id' => $post->id])
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