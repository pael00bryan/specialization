<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // public function create(){
    //     return view('post.create');
    // }

    public function store(){
        $data = request([
            'comment' => 'required',
            'user_id' => 'filled',
            'post_id' => 'filled'
        ]);

        $comment = Comment::create($request->all());

        if($comment){
            return ["status" => "true", "commentId" => $comment->id];
        }
    }
}
