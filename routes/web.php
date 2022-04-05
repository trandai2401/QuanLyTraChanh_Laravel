<?php

use App\Http\Controllers\Order;
use Illuminate\Support\Facades\Route;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    DB::table('users')->insert(["name"=>"admin", "email"=>"admin","password"=> bcrypt("12345"),"role_id"=>1,"status"=>true]);
    
    return view('welcome');
});

Route::get("token",function(){
    echo csrf_token();
});

Route::get('gioithieu', function () {
    return view('gioithieu');
});

Route::prefix('login')->group(function () {
    Route::get('/', function (Request $request) {
    $url = $request->bar;
    echo $url;
       return view('login');
    });

    Route::post('/', function (Request $request) {
        $username = $request['username'];
        $password = $request['password'];

        $user = Auth::attempt(['name' => $username, 'password' => $password]);
        if ($user) {
            return 1;
            // return redirect('home');
        } else {
            return view('login',['erorr' => 'Sai mật khẩu hoặc tên đăng nhập']);
        }
    });
});


Route::prefix("order")->group(function () {
    Route::get('/', [Order::class,'getOrder']);
      Route::get('/new-order', [Order::class,'getNewOrder'] );
    Route::get('/{order_id}', [Order::class,'getOrderByID'] );

    Route::post('/addDrinksForOrder',[Order::class,'postAddDrink']);


});


