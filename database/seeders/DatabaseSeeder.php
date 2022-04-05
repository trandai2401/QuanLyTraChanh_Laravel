<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('roles')->insert(['ten'=>"admin","code"=>"ADMIN"]);
        DB::table('roles')->insert(['ten'=>"manager","code"=>"MANAGER"]);
        DB::table('roles')->insert(['ten'=>"employee","code"=>"EMPLOYEE"]);
        DB::table('users')->insert(["name"=>"admin", "email"=>"admin","password"=> bcrypt("12345"),"role_id"=>1,"status"=>true]);
    
        DB::table('danh_mucs')->insert(["ten"=>"Trà"]);
        DB::table('danh_mucs')->insert(["ten"=>"Càfe A Phủ"]);
        DB::table('danh_mucs')->insert(["ten"=>"Sodo"]);
        DB::table('danh_mucs')->insert(["ten"=>"Mojito"]);
        DB::table('danh_mucs')->insert(["ten"=>"Trà sữa"]);
        DB::table('danh_mucs')->insert(["ten"=>"Ăn vặt"]);
        DB::table('danh_mucs')->insert(["ten"=>"Topping"]);

        DB::table('mons')->insert(["ten"=>"Trà chanh truyền thống","gia"=>15000,"trangthai"=>true,"danhmuc_id"=>1,"created_by"=>1]);
        DB::table('mons')->insert(["ten"=>"Trà chanh xí mụi","gia"=>17000,"trangthai"=>true,"danhmuc_id"=>1,"created_by"=>1]);
        DB::table('mons')->insert(["ten"=>"Trà chanh hoa nhài","gia"=>17000,"trangthai"=>true,"danhmuc_id"=>1,"created_by"=>1]);
        DB::table('mons')->insert(["ten"=>"Trà chanh sả tắc","gia"=>17000,"trangthai"=>true,"danhmuc_id"=>1,"created_by"=>1]);
        DB::table('mons')->insert(["ten"=>"Trà chanh leo, kim quất","gia"=>20000,"trangthai"=>true,"danhmuc_id"=>1,"created_by"=>1]);
        DB::table('mons')->insert(["ten"=>"Trà chanh mật ong","gia"=>20000,"trangthai"=>true,"danhmuc_id"=>1,"created_by"=>1]);
        DB::table('mons')->insert(["ten"=>"Trà đào A Phủ","gia"=>20000,"trangthai"=>true,"danhmuc_id"=>1,"created_by"=>1]);
        DB::table('mons')->insert(["ten"=>"Trà Ô Long phủ kem","gia"=>20000,"trangthai"=>true,"danhmuc_id"=>1,"created_by"=>1]);
        DB::table('mons')->insert(["ten"=>"Hồng trà phủ kem","gia"=>20000,"trangthai"=>true,"danhmuc_id"=>1,"created_by"=>1]);
        DB::table('mons')->insert(["ten"=>"Trà vải Đài Loan","gia"=>25000,"trangthai"=>true,"danhmuc_id"=>1,"created_by"=>1]);
        DB::table('mons')->insert(["ten"=>"Trà đào cam sả","gia"=>25000,"trangthai"=>true,"danhmuc_id"=>1,"created_by"=>1]);
        
        
        DB::table('mons')->insert(["ten"=>"Trân châu trắng","gia"=>5000,"trangthai"=>true,"danhmuc_id"=>7,"created_by"=>1]);
        DB::table('mons')->insert(["ten"=>"Trân châu đen","gia"=>5000,"trangthai"=>true,"danhmuc_id"=>7,"created_by"=>1]);
        DB::table('mons')->insert(["ten"=>"Trà chanh hoa nhài","gia"=>5000,"trangthai"=>true,"danhmuc_id"=>7,"created_by"=>1]);
        DB::table('mons')->insert(["ten"=>"Nha đam","gia"=>5000,"trangthai"=>true,"danhmuc_id"=>7,"created_by"=>1]);
    
    }
}
