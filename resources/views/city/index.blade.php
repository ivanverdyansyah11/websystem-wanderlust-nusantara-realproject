@extends('templates.main')

@section('main')
    @if (session()->has('success'))
        <div class="alert alert-success mx-5 mb-4" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session()->has('failed'))
        <div class="alert alert-danger mx-5 mb-4" role="alert">
            {{ session('failed') }}
        </div>
    @endif

    <div class="header-section d-flex flex-row justify-content-between padding-section px-5">

        <p class="text-black fw-medium fs-2">{{ $page }} Page</p>
        <button class="btn btn-color d-lg-flex d-none" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New
            City</button>
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
                            <td>Image</td>
                            <td>Total Destination</td>
                            <td>History Paragraph 1</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($cities->count() == 0)
                            <tr>
                                <td colspan="7" class="text-center py-3">Data Menu Not Found!</td>
                            </tr>
                        @else
                            @foreach ($cities as $i => $city)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $city->image) }}" alt="{{ $city->name }} image"
                                            width="150">
                                    </td>
                                    <td>{{ $city->price }}</td>
                                    <td style="width: 300px">{{ $text_history_1[$i] }}</td>
                                    <td class=" flex-row gap-1 d-lg-flex d-none">
                                        <button class="btn btn-edit d-lg-flex d-none p-0" data-bs-toggle="modal"
                                            data-bs-target="#EditModal" data-id="{{ $city->id }}">
                                            <img src="{{ asset('assets/img/btn/edit-icon.svg') }}">
                                        </button>
                                        <button class="btn btn-edit p-0 d-lg-flex d-none" data-bs-toggle="modal"
                                            data-bs-target="#DeleteModal" data-id="{{ $city->id }}">
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

    {{-- <form action="{{ route('store-menu') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="text-center fs-3 title-font fw-medium">Add New Menu</div>
                        <div class="d-flex flex-column gap-3">
                            <div class="pt-2 w-100">
                                <input type="hidden" name="id" value="{{ $id + 1 }}">
                                <div class="input-text-wrapper w-100 mt-2">
                                    <p class="text-black fw-medium fs-14">Name</p>
                                    <input type="text" name="name"
                                        class="w-100 input-text border-0 @error('name') is-invalid @enderror"
                                        placeholder="Enter menu name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mt-2">
                                    <p class="text-black fw-medium fs-14">Price</p>
                                    <input type="text" name="price"
                                        class="w-100 input-text border-0 @error('price') is-invalid @enderror"
                                        placeholder="Enter menu price" value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mt-2">
                                    <p class="text-black fw-medium fs-14">Image</p>
                                    <div class="d-flex flex-row align-items-end gap-2">
                                        <img src="{{ asset('assets/img/table/img-modal.svg') }}" alt="your image"
                                            class="tag-image img-preview" />
                                        <input type='file' class="input-file @error('image') is-invalid @enderror"
                                            size="150" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mt-2">
                                    <p class="text-black fw-medium fs-14">Description</p>
                                    <textarea type="text" name="description" class="w-100 input-text border-0 @error('description') is-invalid @enderror"
                                        placeholder="Enter menu description" value="{{ old('description') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-center gap-2 pt-4">
                            <button type="button" class="btn btn-dark fs-15" data-bs-dismiss="modal">Cancel Add</button>
                            <button type="submit" class="btn btn-color fs-15">Add New Menu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="edit-modal" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="text-center fs-3 title-font fw-medium fw-medium">Edit Menu</div>
                        <div class="d-flex flex-column gap-3">
                            <div class="pt-2 w-100">
                                <div class="input-text-wrapper w-100 mt-2">
                                    <p class="text-black fs-14 fw-medium">Name</p>
                                    <input type="text" name="name" class="w-100 input-text border-0"
                                        data-value="name">
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mt-2">
                                    <p class="text-black fs-14 fw-medium">Price</p>
                                    <input type="text" name="price" class="w-100 input-text border-0"
                                        data-value="price">
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mt-2">
                                    <input type="hidden" name="oldImage" data-value="oldImage">

                                    <p class="text-black fs-14 fw-medium">Image</p>

                                    <div class="d-flex flex-row align-items-end gap-2">

                                        <img src="" class="tag-image-edit img-fluid" alt="Input Image"
                                            width="150" data-value="image">

                                        <input type='file' class="input-file-edit @error('image') is-invalid @enderror"
                                            size="150" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mt-2">
                                    <p class="text-black fs-14 fw-medium">Description</p>
                                    <textarea type="text" name="description" class="w-100 input-text border-0" data-value="description"></textarea>
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
                        <div class="text-center fs-3 fw-medium title-font">Delete Menu</div>
                        <div class="pt-3 text-center"> Do you really want to delete these menu? This process cannot be
                            undone.
                        </div>
                        <div class="d-flex flex-row justify-content-center gap-2 pt-4">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel Delete</button>
                            <button type="submit" class="btn btn-color">Delete Menu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form> --}}

    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="https://kit.fontawesome.com/9e88c62f38.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $(document).on('click', '[data-bs-target="#EditModal"]', function() {
            let id = $(this).data('id');
            $('#edit-modal').attr('action', '/admin/menu/edit/' + id);
            $.ajax({
                type: 'get',
                url: '/admin/menu/edit/' + id,
                success: function(data) {
                    $('[data-value="name"]').val(data.name);
                    $('[data-value="price"]').val(data.price);
                    $('[data-value="oldImage"]').val(data.image);
                    $('[data-value="image"]').attr("src", "/storage/" + data.image);
                    $('[data-value="description"]').val(data.description);

                    console.log($('[data-value="image"]').attr("src"));
                }
            });
        });

        $(document).on('click', '[data-bs-target="#DeleteModal"]', function() {
            let id = $(this).data('id');
            $('#delete-modal').attr('action', '/admin/menu/delete/' + id);
        });

        const btnHamburger = document.querySelector('.fa-bars');
        const sidebar = document.querySelector('.sidebar-wrapper');
        const body = document.querySelector('body');
        const tagImage = document.querySelector('.tag-image');
        const inputImage = document.querySelector('.input-file');
        const tagImageEdit = document.querySelector('.tag-image-edit');
        const inputImageEdit = document.querySelector('.input-file-edit');

        btnHamburger.addEventListener('click', function() {
            btnHamburger.classList.toggle('active');
            sidebar.classList.toggle('active');
        });

        inputImage.addEventListener('change', function() {
            tagImage.src = URL.createObjectURL(inputImage.files[0]);
        });

        inputImageEdit.addEventListener('change', function() {
            tagImageEdit.src = URL.createObjectURL(inputImageEdit.files[0]);
        });
    </script>
@endsection
