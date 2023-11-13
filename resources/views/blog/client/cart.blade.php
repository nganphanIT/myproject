
<style>
    td button {
        width: 30px; /* Set the width of the buttons */
        height: 30px;
        background-color: white;
        color: black;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px;

    }
    .btn {
        width: 50px; /* Set the width of the buttons */
        height: 50px;
        background-color: white;
        color: black;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;


    }
    .btn:hover {
        background-color: #000000; /* Set the background color of the buttons */
        color: white;


    }
    /* Change button background color on hover */
    td button:hover {
        background-color: #000000; /* Set the background color of the buttons */
        color: white;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;


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
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }
    .content{
        margin-left: -15%;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }
    .btn-pay{
        width: 150%;
        height: 80px;
        font-size: 25pt;
        margin-left: 45%;
        background-color: #000000; /* Set the background color of the buttons */
        color: white;
        border: 1px solid #ccc;
        border-radius: 5px;
        /* padding: 2%; */
        text-align: center;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    h2{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    .customer-form {
        position: absolute;
        margin-left: 45%;
        top: 70%;
        width: 60%;
        transform: translate(-50%, -50%);
        background-color: white;
        display: none; /* Initially hide the form */
        padding: 5%;
        border: 1px solid #7c7878;
        border-radius: 5px;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .customer-form h2 {
        text-align: center;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .customer-form form {
        display: flex;
        flex-direction: column;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .customer-form label {
        margin-bottom: 10px;
        font-weight: bold;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
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
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
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
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .customer-form button[type="submit"]:hover {
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
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

</style>
@extends('blog.client.master')
@if(session('success'))
    <script>
        // Hiển thị hộp thoại xác nhận (confirm dialog)
        if(confirm("{{ session('success') }}")) {
            // Nếu người dùng nhấn OK, reload trang
            window.location.href = "{{ url()->current() }}";
        }
    </script>
@endif
@section('content')
    <div class="content">
        <h2>Giỏ Hàng Của Bạn</h2>
        <script>
            let totalAmount = 0;
            function calculateTotal(price, quantity, isChecked, discountCode) {
                if (discountCode === "SALE") {
                    let total = price * quantity * 0.9;
                    if (isChecked) {

                        totalAmount += total;
                    } else {
                        totalAmount -= total;
                    }

                    updateTotal();
                }
                else{
                    let total = price * quantity;
                    if (isChecked) {
                        totalAmount += total;
                    } else {
                        totalAmount -= total;
                    }

                    updateTotal();
                }
            }
            console.log(totalAmount);
            function updateTotal() {
                let totalElement = document.getElementById('totalAmount');
                totalElement.innerText = 'Tổng cộng: ' + totalAmount.toLocaleString() + ' đồng';
            }

          function handleCheckboxChange(index, price, quantity) {
                let discountCode = document.querySelector('input[type="text"]').value;
                let checkbox = document.getElementsByName("check")[index];
                calculateTotal(price, quantity, checkbox.checked, discountCode);
            }

            function calculateTotale() {
                let discountCode = document.querySelector('input[type="text"]').value;
                let price = document.getElementById('totalPrice'); // Giá sản phẩm (đổi giá trị này thành giá thực của sản phẩm)
                let quantity = 1; // Số lượng sản phẩm (đổi giá trị này thành số lượng thực của sản phẩm)
                let isChecked = true; // Đây là giả định, bạn cần thiết lập giá trị này dựa trên trạng thái của checkbox hoặc nút radio
                calculateTotal(price, quantity, isChecked, discountCode);
            }

            function openForm() {
                var form = document.getElementById('customerForm');
                form.style.display = 'block'; // Set the form to visible
            }
            function closeForm() {
                document.getElementById('customerForm').style.display = 'none';
            }
        </script>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">STT</th>
                    <th scope="col">Ảnh Sản Phẩm</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Tổng Cộng</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $index => $cartItem)
                    <tr>
                        <th>
                            <input type="checkbox" name="check" value="0"
                        onchange="handleCheckboxChange({{ $loop->iteration - 1 }}, {{ $cartItem->product->price }}, {{ $cartItem->quantity }})">
                        </th>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="{{ url('/') }}/{{ $cartItem->product->image }}" alt=""
                            width="200px" height="200px" class="center" ></td>
                        <td style="width:300px">{{ $cartItem->product->title }}</td>
                        <td>
                            @if ($cartItem->product->sale_off!=0)
                                <p style="display: inline; text-decoration: line-through; margin-left: 5px;">{{ number_format($cartItem->product->price, 0) }} đồng</p> <br>
                                <p style="display: inline; color: red; font-weight: bold; margin-left: 5px;">{{ number_format($cartItem->product->price - ($cartItem->product->price * $cartItem->product->sale_off / 100)) }} đồng</p>
                            @else
                                {{ number_format($cartItem->product->price) }} đồng
                            @endif

                        </td>
                        <td>
                            <button onclick="decreaseQuantity({{ $cartItem->id }})">-</button>
                            <input type="number" class="quantity-input" data-cart-item="{{ $cartItem->id }}"
                            data-user-id="{{ $cartItem->user_id }}" data-product-id="{{ $cartItem->product_id }}"
                            value="{{ $cartItem->quantity }}" min="1">
                            <button onclick="increaseQuantity({{ $cartItem->id }})">+</button>
                        </td>


                        @if ($cartItem->product->sale_off!=0)
                            <td id="totalPrice{{ $cartItem->id }}">
                            {{ number_format(($cartItem->product->price - ($cartItem->product->price * $cartItem->product->sale_off / 100))* $cartItem->quantity)}}  đồng

                            </td>
                        @else
                            <td id="totalPrice{{ $cartItem->id }}">
                                {{ number_format($cartItem->product->price * $cartItem->quantity)}} đồng
                            </td>
                        @endif
                        <td>
                            <button class="btn">
                                <a href="javascript:(0)" onclick="return confirmDelete('{{ url('/blog/client/cart/remove') }}/{{ $cartItem->user_id }}/{{ $cartItem->id }}','{{ trans('general.confirmDelete') }}')">
                                <i class="fa fa-trash-o" style="font-size:24px; color:black"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            <p class="fw-bold">Nhập mã giảm giá:
                <input type="text" placeholder="Nhập mã giảm giá" oninput="calculateTotal()">
            </p>
            <p class="fw-bold" id="totalAmount">Tổng cộng: 0 đồng</p>
            <a href="#" onclick="openForm()">
                <button class="btn-pay" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">ĐẶT HÀNG</button>
            </a>
        </div>
        <div id="customerForm" class="customer-form">
            <button class="close" onclick="closeForm()">
                <i class="fa fa-close"></i>
            </button>
            <h2>Thông Tin Khách Hàng</h2>
            <form action="" id="customerInfoForm" method="POST">
                @csrf
                <label for="full_name">Họ và Tên:</label>
                <input type="text" id="full_name" name="full_name" required><br>

                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" required><br>

                <label for="address">Địa chỉ:</label>
                <textarea id="address" name="address" rows="3" required></textarea><br>

                <label for="note">Ghi chú:</label>
                <input type="text" id="note" name="note"><br>

                <button type="submit">XÁC NHẬN ĐƠN HÀNG</button>
            </form>
        </div>

    </div>
@endsection
<script>
    function decreaseQuantity(cartItemId, productId) {
        updateCartItemQuantity(cartItemId, productId, -1);
    }
    function increaseQuantity(cartItemId, productId) {
        updateCartItemQuantity(cartItemId, productId, 1);
    }
    function updateCartItemQuantity(cartItemId, productId, quantityChange) {
        let quantityInput = document.querySelector(`.quantity-input[data-cart-item="${cartItemId}"]`);
        let currentQuantity = parseInt(quantityInput.value);
        let newQuantity = Math.max(1, currentQuantity + quantityChange);
        quantityInput.value = newQuantity;
        updateQuantityOnServer(cartItemId, productId, newQuantity);
    }
    function updateQuantityOnServer(cartItemId, productId, newQuantity) {
        let formData = new FormData();
        formData.append('id', cartItemId);
        formData.append('product_id', productId);
        formData.append('quantity', newQuantity);
        axios.post('/blog/client/update_quantity', formData)
            .then(response => {
                if (response.data.success) {
                    updateTotalAmount();
                    location.reload();
                } else {
                    console.error('Failed to update quantity on the server.');
                }
            })
            .catch(error => {
                console.error('Error updating quantity:', error);
            });
    }
</script>





