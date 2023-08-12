<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page }} Page | WonderlustNusantara</title>
    <link rel="icon" href="{{ asset('assets/img-homepage/logo.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css-homepage/bootstrap.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css-homepage/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>

<body>
    <div class="top-section">
        <nav class="navbar navbar-expand-lg py-3">
            <div class="container">
                <a class="navbar-brand" href="/homepage"><img src="{{ asset('assets/img-homepage/logo.svg') }}"
                        alt="" draggable="false"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#home">@lang('messages.nav_link1')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-semibold" href="/location">@lang('messages.nav_link2')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/gallery">@lang('messages.nav_link3')</a>
                        </li>
                    </ul>
                </div>
                <div class="d-lg-flex justify-content-end d-none gap-2">
                    <a href="https://wa.me/+62123456789" target="_blank"
                        class="btn btn-color d-flex flex-row align-items-center gap-2"
                        style="height: fit-content; padding: 13px 22px;">
                        @lang('messages.nav_button')
                        <img src="{{ asset('assets/img-homepage/arr-btn.svg') }}" alt="" class=""
                            draggable="false">
                    </a>
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" style="height: fit-content; padding: 13px 22px;"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ strtoupper(session('locale')) ?? strtoupper(config('app.locale')) }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"
                                    href="{{ route('switch-language', ['locale' => 'id']) }}">ID</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('switch-language', ['locale' => 'en']) }}">EN</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <section class="hero-section position-relative">
            <div class="bg-section"></div>
            <div class="container position-relative">
                <div class="row justify-content-start">
                    <div class="col-xl-6 col-lg-7 col-12">
                        <div class="badge-section">
                            <p class="main-color">
                                @lang('messages.subtitle_locations') {{ $city->name }}
                            </p>
                        </div>
                        <p class="fw-semibold display-4 mt-2 text-black">
                            @lang('messages.title1_locations') {{ $city->name }} @lang('messages.title2_locations')
                        </p>
                        <article class="mt-3">
                            <p>
                                @lang('messages.description1_locations')
                            </p>
                            <p class="mt-1">
                                @lang('messages.description2_locations') {{ $city->name }} @lang('messages.description3_locations')
                            </p>
                        </article>
                        <div class="mt-4 d-flex flex-row gap-3">
                            <a href="#recommend" class="btn btn-color">@lang('messages.button1_location')</a>
                            <a href="/homepage"
                                class="btn text-decoration-none btn-secondary d-flex flex-row align-items-center gap-2">
                                @lang('messages.button2_location')
                                <img src="{{ asset('assets/img-homepage/arr-btn.svg') }}" alt="" class=""
                                    draggable="false">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-banner row  position-absolute d-none top-0 banner-background end-0 d-lg-inline-block">
                <img src="{{ asset('assets/img-homepage/hero3-img.png') }}" alt="hero section image"
                    class="w-100 h-100">
            </div>
        </section>
    </div>

    <main class="mt-1">
        <section class="recommendation-section container" id="recommend">
            <div class="top-section row gy-4">
                <div class="col-md-6 col-lg-6 col-12">
                    <div class="d-flex flex-column">
                        <div class="badge-section">
                            <p class="fs-15 fw-semibold main-color">
                                @lang('messages.subtitle_category_locations')
                            </p>
                        </div>
                        <p class="mt-2 display-5 fw-semibold text-black">
                            @lang('messages.title_category_locations') {{ $city->name }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-5 align-self-end col-md-6 col-12">
                    @lang('messages.description1_category_locations') {{ $city->name }}@lang('messages.description2_category_locations')
                </div>
            </div>
            <div
                class="content-section mt-5 row row-cols-xl-4 gy-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1">
                @foreach ($destinations as $destination)
                    <div class="col">
                        <a href="/destination/{{ $destination->id }}" class="">
                            <div class="card-img-recommendation position-relative">
                                <div class="top-text me-3 position-absolute gap-1 container end-0">
                                    <div class="d-flex flex-row gap-1 align-items-center">
                                        <img src="img/star.svg" alt="" class="" draggable="false">
                                        <p class="rating fw-bold fs-15 text-white">{{ $destination->rating }}</p>
                                    </div>
                                </div>
                                <div class="btm-text position-absolute bottom-0">
                                    <p class="text-white fw-semibold fs-5">{{ $destination->name }}</p>
                                    <div class="d-flex flex-row gap-1">
                                        <img src="img/location.svg" alt="" class="" draggable="false">
                                        <p class="text-white fs-14 fw-medium">{{ $destination->location }}</p>
                                    </div>
                                </div>
                                <div class="center-img position-absolute">
                                    <i class="fa-solid fa-magnifying-glass fs-2 text-white"></i>
                                </div>
                                <img src="{{ asset('storage/' . $destination->image) }}"
                                    alt="{{ $destination->name }}"
                                    class=" position-relative city img-place-recommendation">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="gallery-section container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <p class="badge-section main-color fs-15 fw-semibold">
                        @lang('messages.gallery_subtitle')
                    </p>
                    <h4 class="text-black mt-1 display-5 fw-semibold">
                        @lang('messages.gallery_title')
                    </h4>
                    <p class="fw-medium">
                        @lang('messages.gallery_description')
                    </p>
                    <div class="mt-5">
                        <a href="/gallery" class="btn btn-color d-flex flex-row gap-2 align-items-center">
                            @lang('messages.gallery_button')
                            <img src="{{ asset('assets/img-homepage/arr-btn.svg') }}" alt="" class=""
                                draggable="false">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="swiper swiper-side pb-5">
                        <div class="swiper-wrapper">
                            @foreach ($destination_all as $destination)
                                <div class="swiper-slide">
                                    <a href="/destination/{{ $destination->id }}" class="">
                                        <div class="card-img-recommendation position-relative">
                                            <div class="btm-text position-absolute bottom-0">
                                                <div class="d-flex flex-row gap-1">
                                                    <img src="{{ asset('assets/img-homepage/location.svg') }}"
                                                        alt="" class="" draggable="false">
                                                    <p class="text-white fs-14 fw-medium">{{ $destination->name }}</p>
                                                </div>
                                            </div>
                                            <div class="center-img position-absolute">
                                                <i class="fa-solid fa-magnifying-glass fs-2 text-white"></i>
                                            </div>
                                            <img src="{{ asset('storage/' . $destination->image) }}"
                                                alt="{{ $destination->name }}"
                                                class="img-fluid position-relative image-recommendation">
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination d-flex justify-content-start"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <div class="cta-content container">
                <div class="row gy-4">
                    <div class="col-md-6 col-12">
                        <p class="display-5 text-white fw-semibold">Get to Know More About the History of Other
                            Archipelagos</p>
                    </div>
                    <div class="col-md-6 col-12 align-self-end d-flex justify-content-end">
                        <a href="https://wa.me/+62123456789" target="_blank"
                            class="btn btn-white d-flex flex-row gap-2 align-items-center">
                            connect with us
                            <img src="{{ asset('assets/img-homepage/arr-btn-black.svg') }}" alt=""
                                class="" draggable="false">
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer mt-5">
        <div class="container">
            <div class="footer-content pb-3 row gy-5">
                <div class="col-lg-4 col-md-6 col-12 ">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-column">
                            <div class="">
                                <img src="{{ asset('assets/img-homepage/logo.svg') }}" class="img-fluid"
                                    alt="logo">
                            </div>
                            <p class="footer-color pt-3 footer-desc">
                                Welcome to WanderlustNusantara, where we invite you to embark on an extraordinary
                                journey through the enchanting landscapes
                            </p>
                        </div>
                        <div class="d-flex flex-row pt-4 gap-2">
                            <a target="_blank" href="https://www.instagram.com/" class="btn footer-btn">
                                <i class="fa-brands fa-instagram the-arrow footer-color fs-6"></i>
                            </a>
                            <a target="_blank" href="https://id-id.facebook.com/" class="btn footer-btn">
                                <i class="fa-brands fa-facebook-f the-arrow footer-color fs-6"></i>
                            </a>
                            </button>
                            <a target="_blank" href="https://twitter.com/" class="btn footer-btn">
                                <i class="fa-brands fa-twitter the-arrow footer-color  fs-6"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-12" style="width:fit-content;">
                    <p class="text-white title-font second-font fw-medium" style="font-size: 1.125rem;">Home Page</p>
                    <div class="d-flex flex-column pt-4">
                        <a href="/homepage" class="footer-color footer-link text-decoration-none">Home</a>
                        <a href="/location" class="footer-color text-decoration-none footer-link pt-3">Destination
                            Location</a>
                        <a href="/gallery" class="footer-color text-decoration-none footer-link pt-3">Gallery
                            Documentation</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-12" style="width:fit-content;">
                    <p class="text-white title-font second-font fw-medium" style="font-size: 1.125rem;">Quick Link</p>
                    <div class="d-flex flex-column pt-4">
                        <a href="/homepage#recommendation"
                            class="footer-color footer-link text-decoration-none ">Recommendation Place</a>
                        <a href="/homepage#featured" class="footer-color footer-link pt-3 text-decoration-none">Our
                            Featured</a>
                        <a href="/homepage#about" class="footer-color footer-link pt-3 text-decoration-none">About
                            Us</a>
                        <a href="/homepage#testi"
                            class="footer-color footer-link pt-3 text-decoration-none">Testimonial</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <p class="text-white title-font second-font fw-medium" style="font-size: 1.125rem;">Our featured
                    </p>
                    <div class="d-flex flex-column pt-4">
                        <a href="#featured" class="footer-color text-decoration-none footer-link ">Island Paradise
                            Retreat</a>
                        <a href="#featured" class="footer-color text-decoration-none footer-link pt-3">Cultural
                            Heritage Expedition</a>
                        <a href="#featured" class="footer-color text-decoration-none footer-link pt-3">Jungle
                            Adventure Trek</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <p class="text-white title-font second-font fw-medium" style="font-size: 1.125rem;">Help & guide
                    </p>
                    <div class="d-flex flex-column pt-4">
                        <p class="footer-color footer-link ">Terms & Conditions</p>
                        <p class="footer-color footer-link pt-3">Privacy Policy</p>
                        <a target="_blank" href="https://wa.me/+62123456789"
                            class="footer-color footer-link pt-3">Contact Us</a>
                    </div>
                </div>
                <div class="d-flex justify-content-center flex-column mt-5 pt-5 pb-4">
                    <hr class="hr-footer opacity-100 bg-opacity-100 w-100">
                    <p class="text-center fs-14" style="color: rgba(255, 255, 255, 0.32)">Copyright © 2023
                        WanderlustNusantara</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/9e88c62f38.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js-homepage/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js-homepage/bootstrap.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const swiperCenter = new Swiper('.swiper-center', {
            speed: 500,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                1: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                500: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                900: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                1100: {
                    slidesPerView: 4,
                    spaceBetween: 20
                }
            }
        })
        const swiperSide = new Swiper('.swiper-side', {
            speed: 500,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                1: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                500: {
                    slidesPerView: 2.2,
                    spaceBetween: 20
                },
                900: {
                    slidesPerView: 1.5,
                    spaceBetween: 20
                },
                1100: {
                    slidesPerView: 1.8,
                    spaceBetween: 20
                },
                1300: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },

            }
        })
    </script>
</body>

</html>
