@extends('templates.main')

@section('main')
    <div class="header-section d-flex flex-row justify-content-between padding-section px-5">
        <p class="text-black fw-medium fs-2">{{ $page }} Page</p>
        <div class="d-xl-none hamburger-wrapper d-flex text-white align-self-center">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>

    <div class="main-content mt-4 px-5 mb-5">
        <div class="row px-3 py-4 rounded-1" style="background-color: white">
            <div class="col-12 my-2">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Total Images</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($destinations->count() == 0)
                            <tr>
                                <td colspan="4" class="text-center py-3">Data Destination Not Found!</td>
                            </tr>
                        @else
                            @foreach ($destinations as $i => $destinations)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $destinations->name }}</td>
                                    @php
                                        $isEmpty = empty(array_filter($gallery_count[$i]));
                                    @endphp
                                    @if (!$isEmpty)
                                        <td>{{ count($gallery_count[$i]) }}</td>
                                    @else
                                        <td>0</td>
                                    @endif
                                    <td class=" flex-row gap-1 d-lg-flex d-none">
                                        <a href="/admin/gallery/{{ $destinations->id }}"
                                            class="btn btn-edit d-lg-flex d-none p-0">
                                            <img src="{{ asset('assets/img/btn/detail-icon.svg') }}">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
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
