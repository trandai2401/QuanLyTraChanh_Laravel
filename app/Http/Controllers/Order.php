<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDon;
use App\Models\ChiTietOrder;
use App\Models\DanhMuc;
use App\Models\Mon;
use App\Models\Order as ModelsOrder;
use App\Models\ToppingThem;
use Illuminate\Support\Facades\DB;


class Order extends Controller
{
    //
    function getOrder()
    {
        return "order";
        return view('order');
    }

    function getOrderByID($order_id)
    {
        $idDanhMucToping = DanhMuc::where("ten", "Topping")->get();

        $topping = Mon::where('danhmuc_id', $idDanhMucToping[0]->id)->get();
        return view('trangOrder', ["dataArr" => getChiTietDonByIdOrder($order_id), "arrTopping" => $topping]);
    }
    function getNewOrder()
    {
        $order_id = DB::table('orders')->insertGetId(["tongtien" => 0, "status" => 1]);
        $idDanhMucToping = DanhMuc::where("ten", "Topping")->get();

        $topping = Mon::where('danhmuc_id', $idDanhMucToping[0]->id)->get();
        return view('trangOrder', ["dataArr" => getChiTietDonByIdOrder($order_id), "arrTopping" => $topping]);
        // return "order/new";

    }



    function postAddDrink(Request $request)
    {
        $order_id = $request->order_id;
        $drink_id = $request->drink_id;
        $topping_id = $request->topping_id;
        $drink = Mon::find($drink_id);


        // return getChiTietDonByIdOrder($order_id);

        $resultCheckDrink = kiemTraLoai($order_id, $drink_id);
        if ($resultCheckDrink) {
            if ($topping_id != null) {
                $resultCheckTopping = kiemTraTopping($order_id, $drink_id, $topping_id);
                if ($resultCheckTopping) {
                    echo 1;
                    $chiTietDon = ChiTietDon::find($resultCheckTopping);
                    $chiTietDon->soluong++;
                    $chiTietDon->save();
                } else {
                    echo 2;
                    themDoUongVaTopping($drink_id, $topping_id, $drink, $order_id);
                }
            } else {
                echo 3;
                $chiTietDon = new ChiTietDon();
                $chiTietDons = ChiTietDon::where("mon_id", $drink_id)->get();
                $check = false;
                foreach ($chiTietDons as $item) {
                    if ($item->topping->count() == 0) {
                        $chiTietDon = $item;
                        $check = true;
                        break;
                    }
                }
                if ($check == true) {
                    $chiTietDon->soluong++;
                    $chiTietDon->save();
                } else {
                    themDoUongVaTopping($drink_id, $topping_id, $drink, $order_id);
                }
            }
        } else {
            echo 4;
            themDoUongVaTopping($drink_id, $topping_id, $drink, $order_id);
        };
        return getChiTietDonByIdOrder($order_id);
    }
}

function kiemTraLoai($order_id, $drink_id)
{
    $drinkOfOrder = DB::table("chi_tiet_orders")
        ->join('chi_tiet_dons', 'chi_tiet_orders.chitietdon_id', '=', 'chi_tiet_dons.id')
        ->where("chi_tiet_orders.order_id", $order_id)
        ->where("chi_tiet_dons.mon_id", $drink_id)
        ->select("chi_tiet_dons.id")->get();
    if ($drinkOfOrder->count() == 0) {
        return 0;
    }
    return  $drinkOfOrder[0]->id;
}
function kiemTraTopping($order_id, $drink_id, $topping_id)
{
    $drinkOfOrder = DB::table("chi_tiet_orders")
        ->join('chi_tiet_dons', 'chi_tiet_orders.chitietdon_id', '=', 'chi_tiet_dons.id')
        ->join('topping_thems', 'chi_tiet_dons.id', '=', 'topping_thems.chitietdon_id')
        ->where("chi_tiet_orders.order_id", $order_id)
        ->where("chi_tiet_dons.mon_id", $drink_id)
        ->where("topping_thems.mon_id", $topping_id)
        ->select("chi_tiet_dons.id", "chi_tiet_dons.ten")->get();
    if ($drinkOfOrder->count() == 0) {
        return 0;
    }
    return  $drinkOfOrder[0]->id;
}
function themDoUongVaTopping($drink_id, $topping_id, $drink, $order_id)
{
    $chiTietDon = new ChiTietDon();
    $chiTietDon->ten = $drink->ten;
    $chiTietDon->gia = $drink->gia;
    $chiTietDon->dongia = $drink->gia;
    $chiTietDon->soluong = 1;
    $chiTietDon->mon_id = $drink_id;
    $chiTietDon->save();
    if ($topping_id != null) {
        $topping = Mon::find($topping_id);
        $toppingThem = DB::table('topping_thems')->insert(["ten" => $topping->ten, "chiTietDon_id" => $chiTietDon->id, "gia" => $topping->gia, "soluong" => 1, "mon_id" => $topping_id]);
        $chiTietDon->gia += $topping->gia;
    }
    $chiTietDon->save();

    $chiTietOrder = new ChiTietOrder();
    $chiTietOrder->order_id = $order_id;
    $chiTietOrder->chitietdon_id = $chiTietDon->id;
    $chiTietOrder->save();
}

function getChiTietDonByIdOrder($order_id)
{
    $chiTietOrders = ChiTietOrder::where("order_id", $order_id)->get();
    $arr = array();

    foreach ($chiTietOrders as $item) {
        $drink = ChiTietDon::find($item->chitietdon_id);
        $drink->topping = $drink->topping;
        array_push($arr, $drink);
    }

    // array_push($arr,$drinkOfOrder);


    return $arr;
}
