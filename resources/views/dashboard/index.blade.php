@extends('templates.main')

@section('main')
    <div class="px-5">
        <div class="d-flex flex-row justify-content-between">
            <p class="fw-semibold fs-2 text-black">@lang('messages.dashboard_title')</p>
            <div class="d-lg-flex justify-content-end d-none gap-2">
                <div class="d-xl-none hamburger-wrapper d-flex text-white align-self-center">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" style="height: fit-content; padding: 13px 22px;"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ strtoupper(session('locale')) ?? strtoupper(config('app.locale')) }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('switch-language', ['locale' => 'id']) }}">ID</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('switch-language', ['locale' => 'en']) }}">EN</a>
                        </li>
                    </ul>
                </div>
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
                                <p class="card-dashboard-desc">@lang('messages.dashboard_item1')</p>
                                <p class="main-color fs-4 fw-bold ">4</p>
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
                                <p class="card-dashboard-desc">@lang('messages.dashboard_item2')</p>
                                <p class="main-color fs-4 fw-bold ">{{ $destination_count }}</p>
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
                                <p class="card-dashboard-desc">@lang('messages.dashboard_item3')</p>
                                <p class="main-color fs-4 fw-bold ">{{ $city_count }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-dashboard-wrapper">
                        <div class="card-body card-dashboard-content d-flex flex-row gap-3 align-items-start">
                            <div class="img-card-dashboard-wrapper">
                                <img src="{{ asset('assets/img/dashboard/icon4.svg') }}" class="img-fluid"
                                    alt="Menu Dashboard Icon" style="border-radius: 2px">
                            </div>
                            <div class="card-dashboard-name d-flex flex-column">
                                <p class="card-dashboard-desc">@lang('messages.dashboard_item4')</p>
                                <p class="main-color fs-4 fw-bold ">{{ $gallery_count_all }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content mt-4 px-5">
        <p class="fw-medium text-black mb-3" style="font-size: 18px">@lang('messages.dashboard_subtitle')</p>
        <div class="row px-3 py-4 rounded-1" style="background-color: white">
            <div class="col-12 my-2">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>@lang('messages.table_name')</td>
                            <td>@lang('messages.table_location')</td>
                            <td>@lang('messages.table_rating')</td>
                            <td>@lang('messages.table_total_images')</td>
                            <td>@lang('messages.table_history')</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($destinations->count() == 0)
                            <tr>
                                <td colspan="6" class="text-center py-3">@lang('messages.table_destination_notfound')!</td>
                            </tr>
                        @else
                            @foreach ($destinations as $i => $destinations)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="width: 250px">{{ $destinations->name }}</td>
                                    <td>{{ $destinations->location }}</td>
                                    <td>{{ $destinations->rating }}</td>
                                    @php
                                        $isEmpty = empty(array_filter($gallery_count_destination[$i]));
                                    @endphp
                                    @if (!$isEmpty)
                                        <td>{{ count($gallery_count_destination[$i]) }}</td>
                                    @else
                                        <td>0</td>
                                    @endif
                                    <td style="width: 300px">
                                        <p
                                            style="-webkit-line-clamp:2; overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; color: #212529;">
                                            {{ $destinations->history_1 }}
                                        </p>
                                    </td>
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
