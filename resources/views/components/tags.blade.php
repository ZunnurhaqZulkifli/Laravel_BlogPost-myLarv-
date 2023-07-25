<p class="mb-0">
    @foreach ($tags as $tag)
        <a href="{{ route('posts.tags.index', ['tag' => $tag->id]) }}" class="fs-7 mt-0 mb-1 btn btn-outline-zunnur btn-smz">{{ $tag->name }}</a>
    @endforeach
</p>