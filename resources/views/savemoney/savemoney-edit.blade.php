@extends('layout')
@section('title')
    แก้ไขการชำระเงิน
@endsection

@section('content')
    <div class="savetheday-menu">

        <div class="text-manage-price">
            <h1>พิมพ์การชำระเงิน</h1>
        </div>

        <h3>ฟอร์มแก้ไขการชำระเงิน</h3>

        <form action="{{ route('updateSavemoney', $editSavemoney->id) }}" method="POST" class="form-savetheday-add">
            @csrf
            <div class="flex items-center ml-2">
                <label for="">ชื่อ-นามสกุล</label>
                <span class="m-2"> :</span>
                <input type="text" name="customer_name" value="{{ $editSavemoney->customer->customer_name }}"><br>
            </div>
            <div  class="flex items-center mr-6">
                <label for="">จำนวนข้าวไก่</label>
                <span class="m-2"> :</span>
                <input type="text" name="savemoney_bag" value="{{ $editSavemoney->savemoney_bag }}">
                <span>กระสอบ</span><br>
            </div>
            <div class="flex items-center ml-6">
                <label for="">วิธีชำระเงิน</label>
                <span class="m-2"> :</span>
                <input type="text" name="savemoney_type" value="{{ $editSavemoney->savemoney_type }}"><span>ประเภท</span><br>
            </div>
            <div  class="flex items-center ml-16">
                <label for="">รับเงิน</label>
                <span class="m-2"> :</span>
                <input type="number" name="savemoney_receive"
                    value="{{ $editSavemoney->savemoney_receive }}"><span>บาท</span>
                    <br>
            </div>
            <div  class="flex items-center ml-12">
                <label for="">ทอนเงิน</label>
                <span class="m-2"> :</span>
                <input type="number" name="savemoney_change"
                    value="{{ $editSavemoney->savemoney_change }}"><span>บาท</span><br>
            </div>
            <div class="button-close_edit-savetheday">
                <a href="{{ route('savemoney') }}">ยกเลิก</a>
                <button type="submit">บันทึก</button>
            </div>
        </form>



    </div>
@endsection
