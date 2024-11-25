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
        Schema::create('profits', function (Blueprint $table) {
            $table->smallIncrements('id'); // สร้างคอลัมน์ id เป็น smallIncrements
            $table->unsignedSmallInteger('customer_id'); // ใช้ unsignedSmallInteger สำหรับ foreign key
            // อื่นๆ...
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profits');
    }
};
