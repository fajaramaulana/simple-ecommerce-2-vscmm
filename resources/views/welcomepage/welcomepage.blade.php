
@extends('welcomepage.layout')

@section('content')

    <div class="container mt-5">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('image/banner.png') }}" alt="" width="100%">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('image/banner2.jpg') }}" alt="" width="100%">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('image/banner3.jpg') }}" alt="" width="100%">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('image/banner4.jpg') }}" alt="" width="100%">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        
    </div>

    <div class="container mt-5">
        <h3 style="font-family: 'Playfair Display', serif;">Terbaru</h3>
        <div class="row m-o p-0">
            @foreach ($newProducts as $product)
            <div class="col-3 h-100" style="height: 100%!important">
                <div class="card h-100">
                    <div class="card-body">
                        <div>
                            <img src="{{ $product->product_image }}" alt="" width="100%">
                        </div>
                        <div>
                            <b style="font-family: 'Playfair Display', serif; font-size: 20px;">{{ $product->product_name }}</b>
                        </div>
                        <div>
                            <span>IDR {{ $product->product_price }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container " style="margin-top: 4rem">
        <h3 style="font-family: 'Playfair Display', serif;">Produk Tersedia</h3>
        <div class="row m-o p-0">
            @foreach ($products as $product)
            <div class="col-3 h-100" style="height: 100%!important">
                <div class="card h-100">
                    <div class="card-body">
                        <div>
                            <img src="{{ $product->product_image }}" alt="" width="100%">
                        </div>
                        <div>
                            <b style="font-family: 'Playfair Display', serif; font-size: 20px;">{{ $product->product_name }}</b>
                        </div>
                        <div>
                            <span>IDR {{ $product->product_price }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-5 text-center">
            <a href="{{ route('welcomepage.index') }}" class="px-3 py-2" style="font-size: 20px; padding-top: 3rem; padding-bottom: 3rem; border: 1px solid #41A0E4; color: #41A0E4; text-decoration: none; font-family: 'Poppins', sans-serif">Lihat Lebih Banyak</a>
        </div>
    </div>



@endsection