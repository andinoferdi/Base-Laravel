@extends('dashboard.layouts.main', ['title' => 'User | Edit -'])
@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Edit User</small>
                    </h1>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="margin-top: 40px;">
                        <h2>Edit User</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="name">Nama User:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $user->name }}" autocomplete="off">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        autocomplete="off">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="no_hp">No HP:</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        value="{{ $user->no_hp }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="pin">PIN:</label>
                                    <input type="text" class="form-control" id="pin" name="pin"
                                        value="{{ $user->pin }}" autocomplete="off">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="wa">Whatsapp:</label>
                                    <input type="text" class="form-control" id="wa" name="wa"
                                        value="{{ $user->wa }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="foto">Foto:</label>
                                    <div class="col-lg-8">
                                        <div class="image-input image-input-outline" data-kt-image-input="true">
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url({{ $user->foto_url ? $user->foto_url : asset('assets/media/avatars/blank.png') }})">
                                            </div>
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                            </label>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Cancel avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="jenis_user_id">Role:</label>
                                    <select class="form-control" id="jenis_user_id" name="jenis_user_id">
                                        <option value="2" {{ $user->jenis_user_id == 2 ? 'selected' : '' }}>User
                                        </option>
                                        <option value="1" {{ $user->jenis_user_id == 1 ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="3" {{ $user->jenis_user_id == 3 ? 'selected' : '' }}>Mahasiswa
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">
                                <i class="fa fa-save"></i> Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
