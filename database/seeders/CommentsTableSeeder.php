<?php

// namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\BlogPost;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = App\BlogPost::all();

        $users = App\User::all();

        if($posts->count() === 0 || $users->count() === 0) {
            $this->command->info('There Are no Blog Posts or Users, So No Comments Will Be Added!');
            return;
        }
        
        $commentsCount = (int)$this->command->ask('How Many Comments Would You Like ?', 150);

        factory(App\Comment::class, $commentsCount)->make()->each(function($comment) use ($posts, $users) {
            $comment->commentable_id = $posts->random()->id;
            $comment->commentable_type = 'App\BlogPost';
            $comment->user_id = $users->random()->id;
            $comment->save();
        });

        factory(App\Comment::class, $commentsCount)->make()->each(function($comment) use ($users) {
            $comment->commentable_id = $users->random()->id;
            $comment->commentable_type = 'App\User';
            $comment->user_id = $users->random()->id;
            $comment->save();
        });
    }
}
