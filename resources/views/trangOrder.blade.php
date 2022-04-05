<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ asset('public') }}">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap-grid.min.css" />
    <!-- font icon -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="trangOrder.css" />
    <title>trang order</title>
</head>

<body>
    <!-- header -->
    <div class="header d-flex justify-content-between">
        <div>
            <img class="logo_header" src="./image/Logo.png" alt="" />
        </div>

        <div class="">
            <button class="btn btn mx-3" style="background-color: #014905;">
                <a class="text-white" href="#">In hóa đơn</a>
            </button>
            <button class="btn btn mx-3" style="background-color: #ffee00;">
                <a class="text-success" href="#">Đăng xuất</a>
            </button>
            <!-- <a class="mr-5 mt-1"href="#">Đăng xuất</a> -->
        </div>


    </div>

    <!-- nội dung body -->
    <div class="noidung_body d-flex">
        <!-- danh sách các món -->
        <div class="danhmuc_mon">
            <!-- thể hiện cho 1 danh mục -->
            <div class="mon_danhmuc">
                <!-- Tên danh mục -->
                <p class="title_the_danhmuc mb-0"><b>Trà sữa</b></p>
                <!-- row chứa card -->
                <div class="mx-1 row monDM">
                    <!-- Một cái card chứa sản phẩm -->
                    <div class="col-2 card_mon my-2 px-1 border-0" id="sp01">
                        <div class="card">
                            <div class="img_mon d-flex justify-content-center">
                                <img src="./image/bubble-tea.png" alt="" />
                            </div>
                            <div class="title_tenMon text-center" id="ten_sp01">Trà sữa macha đậu đỏ</div>
                            <div class="container title_gia d-flex justify-content-center" id="gia_sp01">
                                25000k
                            </div>
                            <button onClick="orderSP();" class="ml-2 mt-1 py-0 btn btn_mua"
                                id="btn_mua_sp01">Mua</button>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>

        <!-- danh sách đang order -->
        <div class="danhsach_order">
            <div class="header_danhsachOrder d-flex justify-content-between">
                <p class="title_the_hoadon mb-2  mx-2 mt-1"><b>Bảng Order</b></p>
                <div class="tong_tien mx-2 mt-1">
                    Tổng HĐ:<span> <b>250.000 000đ</b></span>

                </div>
            </div>
            <table id="table_hoadon" class="border text-center mx-1">
                <!-- Tên cột: gồm có 5 cột -->
                <tr class="border">
                    <th class="border" style="width: 25%">Tên</th>
                    <th class="border" style="width: 15%">SLượng</th>
                    <th class="border" style="width: 15%">Giá</th>
                    <th class="border" style="width: 20%">Tổng</th>
                    <th class="border" style="width: 15%">Xóa</th>
                </tr>

                @foreach ($dataArr as $item)
                    <tr style="font-weight: 700" id="hang_sp" class="border">

                        <td style="border-top: 2px solid rgb(106, 106, 106);" class="cotDauTien">

                            <div class="tenMon_tenTopping_selectOption">
                                <div class="ten_mon">{{$item->ten}}</div>
                                {{-- <div class="d-flex justify-content-center selectTopping">
                          <div class="input-group">
                              <select onChange="themTopping(1)" id="select_sp1" class="custom-select">
                                  <option>Thêm</option>
                                  @foreach ($arrTopping as $topping)
                                      <option value="{{ $topping->id }}">{{ $topping->ten }}</option>
                                  @endforeach

                              </select>
                          </div>
                      </div> --}}
                            </div>
                        </td>

                        <td style="border-top: 2px solid rgb(106, 106, 106);">
                            <input style="width: 35px" type="number" class="" value="{{$item->soluong}}" />
                        </td>
                        <td style="border-top: 2px solid rgb(106, 106, 106);">{{ number_format($item->gia, 0, '', ',') }}</td>
                        <td style="border-top: 2px solid rgb(106, 106, 106);">{{ number_format($item->gia*$item->soluong, 0, '', ',') }}</td>
                        <td style="border-top: 2px solid rgb(106, 106, 106);">
                            <button class="btn bg-transparent">
                                <span class="iconify" data-icon="fa6-solid:delete-left"></span>
                            </button>
                        </td>
                    </tr>
                    @foreach ($item->topping as $topping)
                        <tr id="hang_sp" class="border">
                            <td class="cotDauTien">
                                <div class="tenMon_tenTopping_selectOption">
                                    <div class="ten_mon">{{ App\Models\Mon::find($topping->mon_id)->ten }}</div>
                                </div>
                            </td>
                            <td> <input style="width: 35px" type="number" class="" value="{{$topping->soluong}}"> </td>
                            <td>{{ number_format($topping->gia, 0, '', ',')}}</td>
                            <td></td>
                            <td> <button class="btn bg-transparent"> <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                        class="iconify iconify--fa6-solid" width="1.13em" height="1em"
                                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 576 512"
                                        data-icon="fa6-solid:delete-left">
                                        <path fill="currentColor"
                                            d="M576 384c0 35.3-28.7 64-64 64H205.3c-17 0-33.3-6.7-45.3-18.7L9.372 278.6C3.371 272.6 0 264.5 0 256c0-8.5 3.372-16.6 9.372-22.6L160 82.75C172 70.74 188.3 64 205.3 64H512c35.3 0 64 28.65 64 64v256zM271 208.1l47.1 47.9l-47.1 47c-9.3 9.4-9.3 24.6 0 33.1c9.4 10.2 24.6 10.2 33.1 0l47.9-46.2l47 46.2c9.4 10.2 24.6 10.2 33.1 0c10.2-8.5 10.2-23.7 0-33.1l-46.2-47l46.2-47.9c10.2-8.5 10.2-23.7 0-33.1c-8.5-9.3-23.7-9.3-33.1 0l-47 47.1l-47.9-47.1c-8.5-9.3-23.7-9.3-33.1 0c-9.3 9.4-9.3 24.6 0 33.1z">
                                        </path>
                                    </svg> </button> </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <div class="d-flex justify-content-center selectTopping">
                                <div class="input-group">
                                    <select onChange="themTopping(1)" id="select_sp1" class="custom-select">
                                        <option>Thêm topping</option>
                                        @foreach ($arrTopping as $topping)
                                            <option value="{{ $topping->id }}">{{ $topping->ten }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>

                        </td>
                    </tr>
                @endforeach
                <!-- Hàng thứ nhất -->
                <!-- <tr id="hang_sp" class="border">
            <td class="cotDauTien">
              <div class="tenMon_tenTopping_selectOption">
                <div class="ten_mon">Trà sữa trân châu đường đen</div>
                <div class="d-flex justify-content-center selectTopping">
                  <div class="input-group">
                    <select onChange="themTopping(1)" id="select_sp1" class="custom-select">
                      <option >Thêm</option>
                      <option value="1">Topping 1</option>
                      <option value="2">Topping 2</option>
                      <option value="3">Topping 3</option>
                    </select>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <input
                style="width: 35px"
                type="number"
                class=""
                placeholder="1"
              />
            </td>
            <td>25000</td>
            <td>250000</td>
            <td>
              <button class="btn bg-transparent">
                <span class="iconify" data-icon="fa6-solid:delete-left"></span>
              </button>
            </td>
          </tr> -->

            </table>

            <div class="d-flex justify-content-between">
                <div class="nhap_ban mx-2 mt-2">
                    <label for="basic-url"> <b>Nhập bàn</b></label>
                    <div class="input-group mb-3" style="width: 100%">
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                </div>

                <!-- Tổng tiền  -->
                <div class="khuyen_mai mx-2 mt-2">
                    <label for="basic-url"> <b>Nhập mã khuyến mãi</b></label>
                    <div class="input-group mb-3" style="width: 100%">
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                </div>
            </div>


        </div>
    </div>







    {{-- <script type="text/javascript" src="trangOrder.js"></script> --}}
    <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
</body>

</html>
