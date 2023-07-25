<?php

namespace Tests\Feature;

use App\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Comment;
use App\User;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testnoBlogPostWhenNothingIsInDatabase()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('No blog posts yet!');
    }

    public function testSee1BlogPostWhenThereIs1()
    {
        $post = new BlogPost();
        $post->title = 'New Title';
        $post->content = 'Content of the blog post';
        $post->save();

        $response = $this->get('/posts');

        $response->assertSeeText('New Title');
        $response->assertSeeText('No comments yet!');

        $this->assertDatabaseHas('blog_posts' , [
            'title' => 'New Title'

        ]);
    }


    public function testSee1BlogPostWithOneComments()
    {

        $post = $this->createDummyBlogPost();
        $response = $this->get('/posts');

        $response->assertSeeText('New title');
        $response->assertSeeText('No comments yet!');

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New title'
        ]);
    }

    public function testSee1BlogPostWithComments()
    {
        $user = $this->user();
        // Arrange
        $post = $this->createDummyBlogPost();
        factory(Comment::class, 4)->create([
            'commentable_id' => $post->id,
            'commentable_type' => 'App\BlogPost',
            'user_id' => $user->id,
        ]);

        $response = $this->get('/posts');

        $response->assertSeeText('4 comments');
    }

    public function testStoreValid()
    {
        $user = $this->user();

        $params = [
            'title' => 'Valid title',
            'content' => 'At least 10 characters'
        ];

        $this->actingAs($this->user())
            ->post('/posts' , $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'The blogpost was created sucessfully!');
    }


        public function testStoreFail()
        {
                $params = [
                    'title'=> 'x',
                    'content'=> 'x'
                ];

        $this->actingAs($this->user())
            ->post('/posts' , $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');
            

        $messages = session('errors')->getMessages();
            
        $this->assertEquals($messages['title'][0],'The title must be at least 5 characters.');
        $this->assertEquals($messages['content'][0],'The content must be at least 10 characters.');

        }
    
        public function testUpdateValid()
        {
        // $post = new BlogPost();
        // $post->title = 'New title';
        // $post->content = 'Content of the blog post';
        // $post->save();
        
        // $post = new User();
        
        $user = $this->user();
        $post = $this->createDummyBlogPost($user->id);
        
        $params = [
            'title' => 'A new named title',
            'content' => 'Content was changed'
        ];

        $this->actingAs($user)
            ->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blogpost was updated!');
        $this->assertDatabaseMissing('blog_posts', $post->toArray());
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'A new named title'
        ]);
    }

    public function testDelete() 
    {
        // $post = new User();
        
        $user = $this->user();
        $post = $this->createDummyBlogPost($user->id);
        // $this->assertDatabaseHas('blog_posts', $post->toArray());

        $this->actingAs($user)
            ->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog post was deleted!');
        $this->assertDatabaseMissing('blog_posts', $post->toArray());
        // $this->assertSoftDeleted('blog_posts', $post->toArray());
    }
    
    private function createDummyBlogPost($userId = null): BlogPost
    {
        // $post = new BlogPost();
        // $post->title = 'New title';
        // $post->content = 'Content of the blog post';
        // $post->save();
        
        return factory(BlogPost::class)->states('new-title')->create(
            [
                'user_id' => $userId ?? $this->user()->id,
            ]
        );

        // return $post;
    }
}
    