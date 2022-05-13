<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/pilihproyek/" class="logo d-flex align-items-center">
            <img src="landing/assets/img/logo.png" alt="">
            <span>Monitor</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                @if (Auth::check() && Auth::user()->kategori=="pemilik")
                    <li class="dropdown"><a href="#"><span>{{ Auth::user()->nama }}</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/pilihproyek/{{ auth()->user()->id }}">Dashboard</a></li>
                            <li><a href="#">
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button class="btn btn-default">Logout</button>
                                    </form>
                                </a></li>
                        </ul>
                    </li>
                    {{-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard/{{ auth()->user()->id }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="#">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button class="dropdown-item">Logout</button>
                                </form>
                            </a></li>
                    </ul> --}}
                    </li>
                    {{-- <li><a class="nav-link scrollto" href="/login">{{ Auth::user()->nama }}</a></li>
               <li><form action="/logout" method="POST">
                @csrf
                <button class="nav-link scrollto">Logout</button>
            </form></li> --}}
                @elseif (Auth::check())
                <li class="dropdown"><a href="#"><span>{{ Auth::user()->nama }}</span> <i
                    class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="#">
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="btn btn-default">Logout</button>
                        </form>
                    </a></li>
                </ul>
                 </li>
                @else
                    <li><a class="nav-link scrollto" href="/login">Login</a></li>
                    <li><a class="getstarted scrollto" href="/register">Register</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
