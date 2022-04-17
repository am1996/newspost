@extends("../layouts/layout")
@section("title") Register @endsection
@section("body")
<div class ="container mt-5">
    <h1 class="text-center">Register</h1>
    @if($errors->any())
        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
    @endif
    <div class="col-md-6 offset-md-3 mb-3">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <form method="POST">
            @csrf
            <div class="mb-3">
                <label for="fullname" class="form-label">Fullname</label>
                <input name="name" type="text" class="form-control" id="fullname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="retype_password" class="form-label">Retype Password</label>
                <input type="password" class="form-control" id="retype_password" name="confirm_password">
            </div>
            <button type="submit" class="btn btn-outline-success form-control">Register</button>
        </form>
    </div>
</div>
@endsection