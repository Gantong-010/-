@extends('layout')
@section('title')
    
@endsection

@section('content')
    <div class="customer-menu">

        <div class="text-customer">
            <h1>ข้อมูลลูกค้า</h1>
        </div>

        {{-- <div class="button-customer">
            <a href="{{route("customer-add")}}"><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div> --}}

        <h3>ฟอร์มแก้ไขข้อมูลลูกค้า</h3>
        <form action="{{route('updateCustomer', $editCustomer->id)}}" method="POST" class="form-customer-add">
            @csrf
            <label for="">ชื่อ-นามสกุล : </label>
            <input type="text" name="customer_name" value="{{$editCustomer->customer_name}}"><br>
            <label for="">เบอร์โทรศัพท์ : </label>
            <input type="number" name="customer_phone" value="{{$editCustomer->customer_phone}}"><br>
            <div class="flex items-center mb-2 pt-1 ">
                <label for="customer_address" class="mr-2 w-1/6">ที่อยู่ :</label>
                <textarea name="customer_address" rows="2" class="w-3/4 border border-gray-500 p-1 rounded-lg" style="background-color: rgb(213, 213, 213);">{{$editCustomer->customer_address}}</textarea>
            </div>
            <label for="">ID Line : </label>
            <input type="text" name="customer_idline" value="{{$editCustomer->customer_idline}}"><br>
            <div class="button-close_edit-customer">
                <a href="{{route("customer")}}">ยกเลิก</a>
                <button type="submit">บันทึก</button>
            </div>
        </form>

        
        
    </div>
@endsection
