<div class="container">
    <img src="/logo/hall_logo.png" height="50px" width="50x" class="m-1 p-1" />
    @if(Auth::check() && strpos(Auth::user()->email, '@admin.com'))
    <a class="navbar-brand ml-3 nav-header " href="{{ url('/admin/home') }}">
        Hi Admin, Welcome to Pow Pow Multipurpose Hall Booking System
    </a>
    @elseif(Auth::check() && Auth::user()->email)
    <a class="navbar-brand ml-3 nav-header " href="{{ url('/user/home') }}">
        Hi User, Welcome to Pow Pow Multipurpose Hall Booking System
    </a>
    @else
    <a class="navbar-brand ml-3 nav-header " href="{{ url('/login') }}">
        Pow Pow Multipurpose Hall Booking System
    </a>
    @endif
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('register'))
            <li class="nav-item nav-item-border">
                <a class="nav-link nav-header-register" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
            </li>
            @endif
            @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link nav-header" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>


            @endif
            @endguest
            @if(Auth::check())

            @can('isAdmin')
            <li class="nav-item mt-md-2 mr-md-2">
                <a class="nav-link-item nav-header" href="{{ '/admin/home'}}">{{ __('Home') }}</a>
            </li>
            @else
            <li class="nav-item pr-5">
                <a class="nav-link nav-header" href="bookings">Manage Bookings</a>
            </li>
            <li class="nav-item mt-md-2 mr-md-2">
                <a class="nav-link-item nav-header" href="{{ '/user/home'}}">{{ __('Home') }} |</a>
            </li>

            @endcan
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endif
        </ul>
    </div>
</div>