@extends('layout')

@section('content')
    <form method="POST" 
          action="{{ route('posts.update', ['post' => $post->id]) }}" 
          enctype="multipart/form-data">
        
        @csrf
        @method('PUT')

        @include('posts.form')

        <br>
        
        <button type="submit" class="btn btn-outline-warning col-12 shadow">Update!</button>
    </form>

@endsection('content')