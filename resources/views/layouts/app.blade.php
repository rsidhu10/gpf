<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('partials._head')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" 
                type="button" 
                data-toggle="collapse" 
                data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" 
                aria-expanded="false" 
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div    class="collapse navbar-collapse" 
                id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
{{--             <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Data Entry
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="/cases/create">Add GPF Advance</a></li>
                <li><a href="#">Edit GPV Advance</a></li>
                <li><a href="#">Add GI Pipe</a></li>
            </ul>
        </li>
 --}}            {{-- <ul class="navbar-nav mr-auto"> --}}
                {{-- <li class="active"><a href="/cases">Home</a></li> --}}
           {{--  </ul> --}}

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

        <!--<main class="py-4"> --> 
        <div class="container">
            @include('partials.errors')
            @include('partials.success')
            <div class="row">
                @yield('content')
            </div>
            <script type="text/javascript">
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            </script>
        </div>        
        <!--   </main> -->
        {{-- <main class="py-4">
            @yield('content')
        </main> --}}
    </div>
</body>
</html>
