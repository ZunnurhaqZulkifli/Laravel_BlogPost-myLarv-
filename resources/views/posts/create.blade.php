@extends('layout')

@section('content')
    
    <div class="card border-zunnur bg-dark p-4 mb-1 mt-4">

        <p class="fs-1 mb-1 mt-1 p-2 text-zunnur text-center"> "Feel free to write something here, Don't worry we won't bite :)" </p>
        
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">

            @csrf
            
            @include('posts.form')

            <button class="mx-auto btn btn-outline-primary w-100 shadow" type="submit">Create!</button>

        </form>
    </div>
    
@endsection('content')