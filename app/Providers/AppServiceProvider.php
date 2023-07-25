<?php

namespace App\Providers;

use App\BlogPost;
use App\Comment;
use App\Observers\BlogPostObserver;
use App\Observers\CommentObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\ActivityComposer;
use App\Services\Counter;
use App\Http\Resources\Comment as CommentResource;
use App\Services\DummyCounter;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout', function ($user) {
            $user->with('user', Auth::user());
            // dd($user);
        });

        view()->composer('components.tags_sort', function ($tag) {
            $tag->with('tags', Auth::user());
        });

        // view()->composer('products.form', function ($tag) {
        //     $tag->with('tags', Auth::user());
        // });

        Schema::defaultStringLength(191);
        Blade::aliasComponent('components.badge', 'badge');
        Blade::aliasComponent('components.updated', 'updated');
        Blade::aliasComponent('components.card', 'card');
        Blade::aliasComponent('components.tags', 'tags');
        Blade::aliasComponent('components.categories', 'categories');
        Blade::aliasComponent('components.tags_sort', 'tags_sort');
        Blade::aliasComponent('components.errors', 'errors');
        Blade::aliasComponent('components.comment-form', 'commentForm');
        Blade::aliasComponent('components.comment-list', 'commentList');

        view()->composer(['posts.index', 'posts.show'], ActivityComposer::class);

        BlogPost::observe(BlogPostObserver::class);
        Comment::observe(CommentObserver::class);

        $this->app->singleton(Counter::class, function ($app) {
            return new Counter(
                $app->make('Illuminate\Contracts\Cache\Factory'),
                $app->make('Illuminate\Contracts\Session\Session'),
                env('COUNTER_TIMEOUT'
            ));
            // return new Counter(random_int(0, 100));
        });

        $this->app->bind(
            'App\Contracts\CounterContract',
            Counter::class
        );

        CommentResource::withoutWrapping();

        // $this->app->when(Counter::class) 
            // ->needs('$timeout')
            // ->give(env('COUNTER_TIMEOUT'));
        

        Schema::defaultStringLength(191);
    }
}
