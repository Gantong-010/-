@extends('layout')
@section('title')
เพิ่มข้อมูลจัดการราคาข้าว
@endsection

@section('content')
    <div class="manage-price-menu">
        <div class="text-manage-price">
            <h1>ข้อมูลจัดการราคาข้าว</h1>
        </div>
        <h3>ฟอร์มบันทึกราคาข้าว</h3>
        <form action="{{ route('insertRiceprice') }}" class="form-manage-price-add" method="POST">
            @csrf
            <div class="pr-16">
                <div class="flex items-center space-x-2">
                    <label for="customer_id" class="text-lg font-medium">ชื่อ-นามสกุล </label>
                    <span class="mr-1">:</span>
                    <select name="customer_id" id="customer_id" style="background-color: rgb(213, 213, 213);"
                        class="focus:border-blue-500 focus:ring focus:ring-blue-500">
                        <option value="">กรุณาเลือกชื่อ</option>
                        @foreach ($customers as $item)
                            <option value="{{ $item->id }}">{{ $item->customer_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium" for="">วันที่นำข้าวมาคัด </label>
                    <span class="mr-1">:</span>
                    <input type="date" name="riceprice_date" placeholder="กำหนดวันที่" class="border p-1">
                </div>

                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium" for="">วันที่มารับข้าว </label>
                    <span class="mr-1">:</span>
                    <input type="date" name="rice_date" placeholder="กำหนดวันที่มารับข้าว" class="border  p-1">
                </div>

                <div class="flex items-center space-x-2">
                    <label for="riceType" class="text-sm font-medium">ชื่อเมล็ดพันธุ์ข้าว</label>
                    <span class="mr-1">:</span>
                    <select id="riceType" name="riceprice_rice" style="background-color: rgb(213, 213, 213);"
                        onchange="checkOther(this);"
                        class="block text-black text-lg w-48 p-0.5 border border-[#d5d5d5] -md focus:border-blue-500 focus:ring focus:ring-blue-500">
                        <option id="disnonevalue" value="">คลิกเพื่อเลือก</option>
                        <option value="ข้าวหมอมะลิ 105">ข้าวหมอมะลิ 105</option>
                        <option value="ข้าวหอมมะลิทุ่งกุลา">ข้าวหอมมะลิทุ่งกุลา</option>
                        <option value="ข้าวเหลืองรวงยาว">ข้าวเหลืองรวงยาว</option>
                        <option value="ข้าวเหนียวเขี้ยวงู">ข้าวเหนียวเขี้ยวงู</option>
                        <option value="other">อื่นๆ</option>
                    </select>
                    <input type="text" id="otherRiceType" name="riceprice_rice_other" placeholder="กำหนดพันธุ์ข้าว"
                        class="hidden mt-2 p-1 border border-gray-300  focus:border-blue-500 focus:ring focus:ring-blue-500 ">
                </div>

                <div class="pr-4">
                    <div class="flex items-center space-x-2 pl-44 ">
                        <label class="text-lg font-medium" for="riceprice_quantity">กระสอบข้าว</label>
                        <span class="mr-1">:</span>
                        <input type="text" name="riceprice_quantity" placeholder="จำนวนกระสอบข้าว"
                            class="border  p-1">
                            <span> กระสอบ</span>    
                    </div>
                </div>

                <div class="pl-44 pr-4">
                    <div class="flex items-center space-x-2">
                        <label class="text-lg font-medium" for="">น้ำหนักข้าว </label>
                        <span class="mr-1">:</span>
                        <input type="number" name="riceprice_weight" placeholder="กรุณาใส่น้ำหนักข้าว(x1.2)" id="number"
                            oninput="calculate()" class="border  p-1">
                        <span>กิโลกรัม</span>
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <label class="text-lg font-medium" for="">ราคา </label>
                    <span class="flex align-items-center mr-3">:</span> 
                    <input type="number" name="riceprice_price" placeholder="กำหนดจำนวนราคา" id="result"
                        class="border  p-1">
                    <span>บาท</span>
                </div>

                <div class="button-close_add-manage-price">
                    <a href="{{ route('manage-price') }}">ยกเลิก</a>
                    <button type="submit">เพิ่มข้อมูล</button>
                </div>
            </div>

        </form>


        <script src="{{ asset('js/manage-price-script.js') }}" defer></script>
        <script>
            function checkOther(select) {
                var otherInput = document.getElementById('otherRiceType');
                var disnone = document.getElementById('disnonevalue');
                if (select.value === 'other') {
                    otherInput.style.display = 'inline';
                    otherInput.name = 'riceprice_rice'; // เปลี่ยนชื่อเพื่อให้ค่าถูกส่งไปใน request
                } else {
                    otherInput.style.display = 'none';
                    disnone.style.display = 'none';
                    otherInput.name = ''; // เปลี่ยนชื่อเพื่อไม่ให้ค่าถูกส่งไปใน request
                }
            }
        </script>
    </div>
@endsection
