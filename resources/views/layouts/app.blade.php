<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title', 'Home')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('/storage/tokyo_logo.png') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />}
    <link href="{{ asset('/css/custom-styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="page-top">
    <!-- Navigation-->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <a class="navbar-brand" href="{{ route('home.index') }}"> <img class="rounded rounded-circle"
                    style="max-width: 125px; max-height: 70px" src="/storage/tokyo_logo.png"> </a>
            <button
                class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                {{ __('layout.menu')}}
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link"
                            href="{{ route('login') }}">{{ __('layout.login') }}</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link"
                            href="{{ route('register') }}">{{ __('layout.register') }}</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link"
                            href="{{ route('product.list') }}">{{ __('layout.products') }}</a></li>
                    @else
                    @if (Auth::user()->getRole() == "admin")
                    <span style="position: relative">
                        <a style="text-decoration: none" id="navbarDropdown" class="nav-link dropdown-toggle text-light"
                            href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('layout.admin')}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="navbarDropdown">
                            <li class="dropdown-item"><a class="nav-link"
                                    href="{{ route('admin.product.create') }}">{{ __('layout.createPro') }}</a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="{{ route('admin.toolloan.create') }}">{{ __('layout.createTool') }}</a></li>
                            <li class="dropdown-item"><a class="nav-link" href="{{ route('admin.product.list') }}">
                                    {{ __('layout.productList') }}</a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="{{ route('admin.toolloan.list') }}">{{ __('layout.toolList') }}</a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="{{ route('admin.user.list') }}">{{ __('layout.userList') }}</a></li>
                            <li class="dropdown-item"><a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">{{ __('layout.logout') }}</a></li>
                        </div>
                    </span>
                    <span style="position: relative">
                        <a style="text-decoration: none" id="navbarDropdown" class="nav-link dropdown-toggle text-light"
                            href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('layout.navigate')}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="navbarDropdown">
                            <li class="dropdown-item"><a class="nav-link"
                                    href="{{ route('product.list') }}">{{ __('layout.products') }}</a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="{{ route('product.showCart') }}">{{ __('layout.myCart') }}</a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="{{ route('user.show', Auth::id()) }}">{{ __('layout.myAccount') }}</a></li>
                        </div>
                    </span>
                    @else
                    <span style="position: relative">
                        <a style="text-decoration: none" id="navbarDropdown" class="nav-link dropdown-toggle text-light"
                            href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('layout.navigate')}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="navbarDropdown">
                            <li class="dropdown-item"><a class="nav-link"
                                    href="{{ route('product.list') }}">{{ __('layout.products') }}</a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="{{ route('product.showCart') }}">{{ __('layout.myCart') }}</a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="{{ route('user.show', Auth::id()) }}">{{ __('layout.myAccount') }}</a></li>
                            <li class="dropdown-item"><a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">{{ __('layout.logout') }}</a></li>
                        </div>
                    </span>
                    @endif
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
    <div id="main-content" style="padding-top: 105px;">
        @yield('content')
    </div>
    <!-- Copyright -->
    <div class="bg-secondary text-light text-center py-3">© 2021 Copyright:
        <a href="{{route('home.index')}}"> CarPart.com</a>
    </div>
    <!-- Copyright -->
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('/js/scripts.js') }}"></script>
</body>

</html>