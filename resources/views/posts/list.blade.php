@extends("../layouts/layout")
@section("title") Index @endsection
@section("body")
    <div class="container">
        @if($posts->count() > 0)
        @foreach ($posts as $post )
            <div class="card">
                <h1 class="card-head"> {{ $post->title }} </h1>
                <p>{{ Illuminate\Mail\Markdown::parse($post->content) }}</p>
            </div>
        @endforeach
        @else
        <h1 class="mt-5 text-center">No News Yet!</h1>
        @endif
    </div>
@endsection