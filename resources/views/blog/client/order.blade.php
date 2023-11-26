@extends('blog.client.master')
@section('content')

    <h1>LỊCH SỬ ĐƠN HÀNG</h1>
    <h3>Chào {{ Auth::user()->name }}! Cảm ơn bạn đã cho chúng tôi cơ hội phục vụ bạn.</h3>
    <table class="table table-stripe">
        <tr>
            <th>Mã đơn hàng</th>
            <th>Trạng thái</th>
            <th>Tổng cộng</th>
            <th>Thời gian đặt</th>
            <th></th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                @switch($order->status)
                    @case(0)
                        <td>Chưa xác nhận</td>
                        @break
                    @case(1)
                        <td>Đã xác nhận</td>
                        @break
                    @case(2)
                        <td>Đang xử lý</td>
                        @break
                    @case(3)
                        <td>Đang gửi hàng</td>
                        @break
                    @case(4)
                        <td>Đã giao hàng</td>
                        @break
                    @case(5)
                        <td>Đã hoàn thành</td>
                        @break
                    @case(6)
                        <td>Đã hủy</td>
                        @break
                    @default
                        <td>Đang hoàn tiền</td>
                @endswitch
               <td>{{ isset($totalAmount[$order->id]) ? number_format($totalAmount[$order->id], 0, ',', '.') . ' VND' : '0 VND' }}</td>
                <td>{{ $order->created_at }}</td>
                <td> <a href="{{ url('/blog/client/detailOrder') }}/{{ $order->id }}"> <i class="fa fa-list" style="font-size:24px"></i></a></td>
            </tr>
        @endforeach
    </table>
@endsection
<style>
    h1 {
        color: #333;
    }
    .fa-list{

        background-color: white;
        color: black;
    }
    table th{
        text-align: center;
    }


</style>
