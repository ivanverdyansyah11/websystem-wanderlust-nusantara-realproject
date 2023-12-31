@extends('templates.main')

@section('main')
    <div class="header-section d-flex flex-row justify-content-between padding-section px-5">
        <p class="text-black fw-semibold fs-2">@lang('messages.dashboard_destination_title')</p>
        <div class="d-lg-flex justify-content-end gap-2">
            <button class="btn btn-color d-lg-flex d-none" data-bs-toggle="modal"
                data-bs-target="#AddModal">@lang('messages.dashboard_destination_button')</button>
            <div class="d-xl-none hamburger-wrapper d-flex text-white align-self-center">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="dropdown d-none d-xl-inline-block">
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
                            <td>No</td>
                            <td>@lang('messages.table_name')</td>
                            <td>@lang('messages.table_location')</td>
                            <td>@lang('messages.table_rating')</td>
                            <td>@lang('messages.table_total_images')</td>
                            <td>@lang('messages.table_history')</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($destinations->count() == 0)
                            <tr>
                                <td colspan="7" class="text-center py-3">@lang('messages.table_destination_notfound')!</td>
                            </tr>
                        @else
                            @foreach ($destinations as $i => $destinations)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="width: 250px">
                                        {{ $destinations->translation(session('locale'))->name ?? $destinations->name }}
                                    </td>
                                    <td>{{ $destinations->translation(session('locale'))->location ?? $destinations->location }}
                                    </td>
                                    <td>{{ $destinations->rating }}</td>
                                    @php
                                        $isEmpty = empty(array_filter($gallery_count[$i]));
                                    @endphp
                                    @if (!$isEmpty)
                                        <td>{{ count($gallery_count[$i]) }}</td>
                                    @else
                                        <td>0</td>
                                    @endif
                                    <td style="width: 300px">
                                        <p
                                            style="-webkit-line-clamp:2; overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; color: #212529;">
                                            {{ $destinations->translation(session('locale'))->history_1 ?? $destinations->history_1 }}
                                        </p>
                                    </td>
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
                        <div class="text-center fs-3 title-font fw-medium">@lang('messages.dashboard_destination_button')</div>
                        <div class="d-flex flex-column">
                            <input type="hidden" name="id" value="{{ $id + 1 }}">
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <p class="text-black fw-medium fs-14">@lang('messages.table_image')</p>
                                    <div class="d-flex flex-row align-items-end gap-2">
                                        <img src="{{ asset('assets/img/table/img-modal.svg') }}" alt="your image"
                                            class="tag-image img-preview" />
                                        <input type='file' class="input-file @error('image') is-invalid @enderror"
                                            size="150" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper d-flex gap-3 pt-2">
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="name" class="text-black fw-medium fs-14">@lang('messages.table_name')</label>
                                        <input type="text" id="name" name="name"
                                            class="w-100 input-text border-0 @error('name') is-invalid @enderror"
                                            placeholder="Enter city name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="name_translation" class="text-black fw-medium fs-14">@lang('messages.table_name')
                                            EN</label>
                                        <input type="text" id="name_translation" name="name_translation"
                                            class="w-100 input-text border-0 @error('name') is-invalid @enderror"
                                            placeholder="Enter city name EN" value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <label for="rating" class="text-black fw-medium fs-14">@lang('messages.table_rating')</label>
                                    <input type="text" id="rating" name="rating"
                                        class="w-100 input-text border-0 @error('rating') is-invalid @enderror"
                                        placeholder="Enter city rating" value="{{ old('rating') }}">
                                </div>
                            </div>
                            <div class="w-100 pt-2">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <label for="location" class="text-black fw-medium fs-14">@lang('messages.table_location')</label>
                                    <input type="text" id="location" name="location"
                                        class="w-100 input-text border-0 @error('location') is-invalid @enderror"
                                        placeholder="Enter city location" value="{{ old('location') }}">
                                </div>
                            </div>
                            <div class="pt-2 w-100">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <label for="cities_id" class="text-black fw-medium fs-14">@lang('messages.table_city')</label>
                                    <select class="w-100 input-text border-0" name="cities_id" id="cities_id">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="wrapper d-flex gap-3 pt-2">
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="history_1"
                                            class="text-black fw-medium fs-14">@lang('messages.table_history_paragraph1')</label>
                                        <textarea type="text" id="history_1" name="history_1"
                                            class="w-100 input-text border-0 @error('history_1') is-invalid @enderror"
                                            placeholder="Enter city history paragraph 1" value="{{ old('history_1') }}" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="history_1_translation"
                                            class="text-black fw-medium fs-14">@lang('messages.table_history_paragraph1') EN</label>
                                        <textarea type="text" id="history_1_translation" name="history_1_translation"
                                            class="w-100 input-text border-0 @error('history_1_translation') is-invalid @enderror"
                                            placeholder="Enter city history paragraph 1" value="{{ old('history_1_translation') }}" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper d-flex gap-3 pt-2">
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="history_2"
                                            class="text-black fw-medium fs-14">@lang('messages.table_history_paragraph2')</label>
                                        <textarea type="text" id="history_2" name="history_2"
                                            class="w-100 input-text border-0 @error('history_2') is-invalid @enderror"
                                            placeholder="Enter city history paragraph 1" value="{{ old('history_2') }}" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="history_2_translation"
                                            class="text-black fw-medium fs-14">@lang('messages.table_history_paragraph2') EN</label>
                                        <textarea type="text" id="history_2_translation" name="history_2_translation"
                                            class="w-100 input-text border-0 @error('history_2_translation') is-invalid @enderror"
                                            placeholder="Enter city history paragraph 1" value="{{ old('history_2_translation') }}" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-center gap-2 pt-4">
                            <button type="button" class="btn btn-dark fs-15"
                                data-bs-dismiss="modal">@lang('messages.modal_close_add')</button>
                            <button type="submit" class="btn btn-color fs-15">@lang('messages.dashboard_destination_button')</button>
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
                        <div class="text-center fs-3 title-font fw-medium fw-medium">@lang('messages.modal_edit_destination')</div>
                        <div class="d-flex flex-column gap-3">
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <input type="hidden" name="oldImage" data-value="oldImage">
                                    <p class="text-black fw-medium fs-14">@lang('messages.table_image')</p>
                                    <div class="d-flex flex-row align-items-end gap-2">
                                        <img src="" alt="your image" class="tag-image-edit img-preview"
                                            data-value="image" />
                                        <input type='file' class="input-file-edit @error('image') is-invalid @enderror"
                                            size="150" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper d-flex gap-3 pt-2">
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="name"
                                            class="text-black fw-medium fs-14">@lang('messages.table_name')</label>
                                        <input type="text" id="name" name="name"
                                            class="w-100 input-text border-0 @error('name') is-invalid @enderror"
                                            data-value="name">
                                    </div>
                                </div>
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="name_translation"
                                            class="text-black fw-medium fs-14">@lang('messages.table_name') EN</label>
                                        <input type="text" id="name_translation" name="name_translation"
                                            class="w-100 input-text border-0 @error('name') is-invalid @enderror"
                                            data-value="name_translation">
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 w-100">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <label for="rating" class="text-black fw-medium fs-14">@lang('messages.table_rating')</label>
                                    <input type="text" id="rating" name="rating"
                                        class="w-100 input-text border-0 @error('rating') is-invalid @enderror"
                                        data-value="rating">
                                </div>
                            </div>
                            <div class="pt-2 w-100">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <label for="location" class="text-black fw-medium fs-14">@lang('messages.table_location')</label>
                                    <input type="text" id="location" name="location"
                                        class="w-100 input-text border-0 @error('location') is-invalid @enderror"
                                        data-value="location">
                                </div>
                            </div>
                            <div class="wrapper d-flex gap-3 pt-2">
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="history_1"
                                            class="text-black fw-medium fs-14">@lang('messages.table_history_paragraph1')</label>
                                        <textarea type="text" id="history_1" name="history_1"
                                            class="w-100 input-text border-0 @error('history_1') is-invalid @enderror" data-value="history_1"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="history_1_translation"
                                            class="text-black fw-medium fs-14">@lang('messages.table_history_paragraph1') EN</label>
                                        <textarea type="text" id="history_1_translation" name="history_1_translation"
                                            class="w-100 input-text border-0 @error('history_1_translation') is-invalid @enderror"
                                            data-value="history_1_translation" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper d-flex gap-3 pt-2">
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="history_2"
                                            class="text-black fw-medium fs-14">@lang('messages.table_history_paragraph2')</label>
                                        <textarea type="text" id="history_2" name="history_2"
                                            class="w-100 input-text border-0 @error('history_2') is-invalid @enderror" data-value="history_2"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <div class="input-text-wrapper w-100 mb-3">
                                        <label for="history_2_translation"
                                            class="text-black fw-medium fs-14">@lang('messages.table_history_paragraph2') EN</label>
                                        <textarea type="text" id="history_2_translation" name="history_2_translation"
                                            class="w-100 input-text border-0 @error('history_2_translation') is-invalid @enderror"
                                            data-value="history_2_translation" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-center gap-2 pt-4">
                            <button type="button" class="btn btn-dark fs-15"
                                data-bs-dismiss="modal">@lang('messages.modal_close_edit')</button>
                            <button type="submit" class="btn btn-color fs-15">@lang('messages.modal_edit')</button>
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
                        <div class="text-center fs-3 fw-medium title-font">@lang('messages.modal_delete_destination')</div>
                        <div class="pt-3 text-center">@lang('messages.modal_delete_city_description')</div>
                        <div class="d-flex flex-row justify-content-center gap-2 pt-4">
                            <button type="button" class="btn btn-dark"
                                data-bs-dismiss="modal">@lang('messages.modal_close_delete')</button>
                            <button type="submit" class="btn btn-color">@lang('messages.modal_delete_destination')</button>
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
                    $('[data-value="name"]').val(data[0].name);
                    $('[data-value="rating"]').val(data[0].rating);
                    $('[data-value="location"]').val(data[0].location);
                    $('[data-value="oldImage"]').val(data[0].image);
                    $('[data-value="image"]').attr("src", "/storage/" + data[0].image);
                    $('[data-value="history_1"]').val(data[0].history_1);
                    $('[data-value="history_2"]').val(data[0].history_2);

                    $('[data-value="name_translation"]').val(data[1][1].name);
                    $('[data-value="history_1_translation"]').val(data[1][1].history_1);
                    $('[data-value="history_2_translation"]').val(data[1][1].history_2);
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
