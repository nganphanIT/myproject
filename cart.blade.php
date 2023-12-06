<style>
    td button {
        width: 30px;
        /* Set the width of the buttons */
        height: 30px;
        background-color: white;
        color: black;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px;

    }

    .btn {
        width: 50px;
        /* Set the width of the buttons */
        height: 50px;
        background-color: white;
        color: black;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;


    }

    .btn:hover {
        background-color: #000000;
        /* Set the background color of the buttons */
        color: white;


    }

    /* Change button background color on hover */
    td button:hover {
        background-color: #000000;
        /* Set the background color of the buttons */
        color: white;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;


    }

    .quantity-input::-webkit-outer-spin-button,
    .quantity-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .quantity-input {
        width: 50px;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }

    .content {
        margin-left: -15%;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }

    .btn-pay {
        width: 150%;
        height: 80px;
        font-size: 25pt;
        margin-left: 45%;
        background-color: #000000;
        /* Set the background color of the buttons */
        color: white;
        border: 1px solid #ccc;
        border-radius: 5px;
        /* padding: 2%; */
        text-align: center;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .btn-inf {
        /* width: 150%;
        height: 80px;
        font-size: 25pt; */
        margin-left: 5%;
        background-color: #000000;
        /* Set the background color of the buttons */
        color: white;
        border: 1px solid #ccc;
        border-radius: 5px;
        /* padding: 2%; */
        text-align: center;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    h2 {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .customer-form {
        position: absolute;
        margin-left: 45%;
        top: 70%;
        width: 60%;
        transform: translate(-50%, -50%);
        background-color: white;
        display: none;
        /* Initially hide the form */
        padding: 5%;
        border: 1px solid #7c7878;
        border-radius: 5px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .customer-form h2 {
        text-align: center;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .customer-form form {
        display: flex;
        flex-direction: column;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .customer-form label {
        margin-bottom: 10px;
        font-weight: bold;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .customer-form input[type="text"],
    .customer-form input[type="email"],
    .customer-form input[type="tel"],
    .customer-form textarea,
    .customer-form input[type="number"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .customer-form button[type="submit"] {
        width: 400px;
        padding: 10px;
        background-color: black;
        color: white;
        border: none;
        margin-left: 23%;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .customer-form button[type="submit"]:hover {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        background-color: rgb(119, 119, 119);
        color: white;
        font-size: 16px;
        font-weight: bold;
        border: 1px solid #5f5f5f;
        border-radius: 5px;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        cursor: pointer;
    }

    .customer-form.active {
        opacity: 1;
        z-index: 2;
        transition: opacity 0.3s ease;
    }
    input[type=text], address,  textarea {
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
    }
    #orderTable {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        #orderTable th, #orderTable td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #orderTable th {
            background-color: #f2f2f2;
        }

        #totalCell {
            font-weight: bold;
        }
        button {
            color: #fff; /* Text color */
            background-color: #000; /* Background color */
            border: 1px solid #fff; /* Border color */
        }

        button:hover {
            color: #000; /* Text color on hover */
            background-color: #fff; /* Background color on hover */
            border: 1px solid #000; /* Border color on hover */
        }

</style>
@extends('blog.client.master')
@if (session('success'))
    <script>
        if (confirm("{{ session('success') }}")) {
            window.location.href = "{{ url()->current() }}";
        }
    </script>
@endif
@section('content')
    <div class="content">
        <h2>Địa chỉ giao hàng</h2>
        @if ($customerInfo)
            <p><strong>Họ và Tên:</strong> {{ $customerInfo->full_name }}</p>
            <p><strong>Số Điện Thoại:</strong> {{ $customerInfo->phone }}</p>
            <p><strong>Địa Chỉ:</strong> {{ $customerInfo->address }}</p>
            <p><strong>Ghi Chú:</strong> {{ $customerInfo->note }}</p>
        @else
            <a href="#" onclick="openForm()">
                <button class="btn-inf" style="width:auto;">Tạo thông tin</button>
            </a>
        @endif
        <h2>Giỏ Hàng Của Bạn</h2>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">STT</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Tổng Cộng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $index => $cartItem)
                    <tr>
                        <th>
                            <input type="checkbox" name="check" value="{{ $index }}"
                                price="{{ $cartItem->product->price  }}"
                                product_id="{{ $cartItem->product_id}}"
                                quantity ="{{ $cartItem->quantity }}"
                                sale_off = "{{ $cartItem->product->sale_off }}"
                                title="{{ $cartItem->product->title }}"
                                onchange="handleCheckboxChange({{ $loop->iteration - 1 }}, {{ $cartItem->product->price }}, {{ $cartItem->quantity }}, {{ $cartItem->product->sale_off }})">
                        </th>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="{{ url('/') }}/{{ $cartItem->product->image }}" alt="" width="200px"
                                height="200px" class="center"></td>
                        <td style="width:300px">{{ $cartItem->product->title }}</td>
                        <td>
                            @php
                                $originalPrice = $cartItem->product->price;
                                $discountedPrice = $cartItem->product->price - ($cartItem->product->price * $cartItem->product->sale_off) / 100;
                            @endphp

                            @if ($cartItem->product->sale_off != 0)
                                <p style="display: inline; text-decoration: line-through; margin-left: 5px;">
                                    {{ number_format($originalPrice, 0) }} đồng</p> <br>
                                <p style="display: inline; color: red; font-weight: bold; margin-left: 5px;">
                                    {{ number_format($discountedPrice) }} đồng</p>
                            @else
                                {{ number_format($originalPrice) }} đồng
                            @endif
                        </td>

                        <form
                            action="{{ url('/update-cart-quantity', [$cartItem->id, $cartItem->user_id, $cartItem->product_id]) }}"
                            method="post">
                            @csrf
                            @method('patch')
                            <td>
                                <button type="submit"
                                    onclick="updateQuantity({{ $cartItem->id }}, {{ $cartItem->product_id }}, -1, {{ $cartItem->product->price }}, {{ $cartItem->product->sale_off }})">-</button>
                                <input type="number" class="quantity-input" data-cart-item="{{ $cartItem->id }}"
                                    data-user-id="{{ $cartItem->user_id }}" data-product-id="{{ $cartItem->product_id }}"
                                    value="{{ $cartItem->quantity }}" min="1" name="quantity"
                                    onchange="updateQuantity({{ $cartItem->id }}, {{ $cartItem->product_id }}, this.value, {{ $cartItem->product->price }}, {{ $cartItem->product->sale_off }})">
                                <button type="submit"
                                    onclick="updateQuantity({{ $cartItem->id }}, {{ $cartItem->product_id }}, 1, {{ $cartItem->product->price }}, {{ $cartItem->product->sale_off }})">+</button>
                            </td>
                        </form>
                        @php
                            $totalPrice = 0;
                            if ($cartItem->product->sale_off != 0) {
                                $totalPrice = ($cartItem->product->price - ($cartItem->product->price * $cartItem->product->sale_off) / 100) * $cartItem->quantity;
                            } else {
                                $totalPrice = $cartItem->product->price * $cartItem->quantity;
                            }
                        @endphp
                        <td id="totalPrice{{ $cartItem->id }}" data-price="{{ $totalPrice }}">
                            {{ number_format($totalPrice) }} đồng
                        </td>
                        <td>
                            <a href="{{ url('blog/client/cart/remove', ['user_id' => $cartItem->user_id, 'id' => $cartItem->id]) }}"
                                onclick="return confirm('Bạn có chắc xóa sản phẩm?')">
                                <i class="fa fa-trash" style="color: #000000; size:45pt" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            <p class="fw-bold">Nhập mã giảm giá:
                <input type="text" placeholder="Nhập mã giảm giá" oninput="applyDiscount()">
            </p>
            @csrf
            <p class="fw-bold" id="totalAmount">Số tiền phải trả: 0 đồng</p>
            <button  class="btn-pay"   style="width:auto;" type="submit" id="confirm_order">ĐẶT HÀNG</button>

        </div>
        <div id="customerForm" class="customer-form">
            <button class="close" onclick="closeForm()">
                <i class="fa fa-close"></i>
            </button>
            <h2>Thông Tin Khách Hàng</h2>
            <form action="{{ url('/blog/client/customer-info/store') }}" method="POST" id="customerInfoForm">
                @csrf
                <label for="full_name">Họ và Tên:</label>
                <input type="text" id="full_name" name="full_name" required><br>

                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" required><br>

                <label for="address">Địa chỉ:</label>
                <textarea id="address" name="address" rows="3" required></textarea><br>

                <label for="note">Ghi chú:</label>
                <input type="text" id="note" name="note"><br>

                <button type="submit">LƯU THÔNG TIN</button>
            </form>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title" id="exampleModalLabel">Thông tin giao hàng</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="reloadPage()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="customerInfoForm">
                    @if ($customerInfo)
                        <label class="fw-bold form-label" for="full_name">Họ và Tên:</label>
                        <input type="text"  class="form-input" id="full_name" name="full_name" required value="{{ $customerInfo->full_name }}"> <br>

                        <label class="fw-bold form-label" for="phone">Số điện thoại:</label>
                        <input type="text"   class="form-input"id="phone" name="phone" required value="{{ $customerInfo->phone }}"> <br>

                        <label class="fw-bold form-label" for="address">Địa chỉ:</label>
                        <textarea class="form-input" id="address" name="address">{{ $customerInfo->address }}</textarea>

                        <label class="fw-bold form-label" for="note">Ghi chú:</label>
                        <textarea class="form-input" id="note" name="note">{{ $customerInfo->note }}</textarea> <br>
                        <br>
                        <div class="modal-header">
                            <h1 class="modal-title" id="exampleModalLabel">Danh sách sản phẩm</h1>
                        </div>

                        <table id="orderTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table> <br> <hr>
                        <div class="form-group">
                            <label for="note" class="fw-bold form-label">Số tiền phải thanh toán:</label>
                            <p style="color: red; font-size: 20pt; font-weight:bold" id="total" name="total" readonly></p>
                        </div>
                    @else
                        <button type="button"  data-bs-dismiss="modal" class="btn-inf"  onclick="document.getElementById('customerForm').style.display='block';  "
                                style="width:auto;">Tạo thông tin</button>
                    @endif
                </form>
            </div>
            <style>
                /* Custom Styles for Vintage Look */
                .btn-vintage {
                    color: #fff; /* Text color */
                    background-color: #000; /* Background color */
                    border: 1px solid #fff; /* Border color */
                    width: 300px;
                    height: 60px;
                    font-size: 20pt;
                    margin-right: 15%;
                }

                .btn-vintage:hover {
                    color: #000; /* Text color on hover */
                    background-color: #fff; /* Background color on hover */
                    border: 1px solid #000; /* Border color on hover */
                }
            </style>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-vintage" onclick="reloadPage()">Đóng</button>
                <button type="button" class="btn btn-primary btn-vintage" id='order_confirm'>Đặt hàng</button>
            </div>

          </div>
        </div>
      </div>
@endsection
<script>
    function reloadPage() {
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        location.reload();
    }
    let totalAmount = 0;

    function handleCheckboxChange(index, originalPrice, quantity, saleOff) {
        let checkbox = document.getElementsByName("check")[index];
        calculateTotal(originalPrice, quantity, checkbox.checked, saleOff);
    }

    function calculateTotal(originalPrice, quantity, isChecked, saleOff) {
        let price = originalPrice - (originalPrice * saleOff / 100);
        let pretotalAmount = totalAmount;

        let total = price * quantity;

        if (isChecked) {
            totalAmount += total;
        } else {
            totalAmount -= total;
        }


        updateTotal();
    }

    function updateQuantity(cartItemId, productId, quantityChange, originalPrice, saleOff, isChecked) {
        let quantityInput = document.querySelector(`.quantity-input[data-cart-item="${cartItemId}"]`);
        let currentQuantity = parseInt(quantityInput.value);
        let newQuantity = Math.max(1, currentQuantity + quantityChange);
        quantityInput.value = newQuantity;
        let priceElement = document.getElementById(`totalPrice${cartItemId}`);
        let price = parseFloat(priceElement.getAttribute('data-price'));
        if (isChecked) {
            calculateTotal(originalPrice, newQuantity, isChecked, saleOff);
        } else {
            calculateTotal(originalPrice, newQuantity, isChecked, saleOff);
            totalAmount -= price * currentQuantity;
            updateTotal();
        }
    }

    function updateTotal() {
        let totalElement = document.getElementById('totalAmount');
        totalElement.innerText = 'Thanh toán: ' + Math.max(0, totalAmount).toLocaleString() + ' đồng';
    }
</script>
<script>
    function openForm() {
        document.getElementById('customerForm').style.display = 'block';
    }

    function closeForm() {
        document.getElementById('customerForm').style.display = 'none';
    }

    function openOrderForm() {
        document.getElementById('orderForm').style.display = 'block';
    }

    function closeOrderForm() {
        document.getElementById('orderForm').style.display = 'none';
    }
    // Use jQuery for simplicity, make sure it's included in your project
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    var baseUrl = "{{ url('/') }}";
</script>
