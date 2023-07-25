@extends('layout')

@section('content')
    <div class="display-2 text-orange mb-2">All of your posts</div>
    <div class="card border-orange">
        @foreach ($posts as $post)
            <div class="p-2">
                <div class="card">
                    <a href="{{ route('posts.show', [$post->id]) }}" class="mt-2 h3 text-decoration-none text-dark text-center">{{ $post->title }}</a>

                    @if ($post->image)
                        <img class="img-fluid mt-2 mb-2 mx-auto rounded d-block" style="width:480px;height:260px"
                            src="{{ $post->image->url() }}">
                    @else
                        
                    @endif
                    
                    @forelse ($post->comments as $comment)
                        <a class="text-center text-dark h4">{{ $comment->content }}</a>
                    @empty
                        No Comment Yet!
                    @endforelse
                    
                </div>
            </div>
        @endforeach
    </div>
@endsection
