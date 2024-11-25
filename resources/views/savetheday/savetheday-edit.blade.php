@extends('layout')
@section('title')
แก้ไขข้อมูลจัดการราคาข้าว
@endsection

@section('content')
    <div class="manage-price-menu">

        <div class="text-manage-price">
            <h1>ข้อมูลจัดการราคาข้าว</h1>
        </div>

        <div class="button-manage-price">
            <a href="{{route('manage-price-add')}}"><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <h3>ฟอร์มแก้ไขราคาข้าว</h3>

        <form action="{{route('updateRiceprice', $editRicedate->id)}}" method="POST" class="form-manage-price-add">
            @csrf
            <label for="">ชื่อ-นามสกุล : {{$editRicedate->customer->customer_name}}</label><br>
            <label for="">วันที่นัดรับข้าว : </label>
            <input type="date" name="rice_date" value="{{$editRicedate->rice_date}}"><br>
            <label for="">พันธุ์ข้าว : </label>
            <input type="text" name="riceprice_rice" value="{{$editRicedate->riceprice_rice}}"><br>
            <div class="button-close_edit-manage-price">
                <a href="{{route("manage-price")}}">ยกเลิก</a>
                <button type="submit">เพิ่มข้อมูล</button>
            </div>
        </form>

        
        <script src="{{ asset('js/manage-price-script.js') }}" defer></script>
    </div>
@endsection
