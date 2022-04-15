<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <img src="landing/assets/img/logo.png" alt="">
            <span>Monitor</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
               @if (Auth::check())
               <li><a class="nav-link scrollto" href="/login">{{ Auth::user()->nama }}</a></li>
               <li><form action="/logout" method="POST">
                @csrf
                <button class="nav-link scrollto">Logout</button>
            </form></li>
                @else
                <li><a class="nav-link scrollto" href="/login">Login</a></li>
                <li><a class="getstarted scrollto" href="/register">Register</a></li>
               @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
