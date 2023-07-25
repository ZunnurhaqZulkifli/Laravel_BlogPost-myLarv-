@card(['title' => 'Most Commented'])
    @slot('subtitle')
        " What People are currently talking about "
    @endslot

    @slot('items')
    <div class="p-2">
        @foreach ($mostCommented as $post)
        <div class="card border-orange mb-2 text-center bg-transparent">
            <a class="mt-1 bg-transparent text-light btn btn-sm"
                href="{{ route('posts.show', ['post' => $post->id]) }}">
                {{ $post->title }}
            </a>
        </div>
        @endforeach    
    </div>
    @endslot
@endcard

<hr class="text-muted">

@card(['title' => 'Most Active'])
    @slot('subtitle')
        " Writers with most posts written "
    @endslot
    @slot('items', collect($mostActive)->pluck('name'))
@endcard

<hr class="text-muted">

@card(['title' => 'Most Active Last Month'])
    @slot('subtitle')
        " Writers with most posts written last month "
    @endslot
    @slot('items', collect($mostActiveLastMonth)->pluck('name'))
@endcard
