<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Viagens de Natal</title>
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-yEPZ7jP9S0QKiUQ0m3jjsO4ProIW7wvR9gXkI7JOGa2XVsw53Yke2bsdkBbjmmiX" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
 
<body class="bg-light">
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-success-subtle">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">Viagens de Natal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Viagens</a>
                    </li>
                </ul>
                {{-- login / logout --}}
                  @if (Route::has('login'))
                <nav class="d-flex align-items-center gap-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-success">
                            Dashboard
                        </a>

                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Logout</button>
                            </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-success">
                            Log in
                        </a>
 
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-success">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif

            </div>
        </div>
    </nav>
 
    {{-- conteúdo de cada página --}}
    <div class="container">
 
        @yield('content')
 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-WyOxWvTyr1QaMPfiPJSv76iReVthorl5uWlFtZPyK0IEB0hGzo9y5Bp9mYanr8Bu" crossorigin="anonymous">
    </script>
</body>
 
</html>