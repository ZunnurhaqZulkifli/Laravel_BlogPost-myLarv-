<?php

namespace App\Observers;

use App\BlogPost;
use Illuminate\Support\Facades\Cache;

class BlogPostObserver
{
    /**
     * Handle the BlogPost "created" event.
     *
     * @param  \App\BlogPost  $blogPost
     * @return void
     */

    public function updating(BlogPost $blogPost)
    {
        Cache::tags(['blog-post'])->forget("blog-post-{$blogPost->id}");
    }

    public function deleting(BlogPost $blogPost)
    {

        // dd("I am delete");
        $blogPost->comments()->delete();
        Cache::tags(['blog-post'])->forget("blog-post-{$blogPost->id}");

    }

    public function restoring(BlogPost $blogPost)
    {
        $blogPost->comments()->restore();
    }
}
