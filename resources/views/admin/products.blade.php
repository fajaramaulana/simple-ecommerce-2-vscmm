@extends('admin.layout')

@section('content')
    <div class="w-100 m-5">
        <div class="d-flex">
            <div>
                <h2>Manajemen Produk</h2>
            </div>
            <div class="ms-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    style="border-radius: 0px; background-color: #41A0E4">
                    TAMBAH PRODUK
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content"
                            style="width: 448px; height: 448px; border-radius: 0px; margin-left: calc(50% - 240px);">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 mx-auto modal-title-produk" id="exampleModalLabel">Tambah Produk
                                </h1>
                                <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.product.create') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label"
                                            style="font-size: 12px; !important">Nama Produk</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Masukan Nama Produk" name="product_name"
                                            style="border-radius: 0px; border-color: #676C73 !important" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label"
                                            style="font-size: 12px; !important">Harga Produk</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Masukkan Harga Produk" name="product_price"
                                            style="border-radius: 0px; border-color: #676C73 !important" inputmode="numeric"
                                            pattern="[0-9]*" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label"
                                            style="font-size: 12px; !important">Gambar Produk</label>
                                        <input type="file" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Masukkan Gambar Produk" name="product_image"
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
                        <th scope="col" class="table-row-produk">No</th>
                        <th scope="col" class="table-row-produk">Nama Produk</th>
                        <th scope="col" class="table-row-produk">Harga</th>
                        <th scope="col" class="table-row-produk">Gambar</th>
                        <th scope="col" class="table-row-produk">Status</th>
                        <th scope="col" class="table-row-produk"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>

                                @if (filter_var($product->product_image, FILTER_VALIDATE_URL))
                                    <img src="{{ $product->product_image }}" alt=""
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/' . $product->product_image) }}" alt=""
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                @endif
                            </td>

                            <td>
                                @if ($product->status == 1)
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
                                        data-bs-toggle="modal" data-bs-target="{{ '#lihat' . $product->id }}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button type="button"
                                        class="btn badge bg-success d-flex align-items-center justify-content-center"
                                        style="background-color: #EC9024 !important; border-radius: 50%; height:20px; width: 20px;"
                                        data-bs-toggle="modal" data-bs-target="{{ '#edit' . $product->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </div>

                                <!-- Modal Preview -->
                                <div class="modal fade" id="{{ 'lihat' . $product->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content"
                                            style="width: 448px; height: 440px; border-radius: 0px; margin-left: calc(54% - 240px);">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 mx-auto modal-title-produk"
                                                    id="exampleModalLabel">
                                                    Detail Produk
                                                </h1>
                                                <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label"
                                                        style="font-size: 12px; !important">Nama Produk</label>
                                                    <input type="text" class="form-control"
                                                        style="border-radius: 0px; border-color: #676C73 !important"
                                                        id="exampleFormControlInput1" placeholder="Masukan Nama"
                                                        name="product_name" value="{{ $product->product_name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label"
                                                        style="font-size: 12px; !important">Harga</label>
                                                    <input type="text" class="form-control"
                                                        style="border-radius: 0px; border-color: #676C73 !important"
                                                        id="exampleFormControlInput1" placeholder="Masukkan Nomor Telepon"
                                                        name="product_price" value="{{ $product->price }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label"
                                                        style="font-size: 12px; !important">Gambar</label><br>
                                                    @if (filter_var($product->product_image, FILTER_VALIDATE_URL))
                                                        <img src="{{ $product->product_image }}" alt=""
                                                            style="width: 100px; height: 100px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('images/' . $product->product_image) }}"
                                                            alt=""
                                                            style="width: 100px; height: 100px; object-fit: cover;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Edit -->

                                <div class="modal fade" id="{{ 'edit' . $product->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content"
                                            style="width: 448px; height: 448px; border-radius: 0px; margin-left: calc(54% - 240px);">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 mx-auto modal-title-produk"
                                                    id="exampleModalLabel">Ubah
                                                    Data Produk
                                                </h1>
                                                <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.product.update', $product->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label"
                                                            style="font-size: 12px; !important">Nama Produk</label>
                                                        <input type="text" class="form-control"
                                                            style="border-radius: 0px; border-color: #676C73 !important"
                                                            id="exampleFormControlInput1" placeholder="Masukan Nama"
                                                            name="product_name" value="{{ $product->product_name }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label"
                                                            style="font-size: 12px; !important">Harga</label>
                                                        <input type="text" class="form-control"
                                                            style="border-radius: 0px; border-color: #676C73 !important"
                                                            id="exampleFormControlInput1"
                                                            placeholder="Masukkan Nomor Telepon" name="product_price"
                                                            value="{{ $product->product_price }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="previewGambar" class="form-label"
                                                            style="font-size: 12px; !important">Preview</label>
                                                        @if (filter_var($product->product_image, FILTER_VALIDATE_URL))
                                                            <img src="{{ $product->product_image }}" alt=""
                                                                style="width: 100px; height: 100px; object-fit: cover;">
                                                        @else
                                                            <img src="{{ asset('images/' . $product->product_image) }}"
                                                                alt=""
                                                                style="width: 100px; height: 100px; object-fit: cover;">
                                                        @endif
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label"
                                                            style="font-size: 12px; !important">Gambar Produk</label>
                                                        <input type="file" class="form-control" id="exampleFormControlInput1"
                                                            placeholder="Masukkan Gambar Produk" name="product_image"
                                                            style="border-radius: 0px; border-color: #676C73 !important">
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
        .table-row-produk {
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

        .modal-title-produk: {
            font-family: 'Poppins', sans-serif !important;
            font-size: 18px !important;
            color: #3E3E3E !important;
        }
    </style>
@endsection
