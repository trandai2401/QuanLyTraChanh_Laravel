<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Open Sans', sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        tbody tr {

            font-weight: 500;

        }

        td,
        th {
            /* border: 1px solid #dddddd; */
            border: 1px solid #000000;
            text-align: left;
            padding: 12px;
            padding-left: 6px;


        }

        .topping td {
            padding-top: 0px;
        }

    </style>
</head>

<body>
    <div class="container" style=" width:700px;  ">
        <div style="width: 100%;display: inline-block;" class="logo d-flex justify-content-center my-2">
            <img style="margin-left: 130px;display: inline-block;width: 350px;" src="./image/Logo.png"
                alt="Logo tại đây">
        </div>
        <h2 style="text-align:center">107 Ngô Gia Tự, Hải Châu , Đà Nẵng</h2>
        <h1 style="text-align:center;font-weight: 800;margin-bottom: 40px;font-size: 45px">PHIẾU THANH TOÁN : 158</h1>
    
        <div>
            <div style="text-align:left;display: inline-block;width: 34%;">
            <h1 style="display: inline;font-size: 40px">Bàn 1</h1></div>
            <div style="text-align:right;display: inline-block;width: 65%;">
                <h2 style="text_align: right;">Thời gian vào : 11:25:47 20/2/2022</h2>
                <h2 style="text_align: right;">Thời gian ra : 11:25:47 20/2/2022</h2>
            </div>
        </div>


        <table style="width: 100%; font-size:32px" class="table">
            <thead style="font-weight: 700">
                <tr>

                    <th scope="col">Tên Món</th>
                    <th scope="col">SL</th>
                    <th scope="col">ĐG</th>
                    <th scope="col">T Tiền</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Trà Sửa Khang Khang - Nguyệt Nguyệt</td>
                    <td>1</td>
                    <td>25.000</td>
                    <td>30.000</td>
                </tr>
                <tr class="topping" style="font-size: 28px">
                    <td style="text-align: right">Topping tình yêu</td>
                    <td>1</td>
                    <td>5.000</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Trà Sửa A Phủ</td>
                    <td>1</td>
                    <td>25.000</td>
                    <td>25.000</td>
                </tr>
                <tr>
                    <td>Xúc xích</td>
                    <td>1</td>
                    <td>400.000</td>
                    <td>400.000</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top:50px">
            <div style="display: inline;">
                <h1 style="font-size:45px;display: inline;">Tổng tiền :</h1>
            </div>
            <div style="display: inline-block;text-align: right;width: 60%;">
                <h1 style="font-size:45px;display: inline;text-align: right">455.000</h1>
            </div>
        </div>

        <h2 style="text-align: center;font-size:35px;margin-top:40px;font-family: 'Pacifico', cursive;">Chúc quý khách vui vẻ, mai đến tiếp <3
        </h2>
    </div>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
</body>

</html>
