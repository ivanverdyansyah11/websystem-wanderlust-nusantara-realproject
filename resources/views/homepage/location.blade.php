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
                            <a class="nav-link fw-semibold" href="/homepage">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-semibold" href="/location">Destination Location</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/gallery">Gallery Documentation</a>
                        </li>
                    </ul>
                </div>
                <div class="d-lg-flex justify-content-end d-none">
                    <a href="https://wa.me/+62123456789" target="_blank"
                        class="btn btn-color d-flex flex-row align-items-center gap-2">
                        contact us
                        <img src="{{ asset('assets/img-homepage/arr-btn.svg') }}" alt="" class=""
                            draggable="false">
                    </a>
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
                                Unraveling the Historical Treasures of All of City
                            </p>
                        </div>
                        <p class="fw-semibold display-4 mt-2 text-black">
                            Unveiling Nusantara's Historic Gems, From City by City
                        </p>
                        <article class="mt-3">
                            <p>
                                From the majestic Puri Agung Semarapura, the former royal palace that witnessed the
                                heroic puputan battle against the Dutch, to the captivating Taman Gili Kerta Gosa, where
                                ancient court cases were judged and engraved on its magnificent ceiling, each location
                                holds a unique piece of Klungkung's history.
                            </p>
                            <p class="mt-1">
                                Explore the sacred Pura Goa Lawah, known for its bat-filled cave and its connection to
                                the protective deity Dewa Naga Basuki. Marvel at the ancient Pura Penataran Sasih, the
                                oldest temple in Klungkung, revered by locals for its historical and spiritual
                                significance.
                            </p>
                        </article>
                        <div class="mt-4 d-flex flex-row gap-3">
                            <a href="#featured" class="btn btn-color">Explore Now</a>
                            <a href="/homepage"
                                class="btn text-decoration-none btn-secondary d-flex flex-row align-items-center gap-2">
                                Back to Home
                                <img src="{{ asset('assets/img-homepage/arr-btn.svg') }}" alt="" class=""
                                    draggable="false">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-banner row  position-absolute d-none top-0 banner-background end-0 d-lg-inline-block">
                <img src="{{ asset('assets/img-homepage/hero2-img.jpg') }}" alt="hero section image"
                    class="w-100 h-100">
            </div>
        </section>
    </div>

    <main class="mt-1">
        <section id="featured" class="city-section container">
            <div class="top-section row gy-4">
                <div class="col-md-6 col-lg-6 col-12">
                    <div class="d-flex flex-column">
                        <div class="badge-section">
                            <p class="fs-15 fw-semibold main-color">
                                Discover the Hidden Archipelago Cities
                            </p>
                        </div>
                        <p class="mt-2 display-5 fw-semibold text-black">
                            Find Out the Nusantara's Historic Cities
                        </p>
                    </div>
                </div>
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-5 align-self-end col-md-6 col-12">
                    Embark on an extraordinary voyage through Nusantara's history as you explore WanderlustNusantara's
                    city categories. From the majestic ruins of Yogyakarta to the colonial charms of Jakarta.
                </div>
            </div>

            <div
                class="content-section mt-5 row row-cols-xl-4 gy-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1">
                @foreach ($cities as $city)
                    <a href="/location/{{ $city->id }}" class="">
                        <div class="card-img-recommendation position-relative">
                            <div class="btm-text position-absolute bottom-0">
                                <p class="text-white fw-semibold fs-5">{{ $city->name }}</p>
                            </div>
                            <div class="center-img position-absolute">
                                <i class="fa-solid fa-magnifying-glass fs-2 text-white"></i>
                            </div>
                            <img src="{{ asset('storage/' . $city->image) }}" alt="{{ $city->name }}"
                                class="w-100 position-relative city" style="border-radius: 20px">
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <section class="gallery-section container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <p class="badge-section main-color fs-15 fw-semibold">
                        A Pictorial Journey Through Historical Tapestry
                    </p>
                    <h4 class="text-black mt-1 display-5 fw-semibold">
                        Gallery of Beautiful Archipelago Places
                    </h4>
                    <p class="fw-medium">
                        Immerse yourself in the captivating gallery of WanderlustNusantara's historical tourism website,
                        where the rich tapestry of Nusantara's heritage comes to life. Explore a visual feast of ancient
                        ruins, majestic temples, and cultural landmarks that showcase the remarkable history of
                        Indonesia.
                    </p>
                    <div class="mt-5">
                        <a href="/gallery" class="btn btn-color d-flex flex-row gap-2 align-items-center">
                            More Documentation
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
