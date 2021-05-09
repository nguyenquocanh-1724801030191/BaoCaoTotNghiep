<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('p_transaction_id')->nullable();
            $table->integer('p_user_id')->nullable();
            $table->float('p_money')->nullable()->comment('Số tiền thanh toán');
            $table->string('p_note')->nullable()->comment('Nội dung thanh toán');
            $table->string('p_vnp_response_code',255)->nullable()->comment('Mã phản hồi');
            $table->string('p_code_vnpay', 255)->nullable()->comment('Mã giao dịch vnpay');
            $table->string('p_code_bank', 255)->nullable()->comment('Mã ngân hàng');
            $table->dateTime('p_time')->nullable()->comment('Thời gian chuyển khoản');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payment');
    }
}
