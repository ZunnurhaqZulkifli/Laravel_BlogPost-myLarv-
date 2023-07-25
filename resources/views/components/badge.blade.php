@if(!isset($show) || $show)
    <span class="badge opacity-75 bg-{{ $type ?? 'success' }}">
        {{ $slot }} 
    </span>
@endif