<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        $user = User::find($user_id);
        $posts = Post::where('user_id',$user_id)->get();
        return view('profile', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
