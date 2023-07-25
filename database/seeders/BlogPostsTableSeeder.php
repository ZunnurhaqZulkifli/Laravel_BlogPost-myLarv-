<?php

// namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogCount = (int)$this->command->ask('How Many Blog-Post Would You Like ?', 25);
        $users = App\User::all();
        
        factory(App\BlogPost::class, $blogCount)->make()->each(function($post) use ($users) {
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
