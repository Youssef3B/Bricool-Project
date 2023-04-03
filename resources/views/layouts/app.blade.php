<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('css/slick.css') }}" />
        <link rel="stylesheet" href="{{ url('css/style.css') }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
        />
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg position-fixed w-100 top-0">
            <div class="container">
                <a class="navbar-brand" href="/"
                    ><img src="{{ url('imgs/logo.png') }}" alt=""
                /></a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                aria-current="page"
                                href="/"
                                ><i class="bx bxs-home-alt-2 me-1"></i
                                >Home</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('service.index')}}"
                                ><i class="bx bxs-briefcase me-1"></i
                                >Services</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('blog')}}"
                                ><i class='bx bxl-blogger'></i> Blog</a
                            >
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}"
                                ><i class="bi bi-person-lines-fill me-1"></i
                                >Contact</a
                            >
                        </li>
                    </ul>
                    <form class="d-flex" action="{{ route('services.search') }}" method="get">
                        <input
                            class="form-control"
                            type="search"
                            placeholder="Search"
                            aria-label="Search"
                            name="q"
                        />
                        <button
                            id="btn-search-nav"
                            class="btn btn-outline-success"
                            type="submit"
                        >
                            <i class="bx bx-search-alt-2"></i>
                        </button>
                    </form>
                    @guest

                    @if (Route::has('login'))
                    <a
                    href="{{ route('login') }}"
                    class="btn btn-outline-success ms-2"
                    >Login</a
                    >
                    @endif
                    @if (Route::has('register'))
                    <a
                    href="{{ route('register') }}"
                    class="btn btn-outline-success ms-2"
                    >inscription</a
                    >
                    @endif
                    @else
                    <li id="hello" class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            @if (isset(Auth::user()->image))
                            <img id="avatar" src=" {{ url('imgs/'.Auth::user()->image) }}" alt="">
                              @else
                              <img id="avatar" class="img-profile" src="{{ url('imgs/default.jpg') }}" alt="" />
                              @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('sowAll') }}">Profile</a>
                            <a class="dropdown-item" href="{{ route('manageServices') }}">manage services</a>
                            <a class="dropdown-item" href="{{ route('manageportfolio') }}">manage portfolio</a>
                            <a class="dropdown-item" href="{{ route('favorites') }}">My Fav Services</a>
                            <a class="dropdown-item" href="{{ route('password.change') }}">Change Your Password</a>
                            @if(Auth::user()->role == "admin" || Auth::user()->role == "superadmin")
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                        @endif
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
                </div>
            </div>
        </nav>
    </header>
        @yield('content')

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div>
                            <h5>USEFUL LINKS</h5>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="{{route('service.index')}}">Services</a></li>
                                <li><a href="{{route('blog')}}">Blogs</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <a href="/">
                                <img
                                src="{{ url('imgs/logo.png') }}"
                                alt=""
                                class="img-fluid"
                            />
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <h5>Contact</h5>
                            <p>
                                198 West 21th Street, Suite 721 New York NY
                                10016
                            </p>
                            <p>Phone: + 1235 2355 98</p>

                            <p>Email: info@yoursite.com</p>
                            <div>
                                <a href=""
                                    ><i class="bx bxl-facebook-circle"></i
                                ></a>
                                <a href=""><i class="bx bxl-twitter"></i></a>
                                <a href=""><i class="bx bxl-instagram"></i></a>
                                <a href=""
                                    ><i class="bx bxl-linkedin-square"></i
                                ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
                <!----------------------------------------------- End-Footer------------------------------------>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                <script src="{{ url("js/slick.min.js") }}"></script>

                <script src="{{ url("js/script.js") }}"></script>

                @yield('scripts')

</body>
</html>
