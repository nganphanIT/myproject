@extends('blog.general.master')
@section('sidebar')
    <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:100%">
        <a href="{{ url('blog/blog/create') }}" class="nav-link ">Thêm sản phẩm</a>
        <a href="{{ url('blog/category/create') }}" class="nav-link ">Thêm thương hiệu</a>
        <a href="{{ url('blog/blog/discount') }}" class="nav-link ">Thêm mã giảm giá</a>
    </div>
@endsection
@section('content')
    <div class="container">
        <h1>Đơn hàng</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <tr class="title">
                <td>STT</td>
                <td>MÃ ĐƠN HÀNG</td>
                <td>MÃ KHÁCH HÀNG</td>
                <td>TRẠNG THÁI</td>
                <td>CHỨC NĂNG</td>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td class="center border-cell">{{ $loop->iteration }}</td>
                    <td class="center border-cell">{{ $order->id }}</td>
                    <td class="center border-cell">{{ $order->customer_id }}</td>
                    <td class="center border-cell">
                        <form id="statusForm" method="POST" action="{{ url('/blog/orders/' . $order->id) }}">
                            @csrf
                            @method('POST') {{-- Use 'PATCH' if you prefer --}}
                            <div class="form-group">
                                <select class="role border-cell" name="status" data-user-id="{{ $order->id }}">
                                    <option value="0" {{ $order->status == '0' ? 'selected' : '' }}>Chưa xác nhận</option>
                                    <option value="1" {{ $order->status == '1' ? 'selected' : '' }}>Đã xác nhận</option>
                                    <option value="2" {{ $order->status == '2' ? 'selected' : '' }}>Đang xử lý</option>
                                    <option value="3" {{ $order->status == '3' ? 'selected' : '' }}>Đang gửi hàng</option>
                                    <option value="4" {{ $order->status == '4' ? 'selected' : '' }}>Đã giao hàng</option>
                                    <option value="5" {{ $order->status == '5' ? 'selected' : '' }}>Đã hoàn thành</option>
                                    <option value="6" {{ $order->status == '6' ? 'selected' : '' }}>Đã huỷ</option>
                                    <option value="7" {{ $order->status == '7' ? 'selected' : '' }}>Đang hoàn tiền</option>
                                </select>
                                <button type="submit" class="btn btn-primary" style="background-color:#000" >Cập nhật</button>
                            </div>
                        </form>
                    </td>
                    <td class="center border-cell">
                        <a href="{{ url('/blog/detail_order') }}/{{ $order->id }}">
                            <i class="fa fa-list" style="font-size:24px; color:#000"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Assuming the form has an ID of "statusForm" and the select element has an ID of "statusSelect"
        $('#statusSelect').change(function () {
            $('#statusForm').submit();
        });
    });
</script>
<style>
    /* Add appropriate styling based on your design */
.form-group {
    margin-bottom: 10px; /* Adjust as needed */
}

.role {
    /* Add styles for the select element */
    width: 50%; /* Adjust as needed */
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn {
    /* Add styles for the button */
    padding: 10px 15px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn:hover {
    /* Add hover styles for the button */
    background-color: #45a049;
}

    /* CSS cho dropdown */
    .select-container {
        position: relative;
    }

    .select-container select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* CSS cho dropdown khi mở */
    .select-container.select-open select {
        border-color: #007bff;
        box-shadow: 0px 0px 5px 0px #007bff;
    }

    .border-cell, .table {
        border: 1px solid #000; /* Màu và độ dày của viền cho các ô trong cột */
    }
    .center{
        text-align: center;
    }

    .table .title {
        text-align: center;
        border: 1px solid #000;
        font-weight: bold; /* In đậm chữ trên title */
    }

    .paginate svg{
        width: 20px;
    }
    .table{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
        height: max-content;
        background-attachment: fixed;
        background-position: center;
        border-radius: 2%;
        margin-left: 0%;
    }
    .alert{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
    }
    h2{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
        font-size: 40pt;
        margin-left: 35%;
    }
    .order {
        margin-bottom: 10px;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
    }

    .role {
        margin-left: 10px;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
    }

</style>
{{-- @section('scripts')
    <script>
        $(document).ready(function () {
            $('.status').change(function () {
                var selectElement = $(this); // Store the reference

                var orderId = selectElement.data('order-id');
                var status = selectElement.val();

                $.ajax({
                    url: '/blog/update-order-status',
                    method: 'POST',
                    data: {
                        id: orderId,
                        status: status
                    },
                    success: function (response) {
                        selectElement.val(status); // Set the select value
                        alert(response.message); // Display a success message
                    },
                    error: function (error) {
                        console.error(error); // Log errors to the console
                    }
                });
            });
        });
    </script>
@endsection --}}

