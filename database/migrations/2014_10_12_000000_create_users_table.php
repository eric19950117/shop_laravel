<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // TODO: up() -> 執行此次資料庫異動時要執行的程式
    public function up()
    {
        // 建立資料表 -> 'users'為資料表名稱
        Schema::create('users', function (Blueprint $table) {
            // TODO: 資料表欄位定義在這裡設定
            // 會員編號 -> 要求為主鍵並且可以自動增加編號
            // 自動增加編號預設即為主鍵，所以不需要再額外設定主鍵
            // 設定主鍵 -> $table->primary()
            // 設定非主鍵或非唯一值 -> $table->index()
            $table->increments('id');
            // Email
            $table->string('email', 150);
            // 密碼
            $table->string('password', 60);
            // 帳號類型(type):用於鑑別登入會員身份
            // - A(Admin):管理者
            // - G(General):一般會員
            $table->string('type', 1)->default('G'); //帳號狀態
            // 暱稱
            $table->string('nickname', 50);
            // 時間戳記
            // $table->timestamps();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            // 鍵值索引
            // email是唯一值 -> 第一個參數為欄位資料集陣列，可以設定多個欄位合在一起為唯一值
            //      第二個參數為索引鍵值名稱，，在資料查詢時，可以，在資料查詢時，可以指定資料庫用哪個索引鍵值去查詢
            $table->unique(['email'], 'user_email_uk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // TODO: down() -> 復原up()所做的資料庫異動
    public function down()
    {
        // 移除資料表 -> 直接帶入資料表名稱及可移除該資料表
        Schema::dropIfExists('users');
    }
}
