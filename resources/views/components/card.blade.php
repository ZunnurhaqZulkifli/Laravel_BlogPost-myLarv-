<div class="mb-2 card bg-transparent border-orange shadow">
    <div class="card-body">
        <h5 class="card-title text-center text-zunnur">{{ $title }}</h5>
        <h6 class="card-subtitle mb-1 text-light text-center text-muted">{{ $subtitle }}</h6>
    </div>

    <div class="list-group list-group-flush">
        <div class="">
            @if (is_a($items, 'Illuminate\Support\Collection'))
                <div class="p-2">
                    @foreach ($items as $item)
                    <div class="card border-orange mb-2 text-center bg-transparent">
                        <a class="mt-1 bg-transparent text-light btn btn-sm">
                            {{ $item }}
                        </a>
                    </div>
                    @endforeach
                </div>
            @else
                {{ $items }}
            @endif
        </div>
    </div>
</div>
