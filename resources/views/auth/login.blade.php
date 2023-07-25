@extends('layout')

@section('content')
    <div class="card bg-transparent border-opacity-0">

        <p class="display-1 text-orange">Login</p>

        <hr class="text-orange">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="text-light">E-mail</label>
                <input name="email" value="{{ old('email') }}" required
                    class="text-light form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <br>

            <div class="form-group">
                <label class="text-light">Password</label>
                <input name="password" id="myInput" type="password" required
                    class="text-light form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <input class="mt-4 text-light" type="checkbox" onclick="return passVisib()">
                <span class="text-light ps-1"> Show Password</span>
            </div>
            <p>

            </p>
            <div class="form-group mb-2">
                <input class="text-light" type="checkbox" name="remember" value="{{ old('remember') ? 'checked' : '' }}">
                <label class="form-check-label text-light" for="remember">
                    Remember Me!
                </label>
            </div>

            <button type="submit" class="mx-auto btn btn-primary col-12">Login</button>

        </form>

        <hr class="text-orange">

        <div class="mt-6 p-4 card bg-transparent border-opacity-0">
            <p class="p-2 fs-5 mb-0 text-center text-orange">If you haven't registered,</p>

            <a href="{{ route('register') }}" class="mt-2 col-12 text-light btn btn-sm btn-outline-zunnur">REGISTER HERE</a>
        </div>

    </div>
@endsection('content')
