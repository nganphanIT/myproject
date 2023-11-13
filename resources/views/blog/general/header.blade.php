<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Perfume.vn</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="{{ url('assets') }}/ckeditor5/sample/stylesheet" type="text/css" href="styles.css">
	<link rel="icon" type="image/png" href="https://c.cksource.com/a/1/logos/ckeditor5.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>
<body>
    <nav class=" p-4 d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start navbar navbar-expand-sm bg-black" >
        <a class="navbar-brand text-white" href="#"><h4>PERFUME.VN</h4></a>
        @if (Auth::user())
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a href="{{ url('blog/blog/') }}" class="nav-link   ">Danh sách sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('blog/category') }}" class="nav-link   ">Danh mục </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('role') }}" class="nav-link    ">Phân quyền</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('blog/blog/create') }}" class="nav-link    ">Thêm mới sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('blog/category/create') }}" class="nav-link    ">Thêm mới danh mục</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('blog/chat/conversations') }}" class="nav-link    ">Tin nhắn chờ</a>
                </li>
                <li class="nav-item">
                    <p class="nav-link">{{ Auth::user()->name }}</p>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="btn luxurious-button mx-2"><i class="fas fa-sign-out-alt mr-2"></i></a>
                </li>
            </ul>
        @endif
    </nav>
</body>

<style>
    /* Custom CSS */
    .navbar-brand {
        border: 1px solid rgb(255, 255, 171);
        padding: 10px 10px; /* Adjust padding as needed */
        border-radius: 12px;
    }

    .form-control{
        margin-top: 5%;
        margin-left: 5px;
    }
    .body{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    .nav-link,.luxurious-button {
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        background-color: black;
        color: white;
        border: none;
        padding: 15px 30px;
        font-size: 18px;
        border-radius: 8px;
        transition: all 0.3s ease;
        margin-left: 2px;
    }
    .luxurious-cart-button {
        background-color: black;
        color: white;
        border: none;
        padding: 15px 30px;
        font-size: 18px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .luxurious-button:hover, .nav-link:hover,.luxurious-cart-button:hover {
        background-color: white;
        color: black;
    }
    </style>
  <script>
    document.getElementById('cartButton').addEventListener('click', function() {
        alert('Cart button clicked!');
    });
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
    </script>

