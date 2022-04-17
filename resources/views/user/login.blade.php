@extends("../layouts/layout")
@section("title") Login @endsection
@section("body")
<div class ="container mt-5">
    <h1 class="text-center">Login</h1>
    <div class="col-md-6 offset-md-3 mb-3">
        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-outline-success form-control">Login</button>
        </form>
    </div>
</div>
@endsection