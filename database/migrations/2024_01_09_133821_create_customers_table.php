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
        Schema::create('customers', function (Blueprint $table) {
            $table->smallIncrements('id')->comment('รหัสลูกค้า');
            $table->string('customer_name',100)->comment('ชื่อลูกค้า');
            $table->string('customer_phone',10)->comment('เบอร์โทรศัพท์');
            $table->string('customer_address',150)->comment('ที่อยู่');
            $table->string('customer_idline',50)->comment('ไอดีไลน์');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
