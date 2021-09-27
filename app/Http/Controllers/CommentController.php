<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){

    }
    public function create(){

    }

    public function store(Request $request){
        $request->validate([
            'post_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);
        $comment = new Comment();
        $comment->user_name = $request->name;
        $comment->user_email = $request->email;
        $comment->message = $request->message;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect()->back()->with("toast",['icon'=>'success','title'=>"comment has been added"]);

    }

    public function show(Comment $comment){
    }
}
