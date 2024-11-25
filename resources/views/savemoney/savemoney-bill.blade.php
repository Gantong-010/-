@extends('layout')
@section('title')
แสดงรายละเอียดการชำระเงิน
@endsection

@section('content')
    <div class="manage-price-menu">
        <div class="text-manage-price">
            <h1>พิมพ์การชำระเงิน</h1>
        </div>
        <div class="savemoney_detail">
            <div>
                <h4>รายละเอียด</h4>
                <p>ชื่อ-นามสกุล :  <span>{{$savemoney->customer->customer_name}}</span></p>
                <p>จำนวนกระสอบข้าวไก่ :  <span>{{$savemoney->savemoney_bag}}</span>จำนวน</p>
                <p>วิธีการชำระเงิน :  <span>{{$savemoney->savemoney_type}}</span>ประเภท</p>
                <p>รับเงิน :  <span>{{$savemoney->savemoney_receive}}</span>บาท</p>
                <p>เงินทอน :  <span>{{$savemoney->savemoney_change}}</span>บาท</p>
            </div>
        </div>

        <div class="button-back-savemoney">
            <a href="{{ route('savemoney') }}">กลับ</a>
        </div>
    </div>
@endsection
