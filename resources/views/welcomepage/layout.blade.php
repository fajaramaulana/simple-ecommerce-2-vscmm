


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fullstack Vascomm</title>
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    {{-- icons bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta author="fajaramaulana">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body style="width: 100vw; height: 100vh; overflow-x:hidden;">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item ms-5" >
                <a class="nav-link active" aria-current="page" href="#">
                    <img src="{{ asset('image/logo.png') }}" alt="">
                </a>
              </li>
            </ul>
            <form class="d-flex" role="search" action="{{ route('welcomepage.index') }}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Parfum Kesukaanmu" aria-label="Cari Parfum Kesukaanmu" aria-describedby="button-addon2" name="search" size="80" @if(request()->search) value="{{ request()->search }}" @endif>
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                  </div>
            </form>
            <div class="ms-auto me-4">
                {{-- <a href="{{ route('login') }}" class="px-3 py-2" style="font-size: 16px; padding-top: 3rem; padding-bottom: 3rem; border: 1px solid #41A0E4; color: #41A0E4; text-decoration: none;">MASUK</a> --}}
                <a href="#" class="px-3 py-2" style="font-size: 16px; padding-top: 3rem; padding-bottom: 3rem; border: 1px solid #41A0E4; color: #41A0E4; text-decoration: none;">MASUK</a>
                {{-- <a href="{{ route('register') }}"  class="px-3 py-2" style="font-size: 16px; padding-top: 3rem; padding-bottom: 3rem; border: 1px solid #41A0E4; background-color: #41A0E4; color: white; text-decoration: none;">DAFTAR</a> --}}
                <a href="#"  class="px-3 py-2" style="font-size: 16px; padding-top: 3rem; padding-bottom: 3rem; border: 1px solid #41A0E4; background-color: #41A0E4; color: white; text-decoration: none;">DAFTAR</a>
            </div>
          </div>
        </div>
      </nav>
  

      <div>
          @yield('content')
        </div>

<hr style="margin-top: 6rem">
        {{-- footer --}}
        <div class="row" style="padding-left: 5vw; padding-right: 5vw; padding-top: 5vwh; padding-bottom: 5vh;margin-top: 6rem;">
            <div class="col-4 text-center">
                <div>
                    <img src="{{ asset('image/logo.png') }}" alt="">
                </div>
                <div class="mt-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Ut commodo in vestibulum, sed dapibus <br> tristique nullam.
                </div>
                <div class="mt-3">
                    <a href="#">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="ms-3">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="ms-3">
                        <i class="bi bi-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="col-2">
                <h4>Layanan</h4>
                <div class="mt-3">
                    <a href="#" class="text-decoration-none text-dark">BANTUAN</a>
                </div>
                <div class="mt-3">

                    <a href="#" class="text-decoration-none text-dark">TANYA JAWAB</a>
                </div>
                <div class="mt-3">

                    <a href="#" class="text-decoration-none text-dark">HUBUNGI KAMI</a>
                </div>
                <div class="mt-3">
                    <a href="#" class="text-decoration-none text-dark">CARA BERJUALAN</a>
                </div>
            </div>
            <div class="col-2">
                <h4>Tentang Kami</h4>
                <div class="mt-3">
                    <a href="#" class="text-decoration-none text-dark">ABOUT US</a>
                </div>
                <div class="mt-3">

                    <a href="#" class="text-decoration-none text-dark">KARIR</a>
                </div>
                <div class="mt-3">

                    <a href="#" class="text-decoration-none text-dark">BLOG</a>
                </div>
                <div class="mt-3">
                    <a href="#" class="text-decoration-none text-dark">KEBIJAKAN PRIVASI</a>
                </div>
                <div class="mt-3">
                    <a href="#" class="text-decoration-none text-dark">SYARAT DAN KETENTUAN</a>
                </div>
            </div>
            <div class="col-2">
                <h4>Mitra</h4>
                <div class="mt-3">
                    <a href="#" class="text-decoration-none text-dark">SUPPLIER</a>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>