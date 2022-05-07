<?php

namespace App\Http\Livewire;

use Illuminate\Session\SessionManager;
use Livewire\Component;

class Comment extends Component
{
    public $commentData="";
    public $post_id;
    public $comments=[];
    public function mount(SessionManager $sm,$post_id){
        $this->post_id = $post_id;
        $this->comments = \App\Models\Comments::where("post_id",$this->post_id)->with("author")->get();
    }
    public function add(){
        $this->validate([
            "commentData" => "required"
        ]);
        $comment = new \App\Models\Comments();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $this->post_id;
        $comment->content = $this->commentData;
        $comment->save();
        $this->commentData = "";
        session()->flash('message', 'Comment successfully created or updated.');
    }
    public function hydrateCommentData($v){
        $this->comments = $this->comments = \App\Models\Comments::where("post_id",$this->post_id)->with("author")->orderBy("updated_at","desc")->get();
    }
    public function render()
    {
        return view('livewire.comment',[
            "post_id"=>$this->post_id
        ]);
    }
}
