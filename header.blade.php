<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome to Perfume.vn</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="{{ url('assets') }}/ckeditor5/sample/stylesheet" type="text/css" href="styles.css">
	<link rel="icon" type="image/png" href="https://c.cksource.com/a/1/logos/ckeditor5.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>
<body>
    <nav class=" p d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start navbar navbar-expand-sm bg-black" >
        <a class="navbar-brand text-white" href="#"><h4>PERFUME.VN</h4></a>
        @if (Auth::user())
        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link  " aria-current="page" href="{{ url('blog/client/') }}">Trang chủ</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link   " href="{{ url('/introduce') }}">Giới thiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link   " href="/blog/client/sort_man">Nước hoa Nam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link   " href="/blog/client/sort_woman">Nước hoa Nữ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link   " href="#">Nước hoa Unisex</a>
            </li>
            <li class="nav-item">
                <a class="nav-link   " href="{{ url('/information') }}">Kiến thức</a>
            </li>
            <li class="nav-item">
                <a class="nav-link   " href="{{ url('/contact') }}">Liên hệ</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/blog/client/cart') }}" class="btn luxurious-cart-button"> <i class="fas fa-shopping-cart"></i></a>
                <a href="{{ url('/blog/client/order') }}" class="btn luxurious-cart-button"><i class='fas fa-receipt'></i></a>
                <a href="{{ url('/logout') }}" class="btn luxurious-button mx-2"><i class="fas fa-sign-in-alt"></i> </a>
            </li>
            <li class="nav-item">
                <p class="nav-link">{{ Auth::user()->name }}</p>
            </li>
            <li class="nav-item">
                <form action="{{ url('blog/client/') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" name="search"  class="form-control" value="" placeholder="Nhập từ khóa.." aria-label="search" aria-describedby="basic-addon2">
                    </div>
                </form>
            </li>
        </ul>
        @endif
    </nav>
</body>
<style>
    .navbar-brand {
        border: 1px solid rgb(255, 255, 171);
        padding: 10px 10px;
        border-radius: 12px;
    }
    .body{
        height: max-content ;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        width: 100%;
    }
    .nav-link,.luxurious-button {
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        background-color: black;
        color: white;
        border: none;
        padding: 15px 25px;
        font-size: 16px;
        border-radius: 8px;
        margin-left: 1px;
    }
    .luxurious-cart-button {
        background-color: black;
        color: white;
        border: none;
        padding: 15px 25px;
        font-size: 16px;
        border-radius: 8px;
    }
    .luxurious-cart-button:hover,.luxurious-button:hover,.nav-link:hover{
        background: white;
        color: black;
    }
</style>

