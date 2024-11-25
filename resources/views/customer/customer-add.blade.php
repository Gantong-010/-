@extends('layout')
@section('title')
@endsection

@section('content')
    <div class="customer-menu">
        <div class="text-customer">
            <h1>ข้อมูลลูกค้า</h1>
        </div>
        <h3>ฟอร์มบันทึกข้อมูลลูกค้า</h3>
        <form action="{{ route('insertCustomer') }}" class="form-customer-add" method="POST">
            @csrf
            <div class="flex items-center">
                <label for="">ชื่อ-นามสกุล</label>
                <span>:</span>
                <input type="text" name="customer_name" placeholder="ชื่อ-นามสกุล"><br>
            </div>
            <div class="flex items-center">
                <label for="">เบอร์โทรศัพท์</label>
                <span>:</span>
                <input type="number" name="customer_phone" placeholder="กรุณาใส่เบอร์โทร"><br>
            </div>
            <div class="flex items-center">
                <label for="customer_address" class="mr-2 w-1/6">ที่อยู่ :</label>
                <input type="text" name="customer_address" placeholder="กรุณาใส่ที่อยู่"
                    class="w-3/4 border border-gray-500 p-2 rounded-lg bg-[rgb(213,213,213)]">
            </div>
            <div class="flex items-center">
                <label for="">ID Line</label>
                <span>:</span>
                <input type="text" name="customer_idline" placeholder="กรุณาใส่ Id Line"><br>
            </div>
            <div class="button-close_add-customer">
                <a href="{{ route('customer') }}">ยกเลิก</a>
                <button type="submit">เพิ่มข้อมูล</button>
            </div>
        </form>



    </div>
@endsection
