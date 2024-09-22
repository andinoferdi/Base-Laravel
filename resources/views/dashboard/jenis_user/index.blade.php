@extends('dashboard.layouts.main', ['title' => 'Jenis User -'])
@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div class="container-fluid d-flex flex-stack">
                <div class="page-title d-flex align-items-center text-dark fw-bolder fs-3 my-1">
                    <h1>Jenis User</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2>Daftar Jenis User</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('jenis_user.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah Jenis User
                        </a>
                        <div class="table-responsive mt-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jenis User</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis_users as $jenis_user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jenis_user->nama_jenis_user }}</td>
                                            <td>
                                                <a href="{{ route('jenis_user.edit', $jenis_user->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('jenis_user.destroy', $jenis_user->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
