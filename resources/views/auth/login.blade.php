<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>{{ $page }} Page | WonderlustNusantara</title>
</head>

<body>
    <div class="row h-100 min-vh-100">
        <div class="col-lg-5 d-flex align-items-end">
            <div class="login-img w-100 h-100">
                <img src="{{ asset('assets/img/auth/login.jpg') }}" alt="Login Banner">
            </div>
        </div>
        <div class="col-lg-7 col-12 d-flex flex-column align-items-center h-100 min-vh-100">
            <div class="w-100 d-flex flex-column justify-content-center align-items-center " style="height: 100vh;">
                <div class="px-5 mx-5 w-100" style="max-width: 640px;">
                    <div class="d-flex flex-column card-body ps-5 mb-4">

                        @if (session()->has('success'))
                            <div class="alert alert-success mb-4" role="alert">
                                {{ session('success') }}
                            </div>
                        @elseif(session()->has('failed'))
                            <div class="alert alert-danger mb-4" role="alert">
                                {{ session('failed') }}
                            </div>
                        @elseif(session()->has('logout'))
                            <div class="alert alert-success mb-4" role="alert">
                                {{ session('logout') }}
                            </div>
                        @endif

                        <p class="text-black fw-semibold fs-1 d-flex flex-column align-items-center mb-2"
                            style="line-height: 120%;">
                            <span class="main-color mb-0">Welcome Back</span>
                            Please Login Your Account
                        </p>
                        <p class="mt-2 text-center fw-medium mb-4">As an admin responsible for managing and managing the
                            WanderlustNusantara platform.</p>
                        <form action="{{ route('login.action') }}" method="post">
                            @csrf
                            <div class="input-wrapper pt-2 w-100 d-flex flex-column gap-3">
                                <input type="email" name="email" class="w-100 input-text rounded-full"
                                    placeholder="Enter your email" style="border-radius: 9999px;">
                                <input type="password" name="password" class="w-100 input-text mt-2 rounded-full"
                                    placeholder="Enter your password" style="border-radius: 9999px;">
                            </div>
                            <button type="submit"
                                class="btn btn-color w-100 p-3 mt-4 rounded-full text-center">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script></script>
</body>

</html>
