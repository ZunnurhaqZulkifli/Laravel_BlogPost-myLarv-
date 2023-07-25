@extends('layout')

@section('content')

    <p class="display-4 font-weight-bold text-orange">Blog Posts</p>

    <p class="text-light">This is all the BlogPosts that is in the fourm</p>

    @auth
        <a href="{{ route('posts.index') }}" class="fs-7 mt-0 mb-1 btn btn-outline-zunnur btn-smz">ALL</a>
        @foreach ($tags as $tag)
            <a href="{{ route('posts.tags.index', [$tag->id]) }}"
                class="fs-7 mt-0 mb-1 btn btn-outline-zunnur btn-smz">{{ $tag->name }}</a>
        @endforeach
    @endauth



<hr class="text-light">
    <div class="row">
        <div class="col-9">

            @forelse ($posts as $post)
                <div class="card border-orange p-4 mb-1 bg-transparent col-12 shadow">
                    <div class="card border-orange bg-light shadow-sm">

                        @if ($post->trashed())
                            <del>
                        @endif
                        <div class="text-center h4 p-3 ">
                            <a class="{{ $post->trashed() ? 'text-muted' : '' }} || mb-0 text-dark text-decoration-none"
                                href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
                        </div>
                        @if ($post->trashed())
                            </del>
                        @endif

                        <hr class="mt-0 text-orange col-4 mx-auto">

                        <span class="mt-0 p-0 mb-1zr text-center text-muted">
                            @updated(['date' => $post->created_at, 'name' => $post->user->name, 'userId' => $post->user->id])@endupdated
                            {{-- Added {{ $post->created_at->diffForHumans()}}
                    by {{ $post->user?->name }} --}}
                            {{-- by {{ $post->user->name }} --}}
                        </span>
                    </div>

                    <div class="mt-2 p-1 card text-dark border-orange bg-light text-center shadow">
                        <div class="fs-7 text-dark">

                            {{-- @if ($post->comments_count)
                                <p class="p-1">{{ $post->comments_count }} {{ __('Comments') }}</p>
                            @else
                                <p class="p-1">No Comments Yet</p>
                            @endif --}}

                            {{ trans_choice('messages.comments', $post->comments_count) }}
                        </div>

                        <h7 class="fst-italic text-redmode mb-1">tags :</h7>
                        @tags(['tags' => $post->tags])
                        @endtags
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            @auth
                                @can('update', $post)
                                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                                        class="btn-lg w-100 btn rounded-pill btn-outline-primary">Edit</a>
                                @endcan('update')
                            @endauth

                        </div>
                        <div class="col">
                            @auth
                                @if (!$post->trashed())
                                    @can('delete', $post)
                                        <form method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" value="Delete"
                                                class="btn btn-outline-danger rounded-pill btn-lg w-100">Delete</button>
                                        </form>
                                    @endcan('delete')
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>

                <hr class="text-light">
            @empty
                <p>No blog posts yet!</p>
            @endforelse
        </div>

        <div class="col-3">
            @auth
                <div class="card bg-transparent border-orange">
                    <div class="fs-5 p-2 text-zunnur text-center">Post Manager</div>

                    <div class="p-2">
                        <a class="btn btn-sm btn-outline-zunnur w-100 rounded-pill mb-2"
                            href="{{ route('posts.create') }}">Create A Post</a>
                        <a class="btn btn-sm btn-outline-zunnur w-100 rounded-pill mb-2"
                            href="{{ route('users.show', [$user->id]) }}">My Profile</a>
                        <a class="btn btn-sm btn-outline-zunnur w-100 rounded-pill mb-2"
                            href="{{ route('user.posts', [$user->id]) }}">My Posts</a>
                        <a class="btn btn-sm btn-outline-zunnur w-100 rounded-pill mb-2">Total Posts ({{ $totalPosts }})</a>
                    </div>
                </div>

                <hr class="text-light">
            @endauth
            @include('posts.activity')
        </div>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>

@endsection('content')
