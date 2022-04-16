@extends("../layouts/layout")
@section("title") Add Post @endsection
@section("body")
<div class="container bg-transparent p-4 mt-5">
    <form method="post">
        <div class="">
            <label for="editor" class="text-gray-600 font-semibold">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="flex flex-col space-y-2">
            <label for="editor">Content</label>
            <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"><div>
        </div>
        <br>
        <button class="btn btn-success">Add Post</button>
    </form>
</div>
@endsection