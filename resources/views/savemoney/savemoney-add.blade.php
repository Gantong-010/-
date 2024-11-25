@extends('layout')
@section('title')
เพิ่มข้อมูลพิมพ์การชำระเงิน
@endsection

@section('content')
    <div class="savetheday-menu">
        <div class="text-savetheday">
            <h1>พิมพ์การชำระเงิน</h1>
        </div>
        <h3>ฟอร์มบันทึกการชำระเงิน</h3>
        <form action="{{ route('insertSavemoney') }}" class="form-savetheday-add" method="POST">
            @csrf
            <div class="flex items-center space-x-2">
                <label for="customer_id" class="text-lg font-medium">ชื่อ-นามสกุล :</label>
                <select name="customer_id" id="customer_id" style="background-color: rgb(213, 213, 213);"
                    class="border p-1 text-lg  rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500">
                    <option value="">กรุณาเลือกชื่อ</option>
                    @foreach ($customers as $item)
                        <option value="{{ $item->id }}">{{ $item->customer_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center space-x-2">
                <label for="rice_date_id" class="text-lg font-medium">วันที่มารับข้าว :</label>
                <select name="rice_date_id" id="rice_date_id" style="background-color: rgb(213, 213, 213);"
                    class="border p-1 text-lg  rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500">
                    <option value="">เลือกวันที่</option>
                    @foreach ($ricedates as $item)
                        <option value="{{ $item->id }}">{{ $item->rice_date }}</option>
                    @endforeach
                </select>
            </div>
            <label for="">ข้าวไก่ :</label>
            <input type="text" name="savemoney_bag" placeholder="จำนวนกระสอบข้าวไก่"><span>จำนวน</span><br>
            <label for="">วิธีชำระเงิน :</label>
            <input type="text" name="savemoney_type" placeholder="วิธีชำระเงิน"><span>ประเภท</span><br>
            <label for="">รับเงิน :</label>
            <input type="text" name="savemoney_receive" id="savemoney_receive"
                placeholder="กรุณากรอกจำนวนเงิน"><span>บาท</span><br>
            {{-- เมื่อเลือกชื่อ ราคาข้าวของรายชื่อนั้น จะมาอัตโนมัติ --}}
            <label for="">ราคา :</label>
            <input type="text" name="riceprice_price" id="riceprice_price" placeholder="ราคาข้าว"><span>บาท</span><br>
            <label for="">เงินทอน :</label>
            <input type="text" name="savemoney_change" id="savemoney_change" placeholder="เงินทอน"><span>บาท</span><br>

            <div class="button-close_add-savetheday">
                <a href="{{ route('savemoney') }}">ยกเลิก</a>
                <button type="submit">เพิ่มข้อมูล</button>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('customer_id').addEventListener('change', function() {
            var customerId = this.value;
            console.log('cusId', customerId)
            if (customerId) {
                fetch(`/get-riceprice/${customerId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('riceprice_price').value = data.riceprice_price;
                        document.getElementById('savemoney_receive').addEventListener('change', function() {
                            var savemoneyPrice = this.value;
                            console.log('price', savemoneyPrice)
                            var ricepriece = data.riceprice_price;
                            if (savemoneyPrice !== "") {
                                var valuetatal = savemoneyPrice - ricepriece;
                                document.getElementById('savemoney_change').value = valuetatal;
                            } else {
                                document.getElementById('savemoney_change').value = '';
                            }
                        })
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>
@endsection
