<div class="sidebar d-flex flex-column content-wrapper container pt-5 sticky-top">
    <div class="d-flex flex-column align-items-end h-100" style="min-height:92vh">
        <div class="d-flex justify-content-center flex-column logo-wrapper w-100">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('assets/img/sidebar/logo.svg') }}" class="img-fluid" alt="Logo Delicious Klungkung">
            </div>
        </div>
        <div class="sidebar-menu-wrapper row mt-4 gy-2 pt-2">
            <div class="col-12">
                <div class="menu-sidebar ps-4 pe-3">
                    <a href="{{ route('dashboard') }}"
                        class="{{ Request::is('*dashboard') ? 'active' : '' }} d-flex align-items-center menu-wrapper gap-3 text-decoration-none">
                        <div class="icon-sidebar dashboard-icon"></div>
                        <p class="mb-0">Dashboard</p>
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="menu-sidebar ps-4 pe-3">
                    <a href="{{ route('index-destination') }}"
                        class="{{ Request::is('*destination*') ? 'active' : '' }} d-flex align-items-center menu-wrapper gap-3 text-decoration-none">
                        <div class="icon-sidebar destination-icon"></div>
                        <p class="mb-0">Destination</p>
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="menu-sidebar ps-4 pe-3">
                    <a href="{{ route('index-city') }}"
                        class="{{ Request::is('*city*') ? 'active' : '' }} d-flex align-items-center menu-wrapper gap-3 text-decoration-none">
                        <div class="icon-sidebar city-icon"></div>
                        <p class="mb-0">City</p>
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="menu-sidebar ps-4 pe-3">
                    <a href="{{ route('index-gallery') }}"
                        class="{{ Request::is('*gallery*') ? 'active' : '' }} d-flex align-items-center menu-wrapper gap-3 text-decoration-none">
                        <div class="icon-sidebar gallery-icon"></div>
                        <p class="mb-0">Gallery</p>
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="menu-sidebar ps-4 pe-3">
                    <form action="{{ route('logout.action') }}" method="post" class="d-inline-block"
                        style="width: 100%;">
                        @csrf
                        <button type="submit"
                            class="d-flex align-items-center menu-wrapper py-3 gap-3 text-decoration-none">
                            <div class="icon-sidebar logout-icon"></div>
                            <p class="mb-0">Logout</p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
