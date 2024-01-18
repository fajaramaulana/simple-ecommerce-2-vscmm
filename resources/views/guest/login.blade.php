<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    {{-- FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body style="height: 100vh; width: 100vw: overflow-x: hidden; overflow-y:hidden;">
    <div class="d-flex h-100">
        <div style="width: 50%; background-color:#41A0E4" class="left-side">
            <div>
                <div style="font-size: 48px; font-weight: 600;">NAMA APLIKASI</div>
                <div style="font-size: 14px; font-weight: 400; margin-top: 1rem;">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book.
                </div>
            </div>
        </div>

        <div style="width: 50%" class="d-flex justify-content-center align-items-center">
            <form style="padding: 12vw;" action="{{ route('login') }}" method="POST">
                @csrf
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
                    <div style="font-size: 24px;">Selamat Datang</div>
                </div>
                <div style="margin-top: 0.5rem; font-size: 12px; color: #9B9B9B;">
                    Silahkan masukkan email atau nomor telepon dan password Anda untuk mulai menggunakan aplikasi
                </div>
                <div style="margin-top: 1rem;">
                    <div class="mb-2">
                        <div>
                            <label for="email" style="font-size: 12px; margin-bottom: 0.2rem; color: #757575">Email /
                                Nomor Telpon</label>
                        </div>
                        <div>
                            <input type="text" class="" id="email" placeholder="Contoh: admin@gmail.com"
                                style="padding-top: 0.3rem; padding-bottom: 0.3rem; padding-left: 0.7rem; padding-right: 0.7rem; width: 100%"
                                name="email" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div>
                            <label for="password"
                                style="font-size: 12px; margin-bottom: 0.2rem; color: #757575" >Password</label>
                        </div>
                        <div>
                            <input type="password" class="" id="password" placeholder="Masukkan password"
                                style="padding-top: 0.3rem; padding-bottom: 0.3rem; padding-left: 0.7rem; padding-right: 0.7rem; width: 100%"
                                name="password" required>
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            style="width: 100%; background-color: #41A0E4; border: 0; color:white; padding: 0.5rem; font-size: 14px;">MASUK</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .left-side {
            background-image: url({{ url('image/login-admin.png') }});
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10rem;
            text-align: center;
        }

        input::placeholder {
            font-size: 14px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
