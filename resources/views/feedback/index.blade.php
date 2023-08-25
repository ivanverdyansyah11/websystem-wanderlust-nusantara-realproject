@extends('templates.main')

@section('main')
    <div class="header-section d-flex flex-row justify-content-between padding-section px-5">
        <p class="text-black fw-semibold fs-2">@lang('messages.dashboard_feedback_title')</p>
        <div class="d-flex justify-content-end gap-2">
            <div class="d-xl-none hamburger-wrapper d-flex text-white align-self-center">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="dropdown d-xl-flex d-none">
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
            <div class="col-12 mt-2">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>@lang('messages.contact_form1_caption')</td>
                            <td>@lang('messages.contact_form2_caption')</td>
                            <td>@lang('messages.contact_form3_caption')</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($feedbacks->count() == 0)
                            <tr>
                                <td colspan="5" class="text-center py-3">@lang('messages.table_feedback_notfound')!</td>
                            </tr>
                        @else
                            @foreach ($feedbacks as $i => $feedback)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $feedback->username }}</td>
                                    <td>{{ $feedback->position }}</td>
                                    <td style="width: 300px">
                                        <p
                                            style="-webkit-line-clamp:2; overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; color: #212529;">
                                            {{ $feedback->message }}
                                        </p>
                                    </td>
                                    <td class=" flex-row gap-1 d-lg-flex d-none">
                                        <button class="btn btn-edit d-lg-flex d-none p-0" data-bs-toggle="modal"
                                            data-bs-target="#EditModal" data-id="{{ $feedback->id }}">
                                            <img src="{{ asset('assets/img/btn/edit-icon.svg') }}">
                                        </button>
                                        <button class="btn btn-edit p-0 d-lg-flex d-none" data-bs-toggle="modal"
                                            data-bs-target="#DeleteModal" data-id="{{ $feedback->id }}">
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

    <form id="edit-modal" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="text-center fs-3 title-font fw-medium fw-medium">@lang('messages.modal_edit_feedback')</div>
                        <div class="d-flex flex-column gap-3">
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <label for="username" class="text-black fw-medium fs-14">@lang('messages.contact_form1_caption')</label>
                                    <input type="text" id="username" name="username"
                                        class="w-100 input-text border-0 @error('username') is-invalid @enderror"
                                        data-value="username">
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <label for="position" class="text-black fw-medium fs-14">@lang('messages.contact_form2_caption')</label>
                                    <input type="text" id="position" name="position"
                                        class="w-100 input-text border-0 @error('position') is-invalid @enderror"
                                        data-value="position">
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="input-text-wrapper w-100 mb-3">
                                    <label for="message" class="text-black fw-medium fs-14">@lang('messages.contact_form3_caption')</label>
                                    <textarea type="text" id="message" name="message"
                                        class="w-100 input-text border-0 @error('message') is-invalid @enderror" data-value="message" rows="3"></textarea>
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
                        <div class="text-center fs-3 fw-medium title-font">@lang('messages.modal_delete_feedback')</div>
                        <div class="pt-3 text-center">@lang('messages.modal_delete_feedback_description')</div>
                        <div class="d-flex flex-row justify-content-center gap-2 pt-4">
                            <button type="button" class="btn btn-dark"
                                data-bs-dismiss="modal">@lang('messages.modal_close_delete')</button>
                            <button type="submit" class="btn btn-color">@lang('messages.modal_delete_feedback')</button>
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
            $('#edit-modal').attr('action', '/admin/feedback/edit/' + id);
            $.ajax({
                type: 'get',
                url: '/admin/feedback/edit/' + id,
                success: function(data) {
                    $('[data-value="username"]').val(data.username);
                    $('[data-value="position"]').val(data.position);
                    $('[data-value="message"]').val(data.message);
                }
            });
        });

        $(document).on('click', '[data-bs-target="#DeleteModal"]', function() {
            let id = $(this).data('id');
            $('#delete-modal').attr('action', '/admin/feedback/delete/' + id);
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
