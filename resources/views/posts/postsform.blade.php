@extends("../layouts/layout")
@section("title") Add Post @endsection
@section("body")
<link rel="stylesheet" href="{{ asset('css/simplemd.min.css') }}">
<script src="{{ asset('js/simplemd.min.js') }}"></script>
<div class="container bg-transparent p-4 mt-5">
    <h1 class="text-center m-2">Add Post</h1>
    <form method="post">
        <div>
            <label for="editor" class="text-gray-600 font-semibold">Title</label>
            <input name="title" type="text" name="title" class="form-control">
        </div>
        <input type="hidden" name="content" id="content">
        <div>
            <label for="editor">Content</label>
            <textarea id="editor"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-outline-success form-control">Add Post</button>
        </div>
    </form>
</div>
<script>
const editMde = new SimpleMDE({
    element: document.getElementById('editor'),
});
</script>
@endsection