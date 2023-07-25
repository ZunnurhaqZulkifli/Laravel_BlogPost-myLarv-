@extends('layout')

@section('content')

    <div class="container mt-4">

        <div class="card col-9 bg-transparent">
            <div class="p-1 text-muted text-center">
                <h7 class="fst-italic mt-1">tags :<span>
                        @tags(['tags' => $post->tags])
                        @endtags</span>
                </h7>
            </div>
        </div>

        <hr class="text-orange">

        <div class="row">
            <div class="col-9">
                <div class="card p-4 mb-2 bg-light border-orange shadow">

                    <h1 class="text-dark">
                        {{ $post->title }}
                        @badge(['show' => now()->diffInMinutes($post->created_at) < 20])
                            New BlogPost !
                        @endbadge
                    </h1>

                    <hr class="text-orange">

                    <div class="1h-base text-dark mb-2">Content : {{ $post->content }}</div>

                    <p class="text-muted text-dark">{{ trans_choice('messages.people.reading', $counter) }}</p>

                    <div class="text-center border-orange card mb-2 shadow-sm">

                        @updated(['date' => $post->created_at, 'name' => $post->user->name])
                        @endupdated

                        @updated(['date' => $post->updated_at])
                            Updated -
                        @endupdated

                    </div>

                    @if ($post->image)
                        <div class="card rounded mb-2 border-orange d-block shadow-sm">
                            <img class="img-fluid mt-2 mb-2 mx-auto rounded d-block" style="width:480px;height:260px"
                                src="{{ $post->image->url() }}">
                        </div>
                    @else
                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="text-center mb-2 mt-2"> edit to
                            add
                            images 
                        </a>
                    @endif

                    @commentList(['comments' => $post->comments])
                    @endcommentList

                    @commentForm(['route' => route('posts.comments.store', ['post' => $post->id])])
                    @endcommentForm
                </div>

                <div class="p-1 text-muted text-center">
                    <h7 class="fst-italic mt-1">tags :<span>
                            @tags(['tags' => $post->tags])
                            @endtags</span>
                    </h7>
                </div>

            </div>
        </div>

        <div class="col-3">
            @include('posts.activity')
        </div>
    </div>

@endsection('content')
