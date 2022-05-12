<?php

namespace App\Http\Livewire;

use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    protected $listeners = ['refreshComments'=>'$refresh'];
    public $commentData="";
    public $commentEditData="";
    public $post_id;
    public $comments=[];
    public function mount(SessionManager $sm,$post_id){
        $this->post_id = $post_id;
        $this->comments = \App\Models\Comments::where("post_id",$this->post_id)->with("author")->get();
    }
    public function add(){
        if(Auth::check()){
            $this->validate([
                "commentData" => "required"
            ]);
            $comment = new \App\Models\Comments();
            $comment->user_id = auth()->user()->id;
            $comment->post_id = $this->post_id;
            $comment->content = $this->commentData;
            $comment->save();
            $this->commentData = "";
            $this->comments = \App\Models\Comments::where("post_id",$this->post_id)->with("author")->get();
            $this->emit("refreshComments");
        }else{
            $this->errors()->add('message', 'You need to be logged in!');
        }
    }
    public function delete($id){
        $comment = \App\Models\Comments::where("id",$id)->get()[0];
        if($comment->user_id === auth()->user()->id){
            $comment->delete();
            $this->comments = \App\Models\Comments::where("post_id",$this->post_id)->with("author")->get();
            $this->emit("refreshComments");
        }else{
            $this->errors()->add('message', 'Forrbidden Action!');
        }
    }
    public function edit($id){
        $comment = \App\Models\Comments::where("id",$id)->get()[0];
        if($comment->user_id === auth()->user()->id){
            $comment->update(["content"=> $this->commentEditData]);
            $this->emit("refreshComments");
        }else{
            $this->errors()->add("message","Forrbidden Action!");
        }
        
    }
    public function render(){
        return view('livewire.comment',[
            "post_id"=>$this->post_id
        ]);
    }
}
