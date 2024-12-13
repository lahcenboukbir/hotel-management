{{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav> --}}


<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm px-3">
    <div class="container-fluid">
        <a class="navbar-brand p-0" href="/">
            <img src="{{ asset('images/svg/logo.svg') }}" alt="Logo" width="60" height=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() === '/' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() === 'hotels.index' ? 'active' : '' }}"
                        href="{{ route('hotels.index') }}">Hotels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() === 'bookings.index' ? 'active' : '' }}"
                        href="{{ route('bookings.index') }}">Booking</a>
                </li>
                <li class="nav-item dropdown bg-primary rounded">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->first_name ?? 'Account' }}
                    </a>

                    <ul class="dropdown-menu">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}">Sign in</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Sign up</a></li>
                        @else
                            <li>
                            <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Settings</a></li>
                            @if (Auth::user()->is_admin)
                                <li><a class="dropdown-item" href="{{ route('admin.index') }}">Admin</a></li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Sign
                                out</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </li>
                @endguest
            </ul>
            </li>

            </ul>
            <form class="d-flex" role="search" action="{{route('search.hotels')}}" method="POST">
                @csrf
                <input class="form-control me-2" type="search" name="hotel" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
</nav>
