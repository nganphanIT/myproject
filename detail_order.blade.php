@extends('blog.client.master')
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
            <td><strong>Số tiền phải thanh toán:</strong></td>
            <td></td>
            <td><strong>{{ number_format($totalAmount) }}  VNĐ</strong></td>
            <td></td>
        </tr>

    </table>
@endsection
