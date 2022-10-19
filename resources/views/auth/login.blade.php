<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{asset('assets/plugins/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/mystyle.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Document</title>
</head>
<body style="background-color:#1f2029;">
    <div class="row justify-content-center">
        <div class="col-6 mt-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="alert alert-success" role="alert">
                            Selamat akun email anda berhasil di verifikasi !!
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="card-title">Terimakasih telah menggunakan aplikasi Chattt.</h5>
                        <p class="card-text">Gunakan aplikasi Chattt untuk mengirim pesan ke kerabat dengan cepat dan efisien...</p>
                    </div>
                    <div class="row justify-content-center">
                        <img src="{{asset('assets/img/success.png')}}" class="card-img-top" alt="..." style="width:60%;height:400px;">
                    </div>
                    <div class="row">
                        <div class="col-7"></div>
                        <div class="col-5">
                            <a href="{{route('users.index')}}" class="btn btn-primary float-end">Login yukk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
</body>
</html>