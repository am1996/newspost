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
        @if($posts->count() > 0)
        @foreach ($posts as $post )
            <div class="card my-4">  
                <div class="card-body">
                    <h3 class="card-title">{{$post->title}}</h3>
                    <p>{!! Str::limit(Illuminate\Mail\Markdown::parse($post->content), 250, '...') !!}</p>
                    <div>
                        <div style="float:right;">
                            <a href="/posts/{{$post->id}}" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <h1 class="mt-5 text-center">No News Yet!</h1>
        @endif
    </div>
@endsection