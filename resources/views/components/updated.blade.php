<span class="">
    <span class="p-1 mb-1 text-muted text-decoration-none">
        {{ empty(trim($slot)) ? 'Added ' : $slot }} {{ $date->diffForHumans()}}
        @if(isset($name))
            @if(isset($userId))
                by <a href="{{ route('users.show' , ['user' => $userId]) }}">{{ $name }}</a>
            @else
                by, {{ $name }}
            @endif
        @endif
    </span>
</span>