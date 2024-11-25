@extends('layout')
@section('title')
    บันทึกแจ้งวันมารับข้าว
@endsection

@section('content')
    <div class="savetheday-menu">
        <div class="text-savetheday">
            <h1>บันทึกแจ้งวันมารับข้าว</h1>
        </div>
        <div style="overflow-x: auto; max-height: 600px; margin-top: 20px;">
            <table class="table" style="width: 95%">
                <thead>
                    <tr>
                        <th scope="col">NO.</th>
                        <th scope="col">วันที่มารับข้าว</th>
                        <th scope="col">ชื่อ-นามสกุล</th>
                        <th scope="col">พันธุ์ข้าว</th>
                        <th class="t-center" scope="col">พิมพ์</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ricedates as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->rice_date }}</td>
                            <td class="table-td-name-savetheday">{{ $item->customer->customer_name }}</td>
                            <td>{{ $item->riceprice_rice }}</td>
                            <td id="td-icon-savetheday-print"><a href="{{ route('ricedatedetail', $item->id) }}"><i
                                        class="ri-printer-line"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
