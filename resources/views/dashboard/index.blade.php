@extends('templates.main')

@section('main')
    <div class="px-5">
        <div class="d-flex flex-row justify-content-between">
            <p class="fw-semibold fs-2 text-black">{{ $page }} Page</p>
            <div class="d-xl-none hamburger-wrapper d-flex text-white align-self-center">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </div>
    <div class="top-content-dashboard mt-4  px-5 justify-content-center">
        <div>
            <div class="top-main-content-dashboard row row-cols-lg-3 row-cols-xl-4 gap row-cols-md-2 row-cols-1 gy-3">
                <div class="col">
                    <div class="card card-dashboard-wrapper">
                        <div class="card-body card-dashboard-content d-flex flex-row gap-3 align-items-start">
                            <div class="img-card-dashboard-wrapper">
                                <img src="{{ asset('assets/img/dashboard/icon1.svg') }}" class="img-fluid"
                                    alt="Menu Dashboard Icon" style="border-radius: 2px">
                            </div>
                            <div class="card-dashboard-name d-flex flex-column">
                                <p class="card-dashboard-desc">Total Menu</p>
                                <p class="main-color fs-4 fw-bold ">{{ $menu_count }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-dashboard-wrapper">
                        <div class="card-body card-dashboard-content d-flex flex-row gap-3 align-items-start">
                            <div class="img-card-dashboard-wrapper">
                                <img src="{{ asset('assets/img/dashboard/icon2.svg') }}" class="img-fluid"
                                    alt="Menu Dashboard Icon" style="border-radius: 2px">
                            </div>
                            <div class="card-dashboard-name d-flex flex-column">
                                <p class="card-dashboard-desc">Total Location Branch</p>
                                <p class="main-color fs-4 fw-bold ">{{ $location_count }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-dashboard-wrapper">
                        <div class="card-body card-dashboard-content d-flex flex-row gap-3 align-items-start">
                            <div class="img-card-dashboard-wrapper">
                                <img src="{{ asset('assets/img/dashboard/icon3.svg') }}" class="img-fluid"
                                    alt="Menu Dashboard Icon" style="border-radius: 2px">
                            </div>
                            <div class="card-dashboard-name d-flex flex-column">
                                <p class="card-dashboard-desc">Total Chef</p>
                                <p class="main-color fs-4 fw-bold ">{{ $chef_count }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-dashboard-wrapper">
                        <div class="card-body card-dashboard-content d-flex flex-row gap-3 align-items-start">
                            <div class="img-card-dashboard-wrapper">
                                <img src="{{ asset('assets/img/dashboard/icon1.svg') }}" class="img-fluid"
                                    alt="Menu Dashboard Icon" style="border-radius: 2px">
                            </div>
                            <div class="card-dashboard-name d-flex flex-column">
                                <p class="card-dashboard-desc">Customer Feedback</p>
                                <p class="main-color fs-4 fw-bold ">{{ $feedback_count }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content mt-4 px-5">
        <p class="fw-medium text-black mb-3" style="font-size: 18px">Most Recent Menu</p>
        <div class="row px-3 py-4 rounded-1" style="background-color: white">
            <div class="col-12 my-2">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Image</td>
                            <td>Price</td>
                            <td>Description</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($menus->count() == 0)
                            <tr>
                                <td colspan="6" class="text-center py-3">Data Menu Not Found!</td>
                            </tr>
                        @else
                            @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $menu->name }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }} image"
                                            width="150">
                                    </td>
                                    <td>{{ $menu->price }}</td>
                                    <td style="width: 400px">{{ $menu->description }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="https://kit.fontawesome.com/9e88c62f38.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9e88c62f38.js" crossorigin="anonymous"></script>

    <script>
        const btnHamburger = document.querySelector('.fa-bars');
        const sidebar = document.querySelector('.sidebar-wrapper');
        const body = document.querySelector('body');

        btnHamburger.addEventListener('click', function() {
            btnHamburger.classList.toggle('active');
            sidebar.classList.toggle('active');
        });
    </script>
@endsection
