<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Password Manager</title>
</head>

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
   
    <body>
          
        <div class="navbar navbar-dark d-flex flex-column flex-md-row p-3 px-md-4 mb-3 bg-orange shadow">
            {{-- <button class="btn btn-primary">Enable body scrolling</button>     --}}
            <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" class=" h3 my-0 mr-md-auto text-decoration-none text-light">Password Manager</a>
            
            <nav class="my-md-0 mr-md-3">
                <a class="btn btn-outline-light" href="{{ route('home') }}">Home</a>
                <a class="btn btn-outline-light" href="{{ route('passman.index') }}">All Passwords</a>
                <a class="btn btn-outline-light" href="{{ route('passman.create') }}">Add Passwords</a>
                
                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">{{ $userId->name }} Password Manager</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="card">

                            </div>
                        </div>
                    </div>

                    @guest
                        @if (Route::has('register'))
                            <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                        @endif
                            <a class="btn btn-warning" href="{{ route('login') }}">Login</a>
                    @else
                        <a class="btn btn-outline-warning" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            >Logout ({{ Auth::user()->name }})</a>
                
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" 
                            style="display: none;"> 
                            @csrf
                            </form>

                            {{-- <a class="btn btn-outline-zunnur" href="{{ route('users.show', ['user' => $userId]) }}">Current User</a> --}}
                            <a class="btn btn-outline-zunnur" href="{{ route('pass.home') }}">PassMan</a>
                            
                            {{-- <a class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Dropdown
                                </a>
                                <ul class="dropdown-menu">
                                  <a class="dropdown-item" href="#">Action</a>
                                  <li><a class="dropdown-item" href="#">Another action</a></li>
                                  <li><hr class="dropdown-divider"></li>
                                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </a> --}}
                    @endguest
                {{-- </div> --}}

            </nav>
        </div>

        <div class="container">
            @if(session()->has('status'))
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