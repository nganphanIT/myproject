{{-- <div class="product">
    <h3>Product Name</h3>
    <p>Product Description</p>

</div> --}}
@extends('blog.general.master')
@section('content')
    <h3>DANH SÁCH SẢN PHẨM</h3>
    @foreach ($blog as $blog)
    <div class="flex-container">
        <td><img src="{{ url('/') }}/{{ $blog->image }}" alt=""
            width="200px" height="200px" class="center" ></td> <br>
        <td><b>{{ $blog->title }}</b></td> <br>
        <td><b>Giá: </b>{{ number_format($blog->price,0)}} đồng</td> <br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="btn-center">
            <div class="dot" id="dot_01" onclick="dot_01()"></div>
            <button class="btn-fa"><i style="font-size:24px;" class="fa" >&#xf07a;</i></button>
            <button class="btn btn-primary like-button" data-product-id="1">Like</button>
            <a href="{{ url('blog/client/detail') }}/{{ $blog->id }}">
                <button class="btn-fa"><i style="font-size:24px" class="fa">&#xf06e;</i></button>
            </a>
        </div>
    </div>
    @endforeach
@endsection

<!-- Include Bootstrap CSS and other dependencies -->

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.querySelector('.like-button').addEventListener('click', function() {
    // Lấy user_id và product_id từ nguồn nào đó (ví dụ: từ input, từ cookie, ...)
    const user_id = 1; // Đây chỉ là ví dụ, bạn cần lấy user_id từ nguồn thực tế
    const product_id = 1; // Đây chỉ là ví dụ, bạn cần lấy product_id từ nguồn thực tế

    // Gửi yêu cầu POST để lưu thông tin người dùng thích sản phẩm
    axios.post('/like', {
        user_id: users->id,
        product_id: blog->id
    })
    .then(response => {
        console.log(response.data);
        // Xử lý phản hồi nếu cần thiết (ví dụ: cập nhật giao diện người dùng)
    })
    .catch(error => {
        console.error(error);
    });
});
</script>
