    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top aos-init aos-animate"
        data-aos="fade-down">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="/images/logo_pbg.png" alt="" />
            </a>
            <h6 id="title">Sistem Pengelolaan Sampah</h6>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('statistik.index') }}">Statistik</a>
                    </li>
                    @guest
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success nav-link px-4 text-white" href="{{ route('login') }}">Sign In
                        </a>
                    </li>
                    @endguest
                </ul>

                @auth
                    <!-- Desktop Menu -->
                    <ul class="navbar-nav d-none d-lg-flex">
                        <li class="nav-item dropdown">
                        <a
                            class="nav-link"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <img
                            src="/images/icon-user.png"
                            alt=""
                            class="rounded-circle mr-2 profile-picture"
                            />
                            Hi, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                                href="{{ Auth::user()->roles == 'ADMIN' ? route('admin-dashboard') : route('dashboard') }}">
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="{{ route('dashboard-settings-account') }}"
                            >Settings</a
                            >
                            <div class="dropdown-divider"></div>
                            @auth
                                <a class="nav-link" href="{{ route('logout.perform') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout.perform') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                            @endauth
                        </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-inline-block mt-2" href="{{ route('cart') }}">
                                @php
                                    $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                                @endphp
                                @if ($carts > 0)
                                    <img src="/images/icon-cart-filled.svg" alt="" />
                                    <div class="card-badge">{{ $carts }}</div>
                                @else
                                    <img src="/images/icon-cart-empty.svg" alt="" />
                                @endif
                                
                            </a>
                        </li>
                    </ul>

                    <!-- Mobile Menu -->
                    <ul class="navbar-nav d-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ Auth::user()->roles == 'ADMIN' ? route('admin-dashboard') : route('dashboard') }}">
                                Hi, {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-inline-block mt-2" href="{{ route('cart') }}">
                                Cart
                            </a>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>