@extends('admin.layout')

@section('content')
    <div class="w-100" style="margin-top: 1.5rem; margin-left: 2rem;">
        <div class="">
            <div style="font-size: 18px; font-family: 'Poppins', sans-serif; font-weight: 400;">Dashboard</div>
        </div>

        <div class="row p-0 mx-0" style="margin-top: 2rem!important;">
            <div class="col-3 h-100 ">
                <div class="card bluecard">
                    <div class="card-body p-4">
                        <h5 class="card-title">Jumlah User</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary" style="color: #002060">
                            <span class="counting">
                                {{ $usersCount }}
                            </span>
                            <span class="labelling">
                                User
                            </span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-3 h-100 ">
                <div class="card bluecard">
                    <div class="card-body p-4">
                        <h5 class="card-title">Jumlah User Aktif</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">
                            <span class="counting">
                                {{ $usersActiveCount }}
                            </span>
                            <span class="labelling">
                                User
                            </span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-3 h-100 ">
                <div class="card bluecard">
                    <div class="card-body p-4">
                        <h5 class="card-title">Jumlah Produk</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">
                            <span class="counting">
                                {{ $productsCount }}
                            </span>
                            <span class="labelling">
                                Produk
                            </span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-3 h-100 ">
                <div class="card bluecard">
                    <div class="card-body p-4">
                        <h5 class="card-title">Jumlah Produk Aktif</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">
                            <span class="counting">
                                {{ $productsActiveCount }}
                            </span>
                            <span class="labelling">
                                Produk
                            </span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mx-0 p-0" style="margin-top: 20px;">
            <div class="col-9">
                <div class="card border-0" style="padding: 1.5rem; border-radius: 2rem;">
                    <div class="card-body p-0 mb-3">
                        <div style="font-family: 'Rubik', sans-serif; font-weight: 500;">Produk Terbaru</div>
                    </div>
                    <div>
                        <table class="table">
                            <thead style="background-color: #41A0E4!important; border-radius: 6px!important;">
                                <tr style="background-color: #41A0E4!important; border-radius: 6px!important;">
                                    <th scope="col"
                                        style="background-color: #41A0E4!important; border-radius: 6px 0px 0px 6px !important; color: white;font-weight: 400;font-family: 'Rubik', sans-serif">
                                        Produk</th>
                                    <th scope="col"
                                        style="background-color: #41A0E4!important; color: white;font-weight: 400;font-family: 'Rubik', sans-serif">
                                        Tanggal Dibuat</th>
                                    <th scope="col"
                                        style="background-color: #41A0E4!important; border-radius: 0px 6px 6px 0px !important; color:white;font-weight: 400;font-family: 'Rubik', sans-serif">
                                        Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td
                                            style="font-weight: 400;font-family: 'Rubik', sans-serif; color: #454C75; font-size: 14px;">
                                            <span>
                                                <img src="{{ $product->product_image }}" alt="" width="40px"
                                                    height="40px">
                                            </span>
                                            <span class="ms-2">
                                                {{ $product->product_name }}
                                            </span>
                                        </td>
                                        <td
                                            style="font-weight: 400;font-family: 'Rubik', sans-serif; color: #A3A6AC; font-size: 14px;">
                                            {{ date('d M Y', strtotime($product->created_at)) }}</td>
                                        <td
                                            style="font-weight: 400;font-family: 'Rubik', sans-serif; color: #1A1111; font-size: 14px;">
                                            {{ changeFormatRupiah($product->product_price) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bluecard {
            width: 100%;
            background-image: linear-gradient(to bottom right, #ADC9FF, #C2D6FF);
            border: 0;
            border-radius: 20px;
            padding-left: 0.5rem;
        }

        .bluecard h5 {
            color: #597393;
            font-size: 14px;
        }

        .counting {
            font-size: 32px;
            color: #002060;
        }

        .labelling {
            font-size: 20px;
            color: #002060;
        }
    </style>
@endsection
