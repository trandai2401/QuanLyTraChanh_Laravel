<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('./bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('./bootstrap/css/bootstrap-grid.min.css') }}" />
    <!-- font icon -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('gioithieu.css') }}" />
    <title>Đăng nhập</title>
</head>

<body>

    <div class="container">
        <div class="logo d-flex justify-content-center my-2">
            <img src="./image/Logo.png" alt="Logo tại đây">
        </div>
    </div>

    <form class="container form_dangnhap justify-content-center" method="post" action="">
        @csrf
        <div class="form-group">
            @if (isset($erorr) != false)
               
                <div class="alert alert-danger" role="alert" style="font-size:15px">
                    {{ $erorr }}
                </div>
            @endif
       

            <label for="exampleInputPassword2">Tên đăng nhập</label>
            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Tên đăng nhập"
                name="username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                name="password">
        </div>

        <div class="button_submit d-flex justify-content-between">
            <a class="col-6" href="#" id="quenPass">Quên mật khẩu</a>
            <button class="col-6" id="btn_dangnhap">Đăng nhập</button>
        </div>
    </form>
    <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
</body>

</html>
