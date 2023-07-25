
{{-- <div class="container"> --}}
    <p class="fs-6 text-light mt-0 mb-2 pe-3">Sort By :   
        {{-- <a href="{{ route('posts.index') }}" class="fs-7 mt-0 mb-1 btn btn-outline-zunnur btn-smz">ALL</a> --}}

        @foreach ($tags as $tag)
            <a href="{{ route('posts.tags.index', [$tag->id]) }}" class="fs-7 mt-0 mb-1 btn btn-outline-zunnur btn-smz">{{ $tag->name }}</a>
        @endforeach
        {{-- <a href="{{ route('posts.tags.index', [$tags -> id = 1]) }}" class="fs-7 mt-0 mb-1 btn btn-outline-zunnur btn-smz">Science</a>
        <a href="{{ route('posts.tags.index', [$tags -> id = 2]) }}" class="fs-7 mt-0 mb-1 btn btn-outline-zunnur btn-smz">Sports</a>
        <a href="{{ route('posts.tags.index', [$tags -> id = 3]) }}" class="fs-7 mt-0 mb-1 btn btn-outline-zunnur btn-smz">Automotive</a>
        <a href="{{ route('posts.tags.index', [$tags -> id = 4]) }}" class="fs-7 mt-0 mb-1 btn btn-outline-zunnur btn-smz">Entertainment</a>
        <a href="{{ route('posts.tags.index', [$tags -> id = 5]) }}" class="fs-7 mt-0 mb-1 btn btn-outline-zunnur btn-smz">Technology</a>
        <a href="{{ route('posts.tags.index', [$tags -> id = 6]) }}" class="fs-7 mt-0 mb-1 btn btn-outline-zunnur btn-smz">Coding</a>             --}}
    </p>
{{-- </div> --}}
