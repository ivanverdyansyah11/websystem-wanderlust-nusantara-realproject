@extends('templates.main')
@section('main')
    <div class="header-section d-flex flex-row justify-content-between padding-section px-5">
        <p class="text-black fw-semibold fs-2">Galeri Detail Page</p>
        <div class="d-lg-flex justify-content-end gap-2">
            <button class="btn btn-color d-lg-flex d-none" data-bs-toggle="modal" data-bs-target="#AddModal">Add New
                Gallery</button>
            @if (!is_null($gallery->image))
                <button class="btn btn-danger d-lg-flex d-none" data-bs-toggle="modal" data-bs-target="#DeleteModal"
                    data-id="{{ $gallery->id }}">Delete
                    All
                    Gallery</button>
            @endif
            <div class="d-xl-none hamburger-wrapper d-flex text-white align-self-center">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="dropdown d-none d-lg-inline-block">
                <button class="btn btn-dark dropdown-toggle" style="height: fit-content; padding: 13px 22px;" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
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

    @if (session()->has('success'))
        <div class="alert alert-success mx-5 my-4" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session()->has('failed'))
        <div class="alert alert-danger mx-5 my-4" role="alert">
            {{ session('failed') }}
        </div>
    @endif

    <div class="main-content mt-4 px-5 mb-5">
        <div class="row px-3 py-4 rounded-1" style="background-color: white">
            <div class="col-12 my-2">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <td>{{ $destination->name }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @if (is_null($gallery->image))
                                <td colspan="1" class="text-center pt-3">Image Not Found!</td>
                            @else
                                <td class="p-0 pt-3">
                                    <div class="wrapper" style="columns: 4; column-gap: 20px;">
                                        @foreach ($images as $image)
                                            <div class="box mb-3" style="width: 100%;">
                                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $image }} image"
                                                    style="max-width: 100% !important;" class="rounded-1">
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form action="{{ route('store-gallery') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="text-center fs-3 title-font fw-medium">Add New Gallery</div>
                        <div class="d-flex flex-column">
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <input type="hidden" name="destinations_id" value="{{ $destination->id }}">
                                    <p class="text-black fw-medium fs-14">Image</p>
                                    <div class="d-flex flex-column gap-2">
                                        <img src="{{ asset('assets/img/table/img-modal.svg') }}" alt="your image"
                                            class="tag-image img-preview" />
                                        <input type='file' class="input-file @error('image') is-invalid @enderror"
                                            size="150" name="images[]" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-center gap-2 pt-4">
                            <button type="button" class="btn btn-dark fs-15" data-bs-dismiss="modal">Cancel Add</button>
                            <button type="submit" class="btn btn-color fs-15">Add New Gallery</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="delete-modal" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="text-center fs-3 fw-medium title-font">Delete Gallery</div>
                        <div class="pt-3 text-center"> Do you really want to delete these gallery? This process cannot be
                            undone.
                        </div>
                        <div class="d-flex flex-row justify-content-center gap-2 pt-4">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel Delete</button>
                            <button type="submit" class="btn btn-color">Delete Gallery</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="https://kit.fontawesome.com/9e88c62f38.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $(document).on('click', '[data-bs-target="#DeleteModal"]', function() {
            let id = $(this).data('id');
            $('#delete-modal').attr('action', '/admin/gallery/delete/' + id);
        });

        const tagImage = document.querySelector('.tag-image');
        const inputImage = document.querySelector('.input-file');

        inputImage.addEventListener('change', function() {
            tagImage.src = URL.createObjectURL(inputImage.files[0]);
        });

        const btnHamburger = document.querySelector('.fa-bars');
        const sidebar = document.querySelector('.sidebar-wrapper');
        const body = document.querySelector('body');

        btnHamburger.addEventListener('click', function() {
            btnHamburger.classList.toggle('active');
            sidebar.classList.toggle('active');
        });
    </script>
@endsection
