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
        Schema::create('rice_prices', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('customer_id')->comment('รหัสลูกค้า');
            $table->date('riceprice_date')->comment('วันที่นำข้าวมา');
            $table->date('rice_date')->comment('วันที่มารับข้าว');
            $table->string('riceprice_rice',50)->comment('ชื่อพันธุ์ข้าว');
            $table->unsignedTinyInteger('riceprice_quantity')->comment('จำนวนกระสอบข้าว');
            $table->float('riceprice_weight',8,2)->comment('จำนวนน้ำหนักข้าว');
            $table->unsignedSmallInteger('riceprice_price')->comment('จำนวนราคา');
            $table->timestamps();
            // กำหนด Foreign Key และการกระทำเมื่อมีการลบข้อมูล
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rice_prices');
    }
};
