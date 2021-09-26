<!doctype html>
<html>

<head>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Expenser</title>
</head>

<body>

    <main role="main">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/"><img src="{{url('images/logo.jpg')}}" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    
                    @auth
                    <a class="nav-item nav-link" href="{{ url('/expenses') }}">Expenses</a>

                    @if(Auth::user()->is_admin)
                        <a class="nav-item nav-link" href="{{ url('/users') }}">Users</a>
                    @endif

                    <a class="nav-item nav-link dropdown-menu-end" href="{{ url('/logout') }}">Logout ({{Auth::user()->name}})</a>
                    @else
                    <a class="nav-item nav-link" href="{{ url('/about-us') }}">About us</a>
                    <a class="nav-item nav-link" href="{{ url('/services') }}">Services</a>
                    <a class="nav-item nav-link" href="{{ url('/login') }}">Login</a>
                    <a class="nav-item nav-link" href="{{ url('/register') }}">Register</a>
                    @endauth
                </div>
            </div>
        </nav>
        <div class="album py-5 bg-light">
            <div class="container">
                <!-- Content Start -->
                @include('layouts.messages')
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{isset($title) ? $title : ''}}</h1>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>

    </main>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>    
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    @stack('scripts')
</body>

</html>