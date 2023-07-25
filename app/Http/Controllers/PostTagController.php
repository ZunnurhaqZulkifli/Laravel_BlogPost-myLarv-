<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostTagController extends Controller
{

    public function index($tag) 
    { 
        $tags = Tag::all();
        $user = Auth::user();
        $totalPosts = BlogPost::all()->count();
        $tag = Tag::findOrFail($tag);

        return view('posts.index', 
            [
                'tags'=> $tags,
                'user' => $user,
                'totalPosts' => $totalPosts,
                'posts'=> $tag->blogPosts()
                ->latestWithRelations()
                ->get(),
        ]);
    }

    // public function sort($tag)
    // {
    //     $tag = Tag::findOrFail($tag);

    //     return view('posts.index', [
    //         'posts' => $tag->blogPosts()
    //             ->latestWithRelations()
    //             ->get(),
    //     ]);
    // }
}
