<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border-1 border-secondary mb-md-3">
    <div class="container-fluid">

        <div class="navbar-brand d-md-none"><img src="/images/layout/logo-200x200.png" alt="CacheOptimizer Logo">CacheOptimizer</div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-auto  mb-2 mb-lg-0">
                <li class="nav-item px-3">
                    <a @class(['nav-link', 'active'=>(empty(\Route::current()->getName())) || (strncmp(\Route::current()->getName(), 'welcome', strlen('welcome')) === 0) ]) href="/">Welcome</a>
                </li>
                <li class="nav-item px-3">
                    <a @class(['nav-link', 'active'=>(empty(\Route::current()->getName())) || (strncmp(\Route::current()->getName(), 'dashboard', strlen('dashboard')) === 0) ]) href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item px-3">
                    <a @class(['nav-link', 'active'=>(strncmp(\Route::current()->getName(), 'accounts', strlen('accounts')) === 0 ) ]) href="{{route('accounts.index')}}">Accounts</a>
                </li>
                <li class="nav-item px-3">
                    <a @class(['nav-link', 'disabled', 'active'=>strncmp(\Route::current()->getName(), 'transactions', strlen('transactions')) === 0 ])>Transactions</a>
                </li>
                <li class="nav-item px-3">
                    <a @class(['nav-link', 'disabled', 'active'=>strncmp(\Route::current()->getName(), 'reports', strlen('reports')) === 0 ])>Reports</a>
                </li>
            </ul>
            @auth()
                @if (Auth::user()->isAdministrator())
                    <ul class="navbar-nav mb-2 mb-lg-0 me-2 bg-info rounded border border-2 border border-warning">
                        <li class="nav-item dropdown">
                            <a @class(['nav-link', 'dropdown-toggle',
                                    'active'=>strncmp(\Route::current()->getName(), 'account-types.index', strlen('account-types.index')) === 0
                                            || strncmp(\Route::current()->getName(), 'currencies.index', strlen('currencies.index')) === 0
                                ])
                                href="#" id="navbarDropdownAdmin" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-gear"></i> Settings
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdmin">
                                <li>
                                    <a href="{{route('account-types.index')}}"
                                        @class(['dropdown-item', 'active'=>strncmp(\Route::current()->getName(), 'account-types.index', strlen('account-types.index')) === 0 ])>
                                        <i class="fa-solid fa-table"></i> Account Types
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('currencies.index')}}"
                                        @class(['dropdown-item', 'active'=>strncmp(\Route::current()->getName(), 'currencies.index', strlen('currencies.index')) === 0 ])>
                                        <i class="fa-solid fa-table"></i> Currencies
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endif
            @endauth
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a
                        @class(['nav-link', 'dropdown-toggle',
                            'active'=>strncmp(\Route::current()->getName(), 'login', strlen('login')) === 0
                                    || strncmp(\Route::current()->getName(), 'register', strlen('register')) === 0
                                    || strncmp(\Route::current()->getName(), 'home', strlen('home')) === 0
                                    || strncmp(\Route::current()->getName(), 'logout', strlen('logout')) === 0
                        ])
                        href="#" id="navbarDropdownProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @guest()
                            <i class="fa-regular fa-user"></i> Login / Register
                        @endguest
                        @auth()
                            <span class="font-weight-bold">{{ Auth::user()->name }}
                                @if(Auth::user()->isAdministrator())
                                    <span class="badge rounded-pill text-bg-success"><i class="fa-solid fa-screwdriver-wrench"></i></span>
                                @endif
                                @if(Auth::user()->isSuperAdministrator())
                                    <span class="badge rounded-pill text-bg-success"><i class="fa-solid fa-biohazard"></i></span>
                                @endif
                            </span>
                        @endauth
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownProfile">
                        @guest()
                            <li><a class="dropdown-item" href="{{route('login')}}"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                            <li><a class="dropdown-item" href="{{route('register')}}"><i class="fa-solid fa-user-plus"></i> Register</a></li>
                        @endguest
                        @auth()
{{--                            <li><a class="dropdown-item disabled" href="{{route('profile')}}"><i class="fa-solid fa-user-gear"></i> Profile</a></li>--}}
                            <li>
                                <form method="post" action="{{route('logout')}}">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-decoration-none">
                                        <i class="fa-solid fa-door-open"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
