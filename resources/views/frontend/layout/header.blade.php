<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html"><img width="250" src="{{ asset('frontend/images/logo.png') }}"
                    alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('cart') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('cart') }}">Cart <span class="sr-only">(current)</span></a>
                    </li>

                    @auth
                        <li class="nav-item mr-1"><a class="btn btn-primary" href="{{ route('dashboard') }}"
                                style="background-color: #f7444e;border-color: #f7444e;">Dsahboard</a></li>
                    @else
                        <li class="nav-item mr-1"><a class="btn btn-primary" href="{{ route('login') }}"
                                style="background-color: #f7444e;border-color: #f7444e;">Login</a></li>
                        <li class="nav-item"><a class="btn btn-success" href="{{ route('register') }}"
                                style="background-color: #002c3e; border-color: #002c3e;">Register</a></li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
