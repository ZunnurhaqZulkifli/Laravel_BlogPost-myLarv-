@extends('layout')

@section('content')

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group mt-2 text-light">
            <label class="text-light">Name</label> 
            <input name="name" value="{{ old('name') }}" required class="text-light form-control {{ $errors->has('name') ? 'is-invalid':'' }}">


            @if ($errors->has('name'))

            <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group mt-4">
        <label class="text-light">E-mail</label> 
            <input name="email" value="{{ old('email') }}" required class="text-light form-control {{ $errors->has('email') ? 'is-invalid':'' }}">
            
            @if ($errors->has('email'))

            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group mt-4">
        <label class="text-light">Password</label> 
            <input name="password" required type="password" required class="text-light form-control {{ $errors->has('password') ? 'is-invalid':'' }}">
            
            @if ($errors->has('password'))

            <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group mt-4">
        <label class="text-light">Retyped Password</label> 
            <input name="password_confirmation" value="" required class="text-light form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
        </div>
        
        <button type="submit" class="mt-4 mx-auto btn btn-outline-primary col-12">Register!</button>
    </form>

@endsection('content')