<!DOCTYPE html>
<html lang="en" ng-app="clockApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SecureSpot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/userview.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- FontAwesome Library --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- AlpineJS CDN --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <!--DataTable Table CSS link-->
    {{-- https://datatables.net/examples/styling/bootstrap5.html --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
</head>

<body>

    <!--Side Bar-->
    <div class="main-container d-flex">
        <div class="sidebar bg-dark" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <a class="navbar-brand" href="#">
                    <img class="ms-3" src="{{ asset('logo/logo-no-background.svg') }}" width="200px"
                        alt="SecureSpot Logo">
                </a>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
                        class="fa-solid fa-bars-staggered"></i>
                </button>
            </div>

            <ul class="list-unstyled px-2">
                <li class="" id="dashboard">
                    <a href="{{ route('user.dashboard') }}" class="text-decoration-none px-3 py-2 d-block sidebaritem">
                        <i class="fa-solid fa-house me-2"></i> Dashboard
                    </a>

                </li>
                <li class="" id="booking">
                    <a href="#" class="text-decoration-none px-3 py-2 d-block sidebaritem sideclick1">
                        <i class="fa-solid fa-bookmark ms-1 me-2"></i> Bookings
                        <span><i class="fa-solid fa-angle-down ms-5 px-2"></i></span>
                    </a>
                    <ul class="vertical-submenu booking-sub {{ request()->is('booking/*') ? ' show' : '' }}">
                        <li>
                            <a href="{{ route('user.newbooking') }}"
                                class="text-decoration-none px-3 py-2 d-block sidebaritem submenuitem {{ request()->is('booking/n/*') ? ' active' : '' }}">
                                - Book New Locker
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.managebooking') }}"
                                class="text-decoration-none px-3 py-2 d-block sidebaritem submenuitem {{ request()->is('booking/managebooking') ? ' active' : '' }}">
                                - Manage Bookings
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.bookinghistory') }}"
                                class="text-decoration-none px-3 py-2 d-block sidebaritem submenuitem {{ request()->is('booking/bookinghistory') ? ' active' : '' }}">
                                - Booking History
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="">
                    <a href="#" class="text-decoration-none px-3 py-2 d-block sidebaritem sideclick2">
                        <i class="fa-solid fa-money-check-dollar me-2"></i></i> Payments
                        <span><i class="fa-solid fa-angle-down ms-5 px-2"></i></span>
                    </a>
                    <ul class="vertical-submenu  payment-sub {{ request()->is('payment/*') ? ' show' : '' }}">
                        <li>
                            <a href="{{ route('user.newpayments') }}"
                                class="text-decoration-none px-3 py-2 d-block sidebaritem submenuitem {{ request()->is('payment/newpayment') ? ' active' : '' }}">
                                - New Payment
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.paymenthistory') }}"
                                class="text-decoration-none px-3 py-2 d-block sidebaritem submenuitem {{ request()->is('payment/paymenthistory') ? ' active' : '' }}">
                                - Payment History
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="">
                    <a href="{{ route('user.contact') }}"
                        class="text-decoration-none px-3 py-2 d-block sidebaritem {{ request()->is('contact') ? ' active' : '' }}">
                        <i class="fa-solid fa-address-book ms-1 me-2"></i> Contact
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('user.profile') }}"
                        class="text-decoration-none px-3 py-2 d-block sidebaritem {{ request()->is('profile') ? ' active' : '' }}">
                        <i class="fa-solid fa-user ms-1 me-2"></i> Profile
                    </a>
                </li>
            </ul>
            <hr class="h-color mx-2">

            {{-- <ul class="list-unstyled px-2">
                <li class="">
                    <a href="#" class="text-decoration-none px-3 py-2 d-block sidebaritem"><i
                            class="fa-solid fa-bars me-2"></i> Settings
                    </a>
                </li>
                <li class="">
                    <a href="#" class="text-decoration-none px-3 py-2 d-block sidebaritem"><i
                            class="fa-solid fa-bell me-2"></i> Notifications
                    </a>
                </li>

            </ul> --}}

        </div>

        <div class="content">
            <!--Nav Bar-->
            <div>
                <nav class="navbar navbar-expand-md">
                    <div class="container">
                        <button class="btn px-1 py-0 open-btn text-white d-md-none"><i
                                class="fa-solid fa-bars-staggered"></i></button>
                        <a class="navbar-brand" href="{{ route('user.dashboard') }}">
                            <img class="d-md-none" src="{{ asset('logo/logo-no-background.svg') }}" width="150px"
                                alt="SecureSpot Logo">
                        </a>
                        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar"><i class="fa-solid fa-user"></i></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->fname }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="dashboard-content px-3 pt-4">
                @yield('content')
            </div>

        </div>
    </div>
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    {{--     JQuery Library --}}

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        /*
                                    $(".sidebar ul li").on('click', function() {
                                        $(".sidebar ul li.active").removeClass('active');
                                        $(this).addClass('active');
                                    });
                                    */
        $('.open-btn').on('click', function() {
            $('.sidebar').addClass('active');
        });

        $('.close-btn').on('click', function() {
            $('.sidebar').removeClass('active');

        });

        $('.sideclick1').on('click', function() {
            $('.booking-sub').toggleClass("show");
        });

        $('.sideclick2').on('click', function() {
            $('.payment-sub').toggleClass("show");
        });
    </script>


    <!--DataTable Table JS link-->
    {{-- https://datatables.net/examples/styling/bootstrap5.html --}}

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        $(document).ready(function() {
            $('#example4').DataTable({
                order: [
                    [0, 'desc']
                ]
            });
        });
    </script>
</body>

</html>
