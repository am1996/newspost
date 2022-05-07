<div>
    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
    @if(session()->has('message'))
        <br>
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div wire:poll.1s>
    @foreach($comments as $comment)
        <div class="card my-2">  
            <div class="card-body">
                <h3>{{$comment->author->name}}</h3>
                <p>{{$comment->content}}</p>
                @if( @Auth::user()->id === $comment->user_id )
                <div style="text-align:right;">
                    <a href="/comments/{{$comment->id}}/edit" data-turbolinks="false" class="btn btn-outline-warning">Edit</a>
                    <form method="POST" id="deletePost" onsubmit="conformBeforeSubmit(event)" style="display:inline-block;" action="/comments/{{$comment->id}}/delete">
                        @csrf 
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    @endforeach
    </div>
    
    @Auth
    <div class="card my-2">  
        <div class="card-body">
            <form class="mb-3" onsubmit="return false">
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
</div>
