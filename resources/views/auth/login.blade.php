<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="{{ asset('assets/backEnd/css/all.css') }}">
    <!-- Favicon -->
    <link href="{{ asset('assets/backEnd/img/sameh book.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/backEnd/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backEnd/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/backEnd/css/bootstrap.min.css') }}" rel="stylesheet">

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


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            @error('email')
                                <div class="text-warning"><i class="fa-solid fa-triangle-exclamation"
                                        style="color: #FFC007;"></i> {{ $message }}</div>
                            @enderror
                            <div class="form-floating mt-4">
                                <input type="password" name="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            @error('password')
                                <div class="text-warning"><i class="fa-solid fa-triangle-exclamation"
                                        style="color: #FFC007;"></i> {{ $message }}</div>
                            @enderror
                            <div class="d-flex align-items-center justify-content-between my-4">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <a href="{{ url('forgot-password') }}">Forgot Password</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                            <a href="{{ route('auth.google') }}">
                                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                                    class=" w-100  mb-4" style="height: 70px">
                            </a>
                            <a href="{{ route('auth.facebook') }}">
                                <img src="https://developers.facebook.com/identity/images/btn_facebook_signin_dark_normal_web.png"
                                    class=" w-100  mb-4" style="height: 70px">
                            </a>

                        </form>
                        <p class="text-center mb-0">Don't have an Account? <a href="{{ url('register') }}">Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/backEnd/chart/chart.min.js') }}"></script>
    <script src="{{ asset('assets/backEnd/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/backEnd/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/backEnd/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/backEnd/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/backEnd/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/backEnd/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('assets/backEnd/js/all.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/backEnd/js/main.js') }}"></script>
</body>

</html>
