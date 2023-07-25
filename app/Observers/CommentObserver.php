<?php

namespace App\Observers;

use App\Comment;
use Illuminate\Support\Facades\Cache;
use App\BlogPost;

class CommentObserver
{
    public function creating(Comment $comment)
    {

        if ($comment->commentable_type === BlogPost::class) {
            // dd("I am creating");
            Cache::tags(['blog-post'])->forget("blog-post-{$comment->commentable_id}");
            Cache::tags(['blog-post'])->forget('mostCommented');
        }
    }
}
