<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ใบเสร็จ</title>
    <link rel="stylesheet" href="{{ asset('css/style-savemoney-receipt.css') }}">
</head>

<body>
    <div class="container-print">
        <div class="container">
            <div class="header">
                <h1>โรงคัดเมล็ดพันธุ์ข้าว</h1>
                <p>เลขที่ 466 สุวรรณศร ท่าเกษม สระแก้ว 27000</p>
                <p>เบอร์โทร: 0898988356</p>
            </div>
            <div class="body">
                <div class="info">
                    <p>พนักงาน: {{ auth()->user()->name }}</p>
                    <p>ชื่อลูกค้า: {{ $savemoney->customer->customer_name }}</p>
                    <p>พันธุ์ข้าว: {{ $savemoney->ricedate->riceprice_rice }}</p>
                </div>
                <div class="details">
                    <table>
                        <tr>
                            <th>วันที่</th>
                            <td>{{ $savemoney->ricedate->rice_date }}</td>
                        </tr>
                    </table>
                </div>
                <div class="price">
                    <p><span class="label">กระสอบข้าวไก่ </span> <span class="value">{{ $savemoney->savemoney_bag }}</span> กระสอบ</p>
                    <p><span class="label">ชำระเงิน </span> <span class="value">{{ $savemoney->savemoney_type }}</span> ประเภท</p>
                    <p><span class="label">รับเงิน </span> <span class="value">{{ $savemoney->savemoney_receive }}</span> บาท</p>
                    <p><span class="label">เงินทอน </span> <span class="value">{{ $savemoney->savemoney_change }}</span> บาท</p>
                </div>
            </div>
            <div class="footer">
                <p>🙏ขอบคุณที่ใช้บริการ🙏</p>
            </div>
        </div>
    </div>
    <div class="button-two">
        <div class="button">
            <button id="print" style="color: white;">Print</button>
        </div>
        <div class="button">
            <button><a href="{{ route('savemoney') }}">Back</a></button>
        </div>
    </div>

    <script src="{{ asset('js/savemoney-receipt.js') }}"></script>
</body>

</html>
