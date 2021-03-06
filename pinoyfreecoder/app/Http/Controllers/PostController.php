<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = auth()-> user()-> following()-> pluck('profiles.user_id');

        // $posts = Post::wherein('user_id', $users)-> latest()->get();
        $posts = Post::wherein('user_id', $users)-> latest()->paginate(3);
        $users = User::all();

        return view('posts.index', compact('posts', 'users'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);
        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(1200,1200);
        
        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);
        return redirect('/profile/' . auth()->user()->id);
    }


    public function show(\App\Models\Post  $post){
        return view('posts/show', compact('post'));
    }


}
