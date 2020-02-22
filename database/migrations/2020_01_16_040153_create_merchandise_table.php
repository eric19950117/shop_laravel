<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchandiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandise', function (Blueprint $table) {
            // 商品編號
            $table->increments('id');
            // 用於標記產品狀態，已上架的產品才能被消費者看到
            // -C(Create):建立中
            // -S(Sell):可販售
            $table->string('status', 1)->default('C');
            // 商品名稱
            // TODO: 設定nullable為希望在管理者上傳圖片的流程中，需要知道商品編號，才能上傳資料到指定的商品
            $table->string('name', 80)->nullable();
            // 商品英文名稱
            $table->string('en_name', 80)->nullable();
            // 商品介紹
            $table->text('introduction');
            // 商品英文介紹
            $table->text('introduction_en');
            // 商品照片
            $table->string('photo', 50)->nullable();
            // 價格
            $table->integer('price')->default(0);
            // 商品剩餘數量
            $table->integer('remain_count')->default(0);
            // 時間戳記
            $table->timestamps();

            // 索引設定
            $table->index(['status'], 'merchandise_status_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandise');
    }
}
