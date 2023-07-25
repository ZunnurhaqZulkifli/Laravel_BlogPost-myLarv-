<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Events\BlogPostPosted;
use App\Facades\CounterFacade;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['create' , 'store' , 'edit' , 'update' , 'destroy']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $tags = Tag::all();
        $user = Auth::user();
        $totalPosts = BlogPost::all()->count();
        $posts = BlogPost::latestWithRelations()->get();
            // ->paginate(5);

        // dd($totalPosts);

        return view(
            'posts.index', 
            [
                'tags' => $tags,
                'user' => $user,
                'posts'=> $posts,
                'totalPosts' => $totalPosts,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('posts.create'); //<---This Allows Specific Users To Allow the Action 
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = $request->user()->id;
        $blogPost = BlogPost::create($validatedData);
        
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails');
            $blogPost->image()->save(
                Image::make(['path' => $path])
            );
        }

        event(new BlogPostPosted($blogPost));
        $request->session()->flash('status' , 'The blogpost was created successfully!');
        return redirect()->route('posts.show' , ['post' => $blogPost->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // abort_if(!isset($this->posts[$id]), 404);

        //     return view('posts.show' , [
        //         'post' => BlogPost::with(['comments' => function ($query) {
        //             return $query->latest();
        //         }])->findOrFail($id),
        // ]);
        $blogPost = Cache::tags(['blog-post'])->remember("blog-post-{$id}", 60, function() use($id) {
            return BlogPost::with('comments' , 'tags' , 'user' , 'comments.user')->findOrFail($id);
        });

        // $counter = resolve(Counter::class);
        // dd($this->counter);

        return view('posts.show' , [
                'post' => $blogPost,
                'counter' => CounterFacade::increment("blog-post-{$id}", ['blog-post']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view ('posts.edit' , ['post' =>BlogPost::findOrFail($id)]);
        $post = BlogPost::findOrFail($id);
        $this->authorize($post);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $this->authorize($post);

        // if (Gate::denies('update-post', $post)) {
        //     abort(403, "MASS ERROR YOU CAN'T DO THAT! :(");
        // }

        $validatedData = $request->validated();
        $post->fill($validatedData);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails');
            
            if ($post->image) {
                Storage::delete($post->image->path);
                $post->image->path = $path;
                $post->image->save();
            } else {
                $post->image()->save(
                    Image::make(['path' => $path])
                );
            }
            
        }

        $post->save();
        $request->session()->flash('status' , 'BlogPost was updated!');
        return redirect()->route('posts.show' , ['post'=> $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);

        // if (Gate::denies('delete-post', $post)) {
        //     abort(403, "SORRY, YOU'RE NOT THE USER :(");
        // }

        $this->authorize($post);
        $post->delete();
        session()->flash('status' , 'Blog post was deleted!');
        return redirect()->route('posts.index');
    }
}
