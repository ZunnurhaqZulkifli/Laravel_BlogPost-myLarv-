@extends('layout')

@section('content')

    <div class="card bg-transparent border-orange">
        <div class="p-4 row">
            <div class="col-4">
                <h3 class="text-light text-center">{{ $user->name }} 's Profile</h3>

                <div class="card border-orange bg-transparent">
                    <img src="{{ $user->image ? $user->image->url() : '' }}" class="img-thumbnail mt-3 avatar mx-auto"
                        style="width:250px; height:250px;" />

                    <div class="p-2">
                        <a class="btn btn-sm btn-outline-zunnur w-100 mt-2"
                            href="{{ route('users.edit', [$user->id]) }}">Edit Profile</a>
                    </div>

                    <div class="p-2">
                        <ul class="text-light">
                            <li class="">{{ $user->name }}</li>
                            <li class="">{{ $user->email }}</li>

                            @if ($user->is_admin)
                                <li class="">This user is admin</li>
                            @else
                                <li class="">This user is not admin</li>
                            @endif

                        </ul>
                        {{-- <a class="btn btn-sm btn-outline-zunnur w-100" href="{{ route('users.edit', [$user->id]) }}">Edit Profile</a> --}}
                    </div>
                </div>
                <div class="text-center mt-2 card border-orange bg-transparent">
                    <div class="p-1">
                        <a class="h6 text-decoration-none text-light">Seen by {{ $counter }} Users.</a>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <h3 class="text-light text-center">{{ $user->name }} 's Comments</h3>

                @commentList(['comments' => $user->commentsOn])
                @endcommentList

                @commentForm(['route' => route('users.comments.store', ['user' => $user->id])])
                @endcommentForm

            </div>
        </div>
    </div>

@endsection
