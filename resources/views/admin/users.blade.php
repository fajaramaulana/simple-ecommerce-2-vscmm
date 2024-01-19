@extends('admin.layout')

@section('content')
    <div class="w-100 m-5">
        <div class="d-flex">
            <div>
                <h2>Manajemen User</h2>
            </div>
            <div class="ms-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    style="border-radius: 0px; background-color: #41A0E4">
                    TAMBAH USER
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content"
                            style="width: 448px; height: 448px; border-radius: 0px; margin-left: calc(50% - 240px);">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 mx-auto modal-title-user" id="exampleModalLabel">Tambah User
                                </h1>
                                <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.users.create') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label"
                                            style="font-size: 12px; !important">Nama</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Masukan Nama" name="nama"
                                            style="border-radius: 0px; border-color: #676C73 !important" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label"
                                            style="font-size: 12px; !important">Nomor Telepon</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Masukkan Nomor Telepon" name="phone"
                                            style="border-radius: 0px; border-color: #676C73 !important" inputmode="numeric"
                                            pattern="[0-9]*"required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label"
                                            style="font-size: 12px; !important">Email</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Masukkan Email" name="email"
                                            style="border-radius: 0px; border-color: #676C73 !important" required>
                                    </div>

                                    <div>
                                        <div>
                                            <button type="submit" class="w-100 bg-primary text-white border-0"
                                                style="background-color: #41A0E4 !important">
                                                SIMPAN
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="table-row-user">No</th>
                        <th scope="col" class="table-row-user">Nama Lengkap</th>
                        <th scope="col" class="table-row-user">Email</th>
                        <th scope="col" class="table-row-user">No. Telepon</th>
                        <th scope="col" class="table-row-user">Status</th>
                        <th scope="col" class="table-row-user"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                @if ($user->status == 1)
                                    <span class="badge bg-success" style="background-color: #479F77 !important">Aktif</span>
                                @else
                                    <span class="badge bg-danger" style="background-color: #D83A56 !important">Tidak
                                        Aktif</span>
                                @endif
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <div class="d-flex justify-content-between">
                                    <button type="button"
                                        class="btn badge bg-success d-flex align-items-center justify-content-center"
                                        style="background-color: #479F77 !important; border-radius: 50%; height:20px; width: 20px;"
                                        data-bs-toggle="modal" data-bs-target="{{ '#lihat' . $user->id }}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button type="button"
                                        class="btn badge bg-success d-flex align-items-center justify-content-center"
                                        style="background-color: #EC9024 !important; border-radius: 50%; height:20px; width: 20px;"
                                        data-bs-toggle="modal" data-bs-target="{{ '#edit' . $user->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </div>

                                <!-- Modal Preview -->
                                <div class="modal fade" id="{{ 'lihat' . $user->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content"
                                            style="width: 448px; height: 360px; border-radius: 0px; margin-left: calc(54% - 240px);">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 mx-auto modal-title-user"
                                                    id="exampleModalLabel">Detail User
                                                </h1>
                                                <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label"
                                                        style="font-size: 12px; !important">Nama</label>
                                                    <input type="text" class="form-control"
                                                        style="border-radius: 0px; border-color: #676C73 !important"
                                                        id="exampleFormControlInput1" placeholder="Masukan Nama"
                                                        name="nama" value="{{ $user->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label"
                                                        style="font-size: 12px; !important">Nomor
                                                        Telepon</label>
                                                    <input type="text" class="form-control"
                                                        style="border-radius: 0px; border-color: #676C73 !important"
                                                        id="exampleFormControlInput1" placeholder="Masukkan Nomor Telepon"
                                                        name="phone" value="{{ $user->phone }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label"
                                                        style="font-size: 12px; !important">Email</label>
                                                    <input type="email" class="form-control"
                                                        style="border-radius: 0px; border-color: #676C73 !important"
                                                        id="exampleFormControlInput1" placeholder="Masukkan Email"
                                                        name="email" value="{{ $user->email }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Edit -->

                                <div class="modal fade" id="{{ 'edit' . $user->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content"
                                            style="width: 448px; height: 448px; border-radius: 0px; margin-left: calc(54% - 240px);">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 mx-auto modal-title-user"
                                                    id="exampleModalLabel">Ubah Data User
                                                </h1>
                                                <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.users.update', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label"
                                                            style="font-size: 12px; !important">Nama</label>
                                                        <input type="text" class="form-control"
                                                            style="border-radius: 0px; border-color: #676C73 !important"
                                                            id="exampleFormControlInput1" placeholder="Masukan Nama"
                                                            name="nama" value="{{ $user->name }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label"
                                                            style="font-size: 12px; !important">Nomor
                                                            Telepon</label>
                                                        <input type="text" class="form-control"
                                                            style="border-radius: 0px; border-color: #676C73 !important"
                                                            id="exampleFormControlInput1"
                                                            placeholder="Masukkan Nomor Telepon" name="phone"
                                                            value="{{ $user->phone }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label"
                                                            style="font-size: 12px; !important">Email</label>
                                                        <input type="email" class="form-control"
                                                            style="border-radius: 0px; border-color: #676C73 !important"
                                                            id="exampleFormControlInput1" placeholder="Masukkan Email"
                                                            name="email" value="{{ $user->email }}">
                                                    </div>

                                                    <div>
                                                        <button type="submit"
                                                            class="w-100 bg-primary text-white border-0"
                                                            style="background-color: #41A0E4 !important">
                                                            SIMPAN
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .table-row-user {
            color: #3E3E3E !important;
            font-weight: 400 !important;
            size: 12px !important;
            font-family: 'Poppins', sans-serif !important;
        }

        ::placeholder {
            font-size: 14px;
            color: #9B9B9B !important;
        }

        ::value {
            font-size: 14px;
            color: #3E3E3E !important;
        }

        .modal-title-user: {
            font-family: 'Poppins', sans-serif !important;
            font-size: 18px !important;
            color: #3E3E3E !important;
        }
    </style>
@endsection
