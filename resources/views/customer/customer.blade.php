@extends('layout')
@section('title')
@endsection

@section('content')
    <div class="customer-menu">
        <div class="text-customer">
            <h1>ข้อมูลลูกค้า</h1>
        </div>

        <div class="button-customer">
            <a href="{{ route('customer-add') }}"><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <div style="overflow-x: auto; max-height: 600px; margin-top: 20px;">
            <table class="table" style="width: 95%">
                <thead>
                    <tr>
                        <th scope="col">NO.</th>
                        <th scope="col">ชื่อ-นามสกุล</th>
                        <th scope="col">เบอร์โทร</th>
                        <th scope="col">ที่อยู่</th>
                        <th scope="col">ID Line</th>
                        <th class="th-center" scope="col">แก้ไข</th>
                        <th class="th-center" scope="col">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="table-td-name-customer">{{ $item->customer_name }} </td>
                            <td>{{ $item->customer_phone }}</td>
                            <td class="table-edit-test">{{ $item->customer_address }}</td>
                            <td>{{ $item->customer_idline }}</td>
                            <td id="td-icon-customer-edit"><a href="{{ route('editCustomer', $item->id) }}"><i
                                        class="ri-file-edit-line"></i></a>
                            </td>
                            <td id="td-icon-customer-delete">
                                <a href="{{ route('customer.delete', $item->id) }}"
                                    onclick="event.preventDefault(); 
                                                        if(confirm('คุณแน่ใจหรือไม่ว่าต้องการลบลูกค้านี้?')) {
                                                            document.getElementById('delete-form-{{ $item->id }}').submit();
                                                        }">
                                    <i class="ri-delete-bin-6-line"></i>
                                </a>
                                <form id="delete-form-{{ $item->id }}"
                                    action="{{ route('customer.delete', $item->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
