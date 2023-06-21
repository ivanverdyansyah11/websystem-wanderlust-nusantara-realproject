@extends('templates.main')

@section('main')
    <div class="header-section d-flex flex-row justify-content-between padding-section px-5">

        <p class="text-black fw-medium fs-2">{{ $page }} Page</p>
        <button class="btn btn-color d-lg-flex d-none" data-bs-toggle="modal" data-bs-target="#AddModal">Add New
            Destination</button>
        <div class="d-xl-none hamburger-wrapper d-flex text-white align-self-center">
            <i class="fa-solid fa-bars"></i>
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
                            <td>No</td>
                            <td>Name</td>
                            <td>Location</td>
                            <td>Rating</td>
                            <td>Total Images</td>
                            <td>History</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($destinations->count() == 0)
                            <tr>
                                <td colspan="7" class="text-center py-3">Data Destination Not Found!</td>
                            </tr>
                        @else
                            @foreach ($destinations as $i => $destinations)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $destinations->name }}</td>
                                    <td>{{ $destinations->location }}</td>
                                    <td>{{ $destinations->rating }}</td>
                                    @php
                                        $isEmpty = empty(array_filter($gallery_count[$i]));
                                    @endphp
                                    @if (!$isEmpty)
                                        <td>{{ count($gallery_count[$i]) }}</td>
                                    @else
                                        <td>0</td>
                                    @endif
                                    <td style="width: 300px">{{ $text_history_1[$i] }}</td>
                                    <td class=" flex-row gap-1 d-lg-flex d-none">
                                        <button class="btn btn-edit d-lg-flex d-none p-0" data-bs-toggle="modal"
                                            data-bs-target="#EditModal" data-id="{{ $destinations->id }}">
                                            <img src="{{ asset('assets/img/btn/edit-icon.svg') }}">
                                        </button>
                                        <button class="btn btn-edit p-0 d-lg-flex d-none" data-bs-toggle="modal"
                                            data-bs-target="#DeleteModal" data-id="{{ $destinations->id }}">
                                            <img src="{{ asset('assets/img/btn/delete-icon.svg') }}">
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form action="{{ route('store-destination') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="text-center fs-3 title-font fw-medium">Add New Destination</div>
                        <div class="d-flex flex-column">
                            <div class="wrapper d-flex gap-3">
                                <div class="pt-2 w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <input type="hidden" name="id" value="{{ $id + 1 }}">
                                        <label for="name" class="text-black fw-medium fs-14">Name</label>
                                        <input type="text" id="name" name="name"
                                            class="w-100 input-text border-0 @error('name') is-invalid @enderror"
                                            placeholder="Enter city name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="pt-2 w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="rating" class="text-black fw-medium fs-14">Rating</label>
                                        <input type="text" id="rating" name="rating"
                                            class="w-100 input-text border-0 @error('rating') is-invalid @enderror"
                                            placeholder="Enter city rating" value="{{ old('rating') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper d-flex gap-3">
                                <div class="pt-2 w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="location" class="text-black fw-medium fs-14">Location</label>
                                        <input type="text" id="location" name="location"
                                            class="w-100 input-text border-0 @error('location') is-invalid @enderror"
                                            placeholder="Enter city location" value="{{ old('location') }}">
                                    </div>
                                </div>
                                <div class="pt-2 w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="cities_id" class="text-black fw-medium fs-14">City</label>
                                        <select class="w-100 input-text border-0" name="cities_id" id="cities_id">
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <p class="text-black fw-medium fs-14">Image</p>
                                    <div class="d-flex flex-row align-items-end gap-2">
                                        <img src="{{ asset('assets/img/table/img-modal.svg') }}" alt="your image"
                                            class="tag-image img-preview" />
                                        <input type='file' class="input-file @error('image') is-invalid @enderror"
                                            size="150" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper d-flex gap-3">
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="history_1" class="text-black fw-medium fs-14">History Paragraph
                                            1</label>
                                        <textarea type="text" id="history_1" name="history_1"
                                            class="w-100 input-text border-0 @error('history_1') is-invalid @enderror"
                                            placeholder="Enter city history paragraph 1" value="{{ old('history_1') }}" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="history_2" class="text-black fw-medium fs-14">History Paragraph
                                            2</label>
                                        <textarea type="text" id="history_2" name="history_2"
                                            class="w-100 input-text border-0 @error('history_2') is-invalid @enderror"
                                            placeholder="Enter city history paragraph 2" value="{{ old('history_2') }}" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-center gap-2 pt-4">
                            <button type="button" class="btn btn-dark fs-15" data-bs-dismiss="modal">Cancel Add</button>
                            <button type="submit" class="btn btn-color fs-15">Add New Destination</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="edit-modal" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="text-center fs-3 title-font fw-medium fw-medium">Edit Menu</div>
                        <div class="d-flex flex-column gap-3">
                            <div class="wrapper d-flex gap-3">
                                <div class="pt-2 w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="name" class="text-black fw-medium fs-14">Name</label>
                                        <input type="text" id="name" name="name"
                                            class="w-100 input-text border-0 @error('name') is-invalid @enderror"
                                            data-value="name">
                                    </div>
                                </div>
                                <div class="pt-2 w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="rating" class="text-black fw-medium fs-14">Rating</label>
                                        <input type="text" id="rating" name="rating"
                                            class="w-100 input-text border-0 @error('rating') is-invalid @enderror"
                                            data-value="rating">
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 w-100">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <label for="location" class="text-black fw-medium fs-14">Location</label>
                                    <input type="text" id="location" name="location"
                                        class="w-100 input-text border-0 @error('location') is-invalid @enderror"
                                        data-value="location">
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <input type="hidden" name="oldImage" data-value="oldImage">
                                    <p class="text-black fw-medium fs-14">Image</p>
                                    <div class="d-flex flex-row align-items-end gap-2">
                                        <img src="" alt="your image" class="tag-image-edit img-preview"
                                            data-value="image" />
                                        <input type='file' class="input-file-edit @error('image') is-invalid @enderror"
                                            size="150" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper d-flex gap-3">
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="history_1" class="text-black fw-medium fs-14">History Paragraph
                                            1</label>
                                        <textarea type="text" id="history_1" name="history_1"
                                            class="w-100 input-text border-0 @error('history_1') is-invalid @enderror" data-value="history_1"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="history_2" class="text-black fw-medium fs-14">History Paragraph
                                            2</label>
                                        <textarea type="text" id="history_2" name="history_2"
                                            class="w-100 input-text border-0 @error('history_2') is-invalid @enderror" data-value="history_2"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-center gap-2 pt-4">
                            <button type="button" class="btn btn-dark fs-15" data-bs-dismiss="modal">Cancel
                                Edit</button>
                            <button type="submit" class="btn btn-color fs-15">Save Changes</button>
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
                        <div class="text-center fs-3 fw-medium title-font">Delete Destination</div>
                        <div class="pt-3 text-center"> Do you really want to delete these destination? This process cannot
                            be
                            undone.
                        </div>
                        <div class="d-flex flex-row justify-content-center gap-2 pt-4">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel Delete</button>
                            <button type="submit" class="btn btn-color">Delete Destination</button>
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
        $(document).on('click', '[data-bs-target="#EditModal"]', function() {
            let id = $(this).data('id');
            $('#edit-modal').attr('action', '/admin/destination/edit/' + id);
            $.ajax({
                type: 'get',
                url: '/admin/destination/edit/' + id,
                success: function(data) {
                    $('[data-value="name"]').val(data.name);
                    $('[data-value="rating"]').val(data.rating);
                    $('[data-value="location"]').val(data.location);
                    $('[data-value="oldImage"]').val(data.image);
                    $('[data-value="image"]').attr("src", "/storage/" + data.image);
                    $('[data-value="history_1"]').val(data.history_1);
                    $('[data-value="history_2"]').val(data.history_2);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#DeleteModal"]', function() {
            let id = $(this).data('id');
            $('#delete-modal').attr('action', '/admin/destination/delete/' + id);
        });

        const tagImage = document.querySelector('.tag-image');
        const inputImage = document.querySelector('.input-file');
        const tagImageEdit = document.querySelector('.tag-image-edit');
        const inputImageEdit = document.querySelector('.input-file-edit');

        inputImage.addEventListener('change', function() {
            tagImage.src = URL.createObjectURL(inputImage.files[0]);
        });

        inputImageEdit.addEventListener('change', function() {
            tagImageEdit.src = URL.createObjectURL(inputImageEdit.files[0]);
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
