<!DOCTYPE html>

<body lang="{{ app()->getLocale() }}">
    <html>

    <head>
        <meta charset="utf-8">
        <title>@yield('title_page')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <link href="{{ asset('assets/backEnd/img/sameh book.png') }}" rel="icon">

        <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
            integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="{{ asset('assets/backEnd/css/all.css') }}">
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('assets/backEnd/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/backEnd/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}"
            rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('assets/backEnd/css/bootstrap.min.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />
        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/backEnd/css/style.css') }}" rel="stylesheet">




    </head>

    <body>
        <div class="container-fluid position-relative d-flex p-0">
            <!-- Spinner Start -->
            <div id="spinner"
                class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->


            <!-- Sidebar Start -->
            <div class="sidebar pe-4 pb-3">
                <nav class="navbar bg-secondary navbar-dark">
                    <a href="{{ url('/dashboard') }}" class="navbar-brand mx-4 mb-3">
                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SamehPan</h3>
                    </a>
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            {{-- <img class="rounded-circle" src="{{ asset('assets/backEnd/img/sameh.jpeg') }}" alt=""
                            style="width: 40px; height: 40px;"> --}}
                            <div class="profile-pic">
                                <label class="-label" for="file">
                                    <span><i class="fa-solid fa-camera-rotate"></i></span>
                                </label>
                                <input id="file" type="file" onchange="loadFile(event)" />
                                <img src="{{ asset('assets/backEnd/img/sameh.jpeg') }}" id="output" width="200" />
                            </div>
                            <div
                                class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                            </div>
                        </div>
                        <div class="ms-3">
                            @if (Auth::check() && Auth::user()->name)
                                <h6 class="mb-2 name_user">{{ Auth::user()->name }}</h6>
                            @endif
                            <span>
                                {{-- @if (Auth::check() && Auth::user()->name)
                                <span class="bg-success rounded-pill px-3 text-white py-1 roles_name">{{ Auth::user()->roles_name[0] }}</span>
                            @endif --}}
                            </span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="{{ route('dashboard') }}"
                            class="nav-item nav-link {{ request()->is('dashboard') ? 'active' : '' }}"><i
                                class="fa fa-tachometer-alt me-2"></i>{{ trans('sidebar.dashboard') }}</a>

                        <div class="nav-item dropdown mt-1">
                            <a href="#"
                                class="nav-link dropdown-toggle {{ request()->is('sections') ? 'active' : '' }}"
                                data-bs-toggle="dropdown"
                                aria-expanded="{{ request()->is('sections') ? 'true' : 'false' }}"><i
                                    class="far fa-file-alt me-2"></i>{{ trans('sidebar.table') }}</a>
                            <div
                                class="dropdown-menu bg-transparent border-0 {{ request()->is('sections') ? 'show' : '' }} {{ request()->is('books') ? 'show' : '' }}">
                                @can('show-sections')
                                    <a href="{{ url('sections') }}"
                                        class="dropdown-item {{ request()->is('sections') ? 'active' : '' }}">{{ trans('sidebar.sections') }}</a>
                                @endcan
                                <a href="{{ url('books') }}"
                                    class="dropdown-item {{ request()->is('books') ? 'active' : '' }}">{{ trans('sidebar.books') }}</a>
                            </div>
                        </div>
                        @can('show-users')
                            <div class="nav-item dropdown mt-1">
                                <a href="#"
                                    class="nav-link dropdown-toggle {{ request()->is('users') ? 'active' : '' }} {{ request()->routeIs('users.create') ? 'active' : '' }}"
                                    data-bs-toggle="dropdown"><i
                                        aria-expanded="{{ request()->is('users') ? 'true' : 'false' }}"
                                        class="far fa-user me-2"></i>{{ trans('sidebar.users') }}</a>
                                <div
                                    class="dropdown-menu bg-transparent border-0 {{ request()->is('users') ? 'show' : '' }}{{ request()->routeIs('users.create') ? 'show' : '' }}">
                                    <a href="{{ route('users.index') }}"
                                        class="dropdown-item {{ request()->is('users') ? 'active' : '' }}">{{ trans('sidebar.show_users') }}</a>
                                    @can('operate-users')
                                        <a href="{{ route('users.create') }}"
                                            class="dropdown-item {{ request()->routeIs('users.create') ? 'active' : '' }}">{{ trans('sidebar.add_users') }}</a>
                                    @endcan
                                </div>
                            </div>
                        @endcan

                        @can('show-roles')
                            <div class="nav-item dropdown mt-1">
                                <a href="#"
                                    class="nav-link dropdown-toggle {{ request()->is('roles') ? 'active' : '' }} {{ request()->routeIs('roles.create') ? 'active' : '' }}"
                                    data-bs-toggle="dropdown"><i
                                        aria-expanded="{{ request()->is('roles') ? 'true' : 'false' }}  "
                                        class="far fa-user me-2"></i>{{ trans('sidebar.roles') }}</a>
                                <div
                                    class="dropdown-menu bg-transparent border-0 {{ request()->is('roles') ? 'show' : '' }} {{ request()->routeIs('roles.create') ? 'show' : '' }}">
                                    <a href="{{ route('roles.index') }}"
                                        class="dropdown-item {{ request()->is('roles') ? 'active' : '' }}">{{ trans('sidebar.show_roles') }}</a>
                                    <a href="{{ route('roles.create') }}"
                                        class="dropdown-item {{ request()->routeIs('roles.create') ? 'active' : '' }}">{{ trans('sidebar.add_roles') }}</a>
                                </div>
                            </div>
                        @endcan

                    </div>
                </nav>
            </div>
            <!-- Sidebar End -->



            <!-- Content Start -->
            <div class="content">
                <!-- Navbar Start -->
                <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                    </a>
                    <a href="#" class="sidebar-toggler flex-shrink-0">
                        <i class="fa fa-bars"></i>
                    </a>
                    <form class="d-none d-md-flex ms-4">
                        <input class="form-control bg-dark border-0" type="search"
                            placeholder="{{ trans('navbar.search') }}">
                    </form>
                    <div class="navbar-nav align-items-center ms-auto">
                        <div class="language-select">
                            <select onchange="window.location.href=this.value" class="form-select" style="margin:0;">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <option
                                        value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                        {{ app()->getLocale() == $localeCode ? 'selected' : '' }}>
                                        <span
                                            class="flag-icon flag-icon-{{ $localeCode == 'en' ? 'us' : 'sa' }}"></span>
                                        {{ $properties['native'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="nav-item dropdown">

                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fa fa-envelope me-lg-2"></i>
                                <span class="d-none d-lg-inline-flex">{{ trans('navbar.message') }}</span>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                                <a href="#" class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle"
                                            src="{{ asset('assets/backEnd/img/sameh.jpeg') }}" alt=""
                                            style="width: 40px; height: 40px;">
                                        <div class="ms-2">
                                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                            <small>15 minutes ago</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle"
                                            src="{{ asset('assets/backEnd/img/sameh.jpeg') }}" alt=""
                                            style="width: 40px; height: 40px;">
                                        <div class="ms-2">
                                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                            <small>15 minutes ago</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle"
                                            src="{{ asset('assets/backEnd/img/sameh.jpeg') }}" alt=""
                                            style="width: 40px; height: 40px;">
                                        <div class="ms-2">
                                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                            <small>15 minutes ago</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item text-center">See all message</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fa fa-bell me-lg-2"></i>
                                <span class="d-none d-lg-inline-flex">{{ trans('navbar.notificatin') }}</span>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">Profile updated</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">New user added</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">Password changed</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item text-center">See all notifications</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            @if (Auth::check() && Auth::user()->name)
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <img class="rounded-circle me-lg-2"
                                        src="{{ asset('assets/backEnd/img/sameh.jpeg') }}" alt=""
                                        style="width: 40px; height: 40px;">
                                    <span class="d-none d-lg-inline-flex name_user">{{ Auth::user()->name }}</span>
                                </a>
                            @endif
                            <div
                                class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                                {{-- <a href="#" class="dropdown-item">My Profile</a> --}}
                                <a href="{{ route('profile.show') }}"
                                    class="dropdown-item">{{ trans('navbar.my_profile') }}</a>
                                <a href="{{ route('profile.show') }}"
                                    class="dropdown-item">{{ trans('navbar.settings') }}</a>
                                {{-- <form action="{{ route('profile.show') }}" method="post">
                            @csrf
                             <button class="dropdown-item">Settings</button>
                           </form> --}}
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item">{{ trans('navbar.log_out') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Navbar End -->

                <div class="links_page container mt-4">
                    <h2>Sameh<span class="text-danger fs-1">Pan</span></h2>
                    <h6>@yield('title_page') <span class="text-danger">@yield('table')</span></h6>
                </div>
                <!-- Sale & Revenue Start -->

                <!-- Sale & Revenue End -->

                @yield('content')


                <!-- Sales Chart Start -->

                <!-- Footer End -->
            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
                    class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/backEnd/lib/chart/chart.min.js') }}"></script>
        <script src="{{ asset('assets/backEnd/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets/backEnd/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/backEnd/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/backEnd/lib/tempusdominus/js/moment.min.js') }}"></script>
        <script src="{{ asset('assets/backEnd/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
        <script src="{{ asset('assets/backEnd/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

        <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

        {{-- Button (print,excel,..) --}}
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.excel.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

        <script src="{{ asset('assets/backEnd/js/all.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    pagingType: 'simple_numbers',
                    dom: 'Bfrtip',
                    pageLength: 5,

                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    responsive: true,
                });

            });
        </script>


        <!-- Template Javascript -->
        <script src="{{ asset('assets/backEnd/js/main.js') }}"></script>
    </body>

    </html>
