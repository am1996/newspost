<div>
    <div class="bg-transparent p-4 mt-5">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="flex flex-col space-y-2">
            <label for="editor" class="text-gray-600 font-semibold">Content</label>
            <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"><div>
        </div>
    </div>
</div>
