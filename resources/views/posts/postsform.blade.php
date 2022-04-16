@extends("../layouts/layout")
@section("title") Add Post @endsection
@section("body")
<div class="container bg-transparent p-4 mt-5">
    <form method="post">
        <div>
            <button type="submit" class="btn btn-outline-success form-control">Add Post</button>
        </div>
        <br>
        <div>
            <label for="editor" class="text-gray-600 font-semibold">Title</label>
            <input name="title" type="text" name="title" class="form-control">
        </div>
        <input type="hidden" name="content" id="content">
        <div>
            <label for="editor">Content</label>
            <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"><div>
        </div>
    </form>
</div>
<script>

</script>
@endsection