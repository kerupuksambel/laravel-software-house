<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    </head>
    <body class="sidebar-mini-md">
        <nav class="main-header navbar navbar-expand bg-light navbar-light ">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
            </li>
            @if (auth()->user())
              <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('question.index') }}" class="nav-link">Pertanyaan Anda</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('answer.index') }}" class="nav-link">Jawaban Anda</a>
              </li>
            </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    </li>
                </ul>
            @else
            </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('register') }}" class="nav-link">Daftar</a>
                    </li>
                </ul>
            @endif
          </nav>
        <div class="container-fluid mt-3">
            @yield('content')
        </div>
    </body>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    @yield('js')
</html>