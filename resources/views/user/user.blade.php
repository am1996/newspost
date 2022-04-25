@extends("../layouts/layout")
@section("title") User Dashboard @endsection
@section("body")
<div class ="container mt-5">
    <div class="col-md-8 offset-md-2 mb-3">
    @if($errors->any())
        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    </div>
    <div class="col-md-8 offset-md-2 mb-3 card p-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>Fullname: {{ Auth::user()->name }}</div>
            <div class="btn" data-bs-toggle="collapse" data-bs-target="#collapseFullnameForm">
                Edit
            </div>
        </div>
        
        <form method="POST" class="collapse" id="collapseFullnameForm">
            @csrf
            <input type="text" name="name" class="form-control mb-2"/>
            <input type="submit" value="Change Fullname" class="btn col-12 btn-success">
        </form>
    </div>
    <div class="col-md-8 offset-md-2 mb-3 card p-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>Email: {{ Auth::user()->email }}</div>
            <div class="btn" data-bs-toggle="collapse" data-bs-target="#collapseEmailForm">
                Edit
            </div>
        </div>
        
        <form method="POST" class="collapse" id="collapseEmailForm">
            @csrf
            <input type="email" name="email" class="form-control mb-2"/>
            <input type="submit" value="Change E-mail" class="btn col-12 btn-success">
        </form>
    </div>
    <div class="col-md-8 offset-md-2 mb-3 card p-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>Password: ***************************</div>
            <div class="btn" data-bs-toggle="collapse" data-bs-target="#collapsePasswordForm">
                Edit
            </div>
        </div>
        
        <form method="POST" class="collapse" id="collapsePasswordForm">
            @csrf
            <input placeholder="Password" type="password" name="password" class="form-control mb-2" required/>
            <input placeholder="Verify Password" type="password" name="confirm_password" class="form-control mb-2" required/>
            <input type="submit" value="Change Password" class="btn col-12 btn-success">
        </form>
    </div>
    <div class="col-md-8 offset-md-2 mb-3 card p-4">
        <div>
            <span>Updated At: {{ Auth::user()->updated_at->format("d M, Y - H:i A") }}</span>
        </div>
    </div>
    <div class="col-md-8 offset-md-2 mb-3 card p-4">
        <div>
            <span>Created At: {{ Auth::user()->updated_at->format("d M, Y - H:i A") }}</span>
        </div>
    </div>
</div>
@endsection