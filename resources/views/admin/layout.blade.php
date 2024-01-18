<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta author="Fajar Agus Maulana">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body style="width: 100vw; height: 100vh; overflow-y: hidden; overflow-x:hidden; background-color: #F8F8F8;">
    <nav class="navbar navbar-expand-lg bg-body-tertiary"
        style="margin: 0!important; padding: 1rem!important; background-color: white!important;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('image/logo.png') }}" alt="">
            </a>
            <div>
                <button class="d-flex justify-content-center align-items-center border-0"
                    style="background-color: transparent; font-family: 'Poppins', sans-serif;" type="button">
                    <div class="me-2">
                        <div style="font-size: 10px; text-align:right; color: #41A0E4">
                            Hallo Admin,
                        </div>
                        <div style="font-size: 14px; text-align:right;">
                            {{ Auth::user()->name }}
                        </div>
                    </div>
                    <div class="dropdown">
                        <div id="avatarContainer" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ asset('image/avatar.png') }}" alt=""
                                style="border-radius: 50%; width: 40px">
                        </div>
                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton"
                            style="border-radius: 4px; background: #FFF; box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.20); width: 220px; height: 214px; margin-left: -180px !important; margin-top: 13px">
                            <img src="{{ asset('image/avatar.png') }}" alt=""
                                style="border-radius: 50%; width: 60px; height: 60px; margin-top: 17px;" />
                            <p
                                style="margin-top: 8px; color: #000; font-size: 14px; font-style: normal; font-weight: 400;">
                                {{ Auth::user()->name }}</p>
                            <p
                                style="color: #000; font-size: 10px; font-style: normal; font-weight: 400;margin-top: -18px; ">
                                {{ Auth::user()->email }}</p>
                            <hr>
                            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                @csrf
                            </form>
                            <a href="#"
                                style="color: #D83A56; font-size: 12px; font-style: normal; font-weight: 400; display: block; text-decoration:none;"
                                onclick="event.preventDefault();  console.log('Clicked!'); document.getElementById('logout-form').submit();">
                                <img style="width: 24px; height: 24px;" src="{{ asset('image/power.png') }}" alt="button"> KELUAR </a>
                        </div>
                    </div>
                </button>
            </div>
        </div>

    </nav>
    <div class="d-flex" style="height: 100%">
        <div class="d-flex flex-column flex-shrink-0 p-3 h-100" style="width: 280px; background-color: white;">
            <ul class="nav nav-pills flex-column mb-auto">
                <li @if (Request::is('admin/dashboard')) style="background-color: #41A0E4" @endif class="menu">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link link-dark d-flex align-items-center"
                        @if (Request::is('admin/dashboard')) style="color:white!important; font-weight: 600" @endif>
                        @if (Request::is('admin/dashboard'))
                            <img src="{{ asset('image/house-white.svg') }}" alt="">
                        @else
                            <img src="{{ asset('image/house.svg') }}" alt="">
                        @endif
                        <div class="ms-2">
                            Dashboard
                        </div>
                    </a>
                </li>
                <li @if (Request::is('admin/users')) style="background-color: #41A0E4" @endif class="menu">
                    <a href="{{ route('admin.users') }}" class="nav-link link-dark d-flex align-items-center"
                        @if (Request::is('admin/users')) style="color:white!important; font-weight: 600" @endif>
                        @if (Request::is('admin/users'))
                            <img src="{{ asset('image/user-white.svg') }}" alt="">
                        @else
                            <img src="{{ asset('image/User.svg') }}" alt="">
                        @endif
                        <div class="ms-2">
                            Manajemen User
                        </div>
                    </a>
                </li>
                <li @if (Request::is('admin/products')) style="background-color: #41A0E4" @endif class="menu">
                    <a href="{{ route('admin.products') }}" class="nav-link link-dark d-flex align-items-center"
                        @if (Request::is('admin/products')) style="color:white!important; font-weight: 600" @endif>
                        @if (Request::is('admin/products'))
                            <img src="{{ asset('image/book.svg') }}" alt="">
                        @else
                            <img src="{{ asset('image/book.svg') }}" alt="">
                        @endif
                        <div class="ms-2">
                            Manajemen Produk
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        @yield('content')
    </div>

    <style>
        .menu {
            margin-top: 0.7rem;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
