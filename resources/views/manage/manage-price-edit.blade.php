@extends('layout')
@section('title')
    แก้ไขข้อมูลจัดการราคาข้าว
@endsection

@section('content')
    <div class="manage-price-menu">
        <div class="text-manage-price">
            <h1>ข้อมูลจัดการราคาข้าว</h1>
        </div>
        <h3>ฟอร์มแก้ไขราคาข้าว</h3>
        <form action="{{ route('updateRiceprice', $editRiceprice->id) }}" method="POST" class="form-manage-price-edit">
            @csrf
            <div class="flex items-center space-x-2">
                <label for="">ชื่อ-นามสกุล : </label>
                <span class="border border-black border-1 p-1 rounded-md" style="background-color: #d5d5d5; width: 60%;">
                    {{ $editRiceprice->customer->customer_name }}
                </span><br>
            </div>
            <div class="pr-10">
                <div class="flex items-center space-x-2">
                    <label for="">วันที่นำข้าวมาคัด : </label>
                    <input type="date" name="riceprice_date" value="{{ $editRiceprice->riceprice_date }}"><br>
                </div>
                <div class="flex items-center space-x-2"><label for="">วันที่นัดรับข้าว : </label>
                    <input type="date" name="rice_date" value="{{ $editRiceprice->rice_date }}"><br>
                </div>
            </div>
            <div class="flex items-center space-x-2 pl-14"><label for="">กระสอบข้าว : </label>
                <input type="text" name="riceprice_quantity" value="{{ $editRiceprice->riceprice_quantity }}"><br>
                <span> กระสอบ</span>
            </div>
            <div class="flex items-center space-x-2 pr-14">
                <label for="riceType" class="text-lg font-medium">ชื่อเมล็ดพันธุ์ข้าว :</label>
                <select id="riceType" name="riceprice_rice" onchange="checkOther(this);"
                    class="border p-1 text-lg rounded-md" style="background-color: rgb(213, 213, 213);">
                    <option value="">{{ $editRiceprice->riceprice_rice }}</option>
                    <option value="ข้าวหมอมะลิ 105"
                        {{ $editRiceprice->riceprice_rice == 'ข้าวหมอมะลิ 105' ? 'selected' : '' }}>
                        ข้าวหมอมะลิ 105
                    </option>
                    <option value="ข้าวหอมมะลิทุ่งกุลา"
                        {{ $editRiceprice->riceprice_rice == 'ข้าวหอมมะลิทุ่งกุลา' ? 'selected' : '' }}>
                        ข้าวหอมมะลิทุ่งกุลา
                    </option>
                    <option value="ข้าวเหลืองรวงยาว"
                        {{ $editRiceprice->riceprice_rice == 'ข้าวเหลืองรวงยาว' ? 'selected' : '' }}>
                        ข้าวเหลืองรวงยาว
                    </option>
                    <option value="ข้าวเหนียวเขี้ยวงู"
                        {{ $editRiceprice->riceprice_rice == 'ข้าวเหนียวเขี้ยวงู' ? 'selected' : '' }}>
                        ข้าวเหนียวเขี้ยวงู
                    </option>
                    <option value="other" {{ $editRiceprice->riceprice_rice == 'อื่นๆ' ? 'selected' : '' }}>อื่นๆ</option>
                </select>
                <input type="text" id="otherRiceType" name="other_riceprice_rice" placeholder="กำหนดพันธุ์ข้าว"
                    style="display: {{ $editRiceprice->riceprice_rice == 'อื่นๆ' ? 'inline' : 'none' }};  background-color: rgb(213, 213, 213);"
                    value="{{ $editRiceprice->riceprice_rice == 'อื่นๆ' ? $editRiceprice->riceprice_rice : '' }}"
                    class="border p-1 text-lg bg-white rounded-md">
            </div>
            <div class="flex items-center space-x-2 pl-16"><label for="">น้ำหนักข้าว : </label>
                <input type="number" name="riceprice_weight" value="{{ $editRiceprice->riceprice_weight }}" id="number"
                    oninput="calculate()"><br>
                <span> กิโลกรัม</span>
            </div>
            <div class="flex items-center space-x-2 pl-6"><label for="">ราคา : </label>
                <input type="number" name="riceprice_price" value="{{ $editRiceprice->riceprice_price }}"
                    id="result"><br>
                <span>บาท</span>
            </div>
            <div class="button-close_edit-manage-price">
                <a href="{{ route('manage-price') }}">ยกเลิก</a>
                <button type="submit">เพิ่มข้อมูล</button>
            </div>
        </form>
        <script src="{{ asset('js/manage-price-script.js') }}" defer></script>
        <script>
            function checkOther(select) {
                var otherInput = document.getElementById('otherRiceType');
                if (select.value === 'other') {
                    otherInput.style.display = 'inline';
                } else {
                    otherInput.style.display = 'none';
                }
            }
        </script>
    </div>
@endsection
