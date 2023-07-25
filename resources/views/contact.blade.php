@extends('layout')

@section('content')
    <div class="text-light">
        <div class="p-2">

            <br>

            <p class="display-4"> Zunnurhaq's Contact Page </p>
            <p> This is where all of your contacts will be </p>

            <li class="list-group">
            <li>one</li>
            <li>two</li>
            <li>three</li>
            </li>

            @can('home.secret')
                <a class="btn btn-outline-primary" href="{{ route('secret') }}">This is a secret!</a>
            @endcan

        </div>
    </div>
@endsection
