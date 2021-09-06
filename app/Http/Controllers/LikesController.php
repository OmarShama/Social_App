<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function isLiked($post_id)
    {
        if (Like::wherePostIdAndUserId($post_id,auth()->user()->id)->exists())
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    public function store(Request $request, $post_id, $liked)
    {
        $post = Post :: find($post_id);
        if ( !($this->isLiked($post_id)) )
        {
            Like::create([
                'post_id' => $post_id,
                'user_id' => auth()->user()->id,
                'liked' => $liked
            ]);
            return redirect()->back();
        }
        else
        {
            $last_like = Like:: select('id')-> wherePostIdAndUserId($post_id,auth()->user()->id);
            if (Like::wherePostIdAndUserIdAndLiked($post_id,auth()->user()->id,!$liked)->exists())
            {
                $last_like->update(['liked' => $liked]);
                return redirect()->back();
            }
            else
            {
                return redirect()->back();
            }
        }
        
    }
}
