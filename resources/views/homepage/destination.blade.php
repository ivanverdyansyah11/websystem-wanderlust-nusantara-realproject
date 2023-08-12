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
                                @lang('messages.destination_subtitle') {{ $destination->name }}
                            </p>
                        </div>
                        <p class="fw-semibold display-4 mt-2 text-black">
                            @lang('messages.destination_title') {{ $destination->name }}
                        </p>
                        <article class="mt-3">
                            <p>
                                @lang('messages.destination_description1') {{ $destination->name }}@lang('messages.destination_description2')
                                {{ $destination->location }}@lang('messages.destination_description3')
                            </p>
                            <p class="mt-1">
                                @lang('messages.destination_description4') {{ $destination->name }} @lang('messages.destination_description5')
                            </p>
                        </article>
                        <div class="mt-4 d-flex flex-row gap-3">
                            <a href="#featured" class="btn btn-color">@lang('messages.button1_location')</a>
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
                <img src="{{ asset('storage/' . $destination->image) }}" alt="hero section image"
                    class="w-100 h-100 hero-banner">
            </div>
        </section>
    </div>

    <main class="mt-1">
        <section id="featured" class="gallery-section container">
            <div class="top-section row gy-4">
                <div class="col-md-6 col-lg-6 col-12">
                    <div class="d-flex flex-column">
                        <div class="badge-section">
                            <p class="fs-15 fw-semibold main-color">
                                {{ $destination->name }} @lang('messages.subtitle_gallery_destination')
                            </p>
                        </div>
                        <p class="mt-2 display-5 fw-semibold text-black">
                            @lang('messages.title_gallery_destination') {{ $destination->name }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-5 align-self-end col-md-6 col-12">
                    @lang('messages.description1_gallery_destination') {{ $destination->name }}@lang('messages.description2_gallery_destination')
                    {{ $destination->name }} @lang('messages.description3_gallery_destination')
                </div>
            </div>
            <div class="content-section mt-5">
                <div class="wrapper" style="columns: 4; column-gap: 20px;">
                    @foreach ($gallery as $image)
                        <div class="box mb-3" style="width: 100%;">
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $image }}"
                                style="max-width: 100% !important;" class="rounded-1">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="about" class="about-section position-relative">
            <div class="bg-section"></div>
            <div class="row banner-section position-absolute d-none top-0 banner-background start-0 d-lg-inline-block">
                <img src="{{ asset('storage/' . $destination->image) }}" alt="about section image"
                    class="w-100 h-100 banner-section">
            </div>
            <div class="container position-relative">
                <div class="row justify-content-end">
                    <div class="col-xl-6 col-lg-7 col-12">
                        <div class="badge-section">
                            <p class="main-color fs-15 fw-semibold">
                                {{ $destination->name }} @lang('messages.subtitle_history_destination')
                            </p>
                        </div>
                        <p class="fw-semibold display-5 mt-1 text-black">
                            @lang('messages.title_history_destination') {{ $destination->name }}
                        </p>
                        <article class="mt-3">
                            <p>
                                {{ $destination->history_1 }}
                            </p>
                            <p class="mt-1">
                                {{ $destination->history_2 }}
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="recommendation-section container">
            <div class="top-section row gy-4">
                <div class="col-md-6 col-lg-6 col-12">
                    <div class="d-flex flex-column">
                        <div class="badge-section">
                            <p class="fs-13 fw-medium main-color">
                                @lang('messages.subtitle_recommendation_destination')
                            </p>
                        </div>
                        <p class="mt-2 display-5 fw-semibold text-black">
                            @lang('messages.title_recommendation_destination')
                        </p>
                    </div>
                </div>
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-5 align-self-end col-md-6 col-12">
                    <p>
                        @lang('messages.description_recommendation_destination')
                    </p>
                </div>
            </div>
            <div class="content-section mt-5">
                <div class="swiper swiper-center pb-5">
                    <div class="swiper-wrapper">
                        @foreach ($recommendations as $recommend)
                            <div class="swiper-slide">
                                <a href="/destination/{{ $recommend->id }}" class="">
                                    <div class="card-img-recommendation position-relative">
                                        <div class="top-text me-3 position-absolute gap-1 container end-0">
                                            <div class="d-flex flex-row gap-1 align-items-center">
                                                <img src="{{ asset('assets/img-homepage/star.svg') }}" alt=""
                                                    class="" draggable="false">
                                                <p class="rating fw-bold fs-15 text-white">{{ $recommend->rating }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="btm-text position-absolute bottom-0">
                                            <p class="text-white fw-semibold fs-5">{{ $recommend->name }}</p>
                                            <div class="d-flex flex-row gap-1">
                                                <img src="{{ asset('assets/img-homepage/location.svg') }}"
                                                    alt="" class="" draggable="false">
                                                <p class="text-white fs-14 fw-medium">{{ $recommend->location }}</p>
                                            </div>
                                        </div>
                                        <div class="center-img position-absolute">
                                            <i class="fa-solid fa-magnifying-glass fs-2 text-white"></i>
                                        </div>
                                        <img src="{{ asset('storage/' . $recommend->image) }}"
                                            alt="{{ $recommend->name }}"
                                            class=" position-relative city img-place-recommendation">
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <div class="cta-content container">
                <div class="row gy-4">
                    <div class="col-md-6 col-12">
                        <p class="display-5 text-white fw-semibold">@lang('messages.cta_title')</p>
                    </div>
                    <div class="col-md-6 col-12 align-self-end d-flex justify-content-end">
                        <a href="https://wa.me/+62123456789" target="_blank"
                            class="btn btn-white d-flex flex-row gap-2 align-items-center">
                            @lang('messages.cta_button')
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
                                @lang('messages.footer_description')
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
                    <p class="text-white title-font second-font fw-medium" style="font-size: 1.125rem;">
                        @lang('messages.footer_subtitle1')</p>
                    <div class="d-flex flex-column pt-4">
                        <a href="/homepage"
                            class="footer-color footer-link text-decoration-none">@lang('messages.nav_link1')</a>
                        <a href="/location"
                            class="footer-color text-decoration-none footer-link pt-3">@lang('messages.nav_link2')</a>
                        <a href="/gallery"
                            class="footer-color text-decoration-none footer-link pt-3">@lang('messages.nav_link3')</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-12" style="width:fit-content;">
                    <p class="text-white title-font second-font fw-medium" style="font-size: 1.125rem;">
                        @lang('messages.footer_subtitle2')</p>
                    <div class="d-flex flex-column pt-4">
                        <a href="/homepage#recommendation"
                            class="footer-color footer-link text-decoration-none ">@lang('messages.footer_item2_link1')</a>
                        <a href="/homepage#featured"
                            class="footer-color footer-link pt-3 text-decoration-none">@lang('messages.footer_item2_link2')</a>
                        <a href="/homepage#about"
                            class="footer-color footer-link pt-3 text-decoration-none">@lang('messages.footer_item2_link3')</a>
                        <a href="/homepage#testi"
                            class="footer-color footer-link pt-3 text-decoration-none">@lang('messages.footer_item2_link4')</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <p class="text-white title-font second-font fw-medium" style="font-size: 1.125rem;">
                        @lang('messages.footer_subtitle3')
                    </p>
                    <div class="d-flex flex-column pt-4">
                        <a href="/homepage#featured"
                            class="footer-color text-decoration-none footer-link ">@lang('messages.featured_item1')</a>
                        <a href="/homepage#featured"
                            class="footer-color text-decoration-none footer-link pt-3">@lang('messages.featured_item2')</a>
                        <a href="/homepage#featured"
                            class="footer-color text-decoration-none footer-link pt-3">@lang('messages.featured_item3')</a>
                        <a href="/homepage#featured"
                            class="footer-color text-decoration-none footer-link pt-3">@lang('messages.featured_item4')</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <p class="text-white title-font second-font fw-medium" style="font-size: 1.125rem;">
                        @lang('messages.footer_subtitle4')</p>
                    <div class="d-flex flex-column pt-4">
                        <p class="footer-color footer-link ">@lang('messages.footer_item4_link1')</p>
                        <p class="footer-color footer-link pt-3">@lang('messages.footer_item4_link2')</p>
                        <a target="_blank" href="https://wa.me/+62123456789"
                            class="footer-color footer-link pt-3 text-decoration-none">@lang('messages.footer_item4_link3')</a>
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
