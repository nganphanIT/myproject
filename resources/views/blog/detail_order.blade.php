{{-- @extends('blog.general.master')
@section('sidebar')
   <br><br>
   <h3>Địa chỉ nhận hàng</h3>
   <p><strong>Người nhận: </strong> {{ $customer->full_name }}</p>
   <p><strong>Địa chỉ: </strong> {{ $customer->address }}</p>
   <p><strong>Số điện thoại: </strong> {{ $customer->phone }}</p>
@endsection
@section('content')
    <h1>CHI TIẾT ĐƠN HÀNG</h1>
    <table class="table table-stripe">
        Mã đơn hàng: {{ $id }}
        <tr>
            <th style="width: 50%">Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Ngày đặt mua</th>
        </tr>
        @php
            $totalAmount = 0;
        @endphp
        @foreach ($products as $product)
            <tr>
                <td style="width: 50%">{{  $product->product->title  }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ number_format($product->total_amount) }}  VNĐ</td>
                <td>{{ $product->created_at }}</td>
            </tr>
            @php
                $totalAmount += $product->total_amount;
            @endphp
        @endforeach
        <tr>
            <td><strong>Thanh toán:</strong></td>
            <td></td>
            <td><strong>{{ number_format($totalAmount) }}  VNĐ</strong></td>
            <td></td>
        </tr>
    </table>
    <i class="fas fa-print print-icon" onclick="window.print()"></i>
@endsection
<style>
    .print-icon {
        font-size: 24px; /* Adjust the size as needed */
        color: #333; /* Adjust the color as needed */
        cursor: pointer;
    }
</style>
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #print-section, #print-section * {
            visibility: visible;
        }
        #print-section {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
@section('content')
    <div id="print-section">
        <h1>CHI TIẾT ĐƠN HÀNG</h1>
        <table class="table table-stripe">
            Mã đơn hàng: {{ $id }}
            <tr>
                <th style="width: 50%">Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Ngày đặt mua</th>
            </tr>
            @php
                $totalAmount = 0;
            @endphp
            @foreach ($products as $product)
                <tr>
                    <td style="width: 50%">{{  $product->product->title  }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ number_format($product->total_amount) }}  VNĐ</td>
                    <td>{{ $product->created_at }}</td>
                </tr>
                @php
                    $totalAmount += $product->total_amount;
                @endphp
            @endforeach
            <tr>
                <td><strong>Thanh toán:</strong></td>
                <td></td>
                <td><strong>{{ number_format($totalAmount) }}  VNĐ</strong></td>
                <td></td>
            </tr>
        </table>
        <i class="fas fa-print print-icon" onclick="window.print()"></i>
    </div>
@endsection
 --}}
 @extends('blog.general.master')

@section('sidebar')
    <br><br>
    <div id="sidebar-print-section">
        <h3>Địa chỉ nhận hàng</h3>
        <p><strong>Người nhận: </strong> {{ $customer->full_name }}</p>
        <p><strong>Địa chỉ: </strong> {{ $customer->address }}</p>
        <p><strong>Số điện thoại: </strong> {{ $customer->phone }}</p>
    </div>
@endsection

@section('content')
    <div id="content-print-section">
        <h1>CHI TIẾT ĐƠN HÀNG</h1>
        <p>Mã đơn hàng: {{ $id }}</p>
        <table class="table table-stripe">
            <tr>
                <th style="width: 50%">Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Ngày đặt mua</th>
            </tr>
            @php
                $totalAmount = 0;
            @endphp
            @foreach ($products as $product)
                <tr>
                    <td style="width: 50%">{{ $product->product->title }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ number_format($product->total_amount) }}  VNĐ</td>
                    <td>{{ $product->created_at }}</td>
                </tr>
                @php
                    $totalAmount += $product->total_amount;
                @endphp
            @endforeach
            <tr>
                <td><strong>Thanh toán:</strong></td>
                <td></td>
                <td><strong>{{ number_format($totalAmount) }}  VNĐ</strong></td>
                <td></td>
            </tr>
        </table>
        <i class="fas fa-print print-icon" onclick="window.print()"></i>
    </div>
@endsection

<style>
    .print-icon {
        font-size: 24px; /* Adjust the size as needed */
        color: #333; /* Adjust the color as needed */
        cursor: pointer;
    }

    @media print {
        body * {
            visibility: hidden;
        }
        #sidebar-print-section, #sidebar-print-section * {
            visibility: visible;
        }
        #content-print-section, #content-print-section * {
            visibility: visible;
        }
        #sidebar-print-section{
            position: absolute;
            left: 5%;
            top: 2%;
        }
        #content-print-section {
            position: absolute;
            left: 2%;
            top: 30%;
        }
    }
</style>
