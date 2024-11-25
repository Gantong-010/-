@extends('layout')
@section('title')
    เพิ่มข้อมูลจัดการราคาข้าว
@endsection

@section('content')
    <div class="savetheday-menu">

        <div class="text-savetheday">
            <h1>เพิ่มบันทึกแจ้งวันมารับข้าว</h1>
        </div>

        <div class="button-savetheday">
            <a href=""><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <h3>ฟอร์มบันทึกแจ้งวันมารับข้าว</h3>

        <form action="{{route('insertRicedate')}}" class="form-savetheday-add" method="POST">
            @csrf
            <label for="">วันที่มารับข้าว : </label>
            <select>
                <option disabled selected>กรุณาเลือก</option>
                @foreach($riceprices as $item)
                <option value="{{$item->id}}">{{$item->rice_date}}</option>
                @endforeach
            </select>
            <label for="">ชื่อ-นามสกุล : </label>
            <select name="customer_name">
                @foreach ($customers as $item)
                <option>{{$item->customer_name}}</option>
                @endforeach
            </select><br>
            <label for="">พันธุ์ข้าว : </label>
            <select name="riceprice_rice">
                @foreach ($riceprices as $item)
                    <option>{{$item->riceprice_rice}}</option>
                @endforeach
            </select>
            <div class="button-close_add-savetheday">
                <a href="{{route("savetheday")}}">ยกเลิก</a>
                <button type="submit">เพิ่มข้อมูล</button>
            </div>
        </form>

        
        
    </div>
@endsection
