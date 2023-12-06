@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Đơn Hàng Của Bạn</h2>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Sản Phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Tổng Cộng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $index => $cartItem)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $cartItem->product->title }}</td>
                    <td>{{ number_format($cartItem->product->price) }} đồng</td>
                    <td>{{ $cartItem->quantity }}</td>
                    <td>{{ number_format($cartItem->product->price * $cartItem->quantity) }} đồng</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        <h4>Tổng Tiền: {{ number_format($totalPrice) }} đồng</h4>
        <!-- Thêm các trường thông tin đơn hàng và nút thanh toán ở đây -->
    </div>
</div>
@endsection
