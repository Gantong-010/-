@extends('layout')
@section('title')
พิมพ์การชำระเงิน
@endsection

@section('content')
<div class="manage-price-menu">
    <div class="text-manage-price">
        <h1>พิมพ์การชำระเงิน</h1>
    </div>

    <div class="button-savetheday">
        <a href="{{ route('savemoney-add') }}"><i class="ri-add-line"><span>เพิ่ม</span></i></a>
    </div>
    
    <div style="overflow-x: auto; max-height: 600px; margin-top: 20px;">
        <table class="table" style="width: 95%">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">วันที่มารับข้าว</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th class="t-width th-center" scope="col">รายละเอียด</th>
                    <th class="th-center" scope="col">พิมพ์</th>
                    <th class="th-center" scope="col">แก้ไข</th>
                    <th class="th-center" scope="col">ลบ</th>
                </tr>
            </thead>
            <tbody>
                @if (!isset($savemoneys) || $savemoneys->isEmpty())
                    <tr>
                        <td colspan="6">ยังไม่ได้เพิ่มข้อมูลการชำระเงินของ User นั้นๆ</td>
                    </tr>
                @else  
                    @foreach ($savemoneys as $index => $item)
                        <tr>
                            <td>{{ $index + 1  }}</td>
                            <td>{{ $item->ricedate->rice_date}}</td>
                            <td class="table-td-name-manage-price">{{ $item->customer->customer_name }}</td>
                            <td  id="td-icon-savetheday-print"><a href="{{ route('savemoneydetail', $item->id) }}"><i class="ri-file-list-3-line"></i></a></td>
                            <td id="td-icon-savetheday-print"><a href="{{ route('billSavemoney', $item->id) }}"><i class="ri-printer-line"></i></a></td>
                            <td id="td-icon-savetheday-edit"><a href="{{ route('editSavemoney', $item->id) }}"><i class="ri-file-edit-line"></i></a></td>
                            <td id="td-icon-savetheday-delete"><a href="{{route('deleteSavemoney',$item->id)}}"><i class="ri-delete-bin-6-line"></i></a></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection
