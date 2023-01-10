<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                @if(request()->routeIs('admin*'))
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                               href="{{ route('admin.home')  }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                               href="{{ route('admin.roles.index')  }}">Roles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                               href="{{ route('admin.permissions.index')  }}">Permissions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                               href="{{ route('admin.category.index')  }}">Category</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Link
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                @endif

                <ul class="navbar-nav my-0 ms-auto">
                    @guest()
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login')  }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register')  }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('admin.home')  }}">Admin</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            {{ app()->getLocale() }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach(config('app.available_locales') as $locale)
                                <li>
                                    <a class="dropdown-item {{ app()->getLocale()== $locale ?'active':''  }}"
                                       href="{{ route('home', ['locale' => $locale])  }}">
                                        {{ strtoupper($locale) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @auth()
                        @if(request()->routeIs('admin*'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home')  }}">Front side</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.home')  }}">Admin side</a>
                            </li>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
