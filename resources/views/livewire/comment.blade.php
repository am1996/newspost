<div>
    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}

    @Auth
    <div class="card my-2">  
        <div class="card-body">
            <form class="mb-3" onsubmit="return false;">
                <label for="comment" class="form-label">
                    <b>Comment</b>
                </label>
                <textarea wire:model.lazy="commentData" style="overflow:auto;resize:none;" placeholder="Add comment ..."
                class="form-control" id="comment" rows="3"></textarea>
                <br>
                <button wire:click="add" type="submit" class="btn btn-outline-success" style="float:right;">Add Comment</a>
            </form>
        </div>
    </div>
    @endAuth

    <div>
    @foreach($comments as $comment)
        <div class="card my-2" key="{{$comment->id}}">  
            <div class="card-body">
                <h3>{{$comment->author->name}}</h3>
                <p>{{$comment->content}}</p>
                <footer class="blockquote-footer m-0">{{ $comment->updated_at->format("d M Y h:i A") }}</footer>
                @if( @Auth::user()->id === $comment->user_id )
                <div style="text-align:right;">
                    <div class="btn btn-outline-warning" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#collapseEdit-{{$comment->id}}">Edit</div>
                    <form wire:submit="delete({{$comment->id}})" method="POST" id="deletePost" onsubmit="return false;" style="display:inline-block;">
                        @csrf 
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </div>
                <div class="p-2"></div>
                <form wire:submit="edit({{$comment->id}})" class="collapse" id="collapseEdit-{{$comment->id}}" onsubmit="return false;">
                    <textarea rows="3" wire:model.lazy="commentEditData" placeholder="Comment..." type="text" name="comment" class="form-control mb-2">
                        {{$comment->content}}
                    </textarea>
                    <input type="submit" value="Commit Change" class="btn btn-success">
                </form>
                @endif
            </div>
        </div>
    @endforeach
    </div>
</div>
