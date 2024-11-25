<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('save_money', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('customer_id')->comment('รหัสลูกค้า');
            $table->unsignedSmallInteger('rice_date_id')->comment('รหัสวันที่มารับข้าว');   //-> มีการเปลี่ยน rice_price_id เป็น rice_date
            $table->unsignedTinyInteger('savemoney_bag')->comment('จำนวนกระสอบข้าวไก่');
            $table->string('savemoney_type',20)->comment('วิธีชำระเงิน');
            $table->unsignedSmallInteger('savemoney_receive')->comment('จำนวนเงินที่รับ');
            $table->unsignedSmallInteger('savemoney_change')->comment('จำนวนเงินทอน');
            $table->unsignedTinyInteger('savemoney_status')->default(0)->comment('สถานะ');   // รอข้าว 0=ดำเนินการ 1= เสร็จสิ้น
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('rice_date_id')->references('id')->on('rice_prices')->onDelete('cascade');

            // $table->foreign('customer_id')->references('id')->on('customers');
            // $table->foreign('ricedate_id')->references('id')->on('ricedates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('save_money');
    }
};
