<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Laravel Blogpost</title>

    <script>
        function passVisib() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</head>

<body>

    <div class="navbar navbar-dark d-flex flex-column flex-md-row p-3 px-md-4 mb-3 bg-orange shadow">
        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
            aria-controls="offcanvasScrolling"
            class=" h3 my-0 mr-md-auto text-decoration-none text-light">myLarv.com</a>
        <nav class="my-md-0 mr-md-3">
            <a class="btn btn-outline-light" href="{{ route('home') }}">{{ __('Home') }}</a>
            <a class="btn btn-outline-light" href="{{ route('contact') }}">{{ __('Contact') }}</a>
            <a class="btn btn-outline-light" href="{{ route('posts.index') }}">{{ __('Blog Posts') }}</a>
            <a class="btn btn-outline-light" href="{{ route('posts.create') }}">{{ __('Add') }}</a>

            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h3 class="offcanvas-title" id="offcanvasScrollingLabel">Blogpost Manager</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="card">
                        <div class="p-3">
                            <div class="fw-bold h4 text-center">Menu</div>

                            @guest
                                <div class="d-flex mb-2">
                                    @if (Route::has('register'))
                                        <a class="btn btn-sm w-50 btn-outline-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        <a class="btn btn-sm w-50 btn-outline-dark"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                </div>
                                <hr>
                            @else
                                <div class="d-flex">
                                    <a class="btn btn-sm col-9 btn-outline-dark"
                                        href="{{ route('users.show', [$user->id]) }}">{{ Auth::user()->name }}'s {{ __('Profile') }}</a>
                                    <div class="ps-1"></div>

                                    <a class="btn btn-sm col-3 btn-outline-dark" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                <hr>
                            @endguest

                            <a class="btn btn-sm w-100 btn-outline-dark" href="{{ route('posts.index') }}">{{ __('Blog Posts') }}</a>
                            <hr>
                            <a class="btn btn-sm w-100 btn-outline-dark" href="{{ route('contact') }}">{{ __('Contact') }}</a>
                            <hr>
                            <a class="btn btn-sm w-100 btn-outline-dark" href="{{ route('home') }}">{{ __('Home') }}</a>
                            <hr>
                            <a class="btn btn-sm w-100 btn-outline-dark" href="{{ route('posts.create') }}">{{ __('Add') }}</a>
                            <hr>
                        </div>
                    </div>

                    <div class="card mt-2">
                        <div class="p-3">
                            
                        </div>
                    </div>
                </div>
            </div>

            @guest
                @if (Route::has('register'))
                    <a class="btn btn-success" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
                <a class="btn btn-warning" href="{{ route('login') }}">{{ __('Login') }}</a>
            @else
                <a class="btn btn-outline-warning" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                    ({{ Auth::user()->name }})</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </nav>
    </div>

    <div class="container">
        @if (session()->has('status'))
            <p style="color: green">
                {{ session()->get('status') }}
            </p>
        @endif

        <div class="p-4">
            @yield('content')
        </div>

    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
