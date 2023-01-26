<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anonymous+Pro:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="bg-light">
<div id="app">
    <div class="container-lg rounded shadow bg-white app-container">

        <div class="d-none d-md-block">
            <header class="row header border-bottom border-3 border-info bg-light bg-gradient">
                <div class="col-md-1 offset-lg-1 d-none d-lg-block">
                    <img src="/images/layout/logo-200x200.png" alt="CacheOptimizer" class="img-fluid p-md-1 img-thumbnail mb-md-1">
                </div>
                <div class="col-md-9 offset-lg-1">
                    <div class="row">
                        <div class="col-12 header-title">Cache Optimizer</div>
                    </div>
                    <div class="row d-none d-xl-block">
                        <div class="col-11 offset-lg-1 header-title-desc">application that helps you manage your expenses & optimize your cash flow
                        </div>
                    </div>
                </div>
            </header>
        </div>

        <div class="page-area">
            <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border-1 border-secondary">
                <div class="container-fluid">

                    <div class="navbar-brand d-md-none"><img src="/images/layout/logo-200x200.png" alt="CacheOptimizer Logo">CacheOptimizer</div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto me-auto  mb-2 mb-lg-0">
                            <li class="nav-item px-3">
                                <a class="nav-link active" href="/">Dashboard</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link" href="#">Accounts</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link ">Transactions</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link">Reports</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-regular fa-user"></i> Profile
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownProfile">
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear"></i> Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-door-open"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </div>

        <footer class="row mt-auto mb-md-1 footer bg-secondary bg-gradient">
            <div class="col mt-auto mb-auto text-center">© 2022</div>
        </footer>
    </div>
</div>
</body>
</html>
