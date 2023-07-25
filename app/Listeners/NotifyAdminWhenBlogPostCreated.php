<?php

namespace App\Listeners;

use App\Events\BlogPostPosted;
use App\Jobs\ThrottledMail;
use App\Mail\BlogPostAdded;
use App\User;

class NotifyAdminWhenBlogPostCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    
    public function handle(BlogPostPosted $event)
    {
        User::thatIsAnAdmin()->get()
        ->map(function (User $user) {
            ThrottledMail::dispatch(
                new BlogPostAdded(),
                $user
            );
        });
    }
}
