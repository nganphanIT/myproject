{{-- @section('title')
{{ $blog->title }} = Chi tiết sản phẩm
@stop --}}
@extends('blog.client.master')
@if(session('success'))
    <script>
        if(confirm("{{ session('success') }}")) {
            window.location.href = "{{ url()->current() }}";
        }
    </script>
@endif
@section('sidebar')
<div class="img-magnifier-container">
    <a target="_blank" href="{{ url('/') }}/{{ $blog->image }}">
        <img src="{{ url('/') }}/{{ $blog->image }}" id="myimage"  alt=""width="330px" height="400px">
    </a> <br>
    <script>
        function magnify(imgID, zoom) {
          var img, glass, w, h, bw;
          img = document.getElementById(imgID);
          /*create magnifier glass:*/
          glass = document.createElement("DIV");
          glass.setAttribute("class", "img-magnifier-glass");
          /*insert magnifier glass:*/
          img.parentElement.insertBefore(glass, img);
          /*set background properties for the magnifier glass:*/
          glass.style.backgroundImage = "url('" + img.src + "')";
          glass.style.backgroundRepeat = "no-repeat";
          glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
          bw = 3;
          w = glass.offsetWidth / 2;
          h = glass.offsetHeight / 2;
          /*execute a function when someone moves the magnifier glass over the image:*/
          glass.addEventListener("mousemove", moveMagnifier);
          img.addEventListener("mousemove", moveMagnifier);
          /*and also for touch screens:*/
          glass.addEventListener("touchmove", moveMagnifier);
          img.addEventListener("touchmove", moveMagnifier);
          function moveMagnifier(e) {
            var pos, x, y;
            /*prevent any other actions that may occur when moving over the image*/
            e.preventDefault();
            /*get the cursor's x and y positions:*/
            pos = getCursorPos(e);
            x = pos.x;
            y = pos.y;
            /*prevent the magnifier glass from being positioned outside the image:*/
            if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
            if (x < w / zoom) {x = w / zoom;}
            if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
            if (y < h / zoom) {y = h / zoom;}
            /*set the position of the magnifier glass:*/
            glass.style.left = (x - w) + "px";
            glass.style.top = (y - h) + "px";
            /*display what the magnifier glass "sees":*/
            glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
          }
          function getCursorPos(e) {
            var a, x = 0, y = 0;
            e = e || window.event;
            /*get the x and y positions of the image:*/
            a = img.getBoundingClientRect();
            /*calculate the cursor's x and y coordinates, relative to the image:*/
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            /*consider any page scrolling:*/
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {x : x, y : y};
          }
        }
        </script>
        <script>
            magnify("myimage", 2);
        </script>
</div>
<br><br>
<div class="center" >
    <td style="margin-left: 20%">
        <a href="{{ url('blog/client/cart/add') }}/{{ $blog->id }}">
            <button class="btn-fa">
                <i style="font-size:24px; color:black" class="fa fa-shopping-cart"></i>
            </button>
        </a>
        <a href="{{ url('#') }}/{{ $blog->id }}">
            <button class="btn-fa">
                <i class='far fa-heart' style="font-size:24px; color:black"></i>
            </button>
        </a>
    </td>
</div>
@endsection
@section('content')
    <div class="container">
        <h1>CHI TIẾT SẢN PHẨM</h1>
        <div class="row">
            <div class="col-10">
                <table class="table table-stripe">
                    @if (!$blog->sale_off)
                        <p><strong>Tên sản phẩm: </strong> {{ $blog->title }}</p>
                        <p><strong>Thương hiệu: </strong> {{ $category->title }}</p>
                        <p><strong>Giới tính: </strong>{{ $blog->sex }}</p>
                        <p><strong>Thông tin chi tiết:</strong></p>
                        <p> {!! $blog->description !!}</p>
                        <p> {!! $blog->content !!}</p>
                        <p><strong>Giá: </strong>{{ number_format($blog->price,0)}} đồng</p>
                    @else
                        <p><strong>Tên sản phẩm: </strong> {{ $blog->title }}</p>
                        <p><strong>Thương hiệu: </strong> {{ $category->title }}</p>
                        <p><strong>Giới tính: </strong>{{ $blog->sex }}</p>
                        <p><strong>Thông tin chi tiết:</strong></p>
                        <p> {!! $blog->description !!}</p>
                        <p> {!! $blog->content !!}</p>
                        <p>
                            <strong >Giá cũ:</strong>
                            <p style="text-decoration: line-through;"> {{ number_format($blog->price, 0) }} đồng</p>
                        </p>
                        <p>
                            <strong>Giá đã giảm:</strong>
                            <p style="color: red; font-weight:bold">{{ number_format($blog->price - ($blog->price * $blog->sale_off / 100))}} đồng</p>
                        </p>
                    @endif
                </table>
            </div>
        </div>
    </div>

@endsection
<style>
    .promo {
        background: #ccc;
        padding: 3px;
    }

    .expire {
        color: red;
    }
    h1{
        text-align: center;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        color: #333; /* Set the desired text color */
        text-shadow: 2px 2px 10px gray;
        /* text-shadow: 2px 2px; */
    }
    .center{
        margin-left: 30%;
    }

    .table{
       background-color: white;
       background-size: cover;
       height: max-content;
       background-attachment: fixed;
       background-position: center;
       border-radius: 2%;
   }
   .btn-fa{
        border: none;
        border-radius: 5px;
        padding: 5px;

    }
    .img-magnifier-container {
      position:relative;
    }

    .img-magnifier-glass {
      position: absolute;
      border: 3px solid #000;
      border-radius: 50%;
      cursor: none;
      /*Set the size of the magnifier glass:*/
      width: 100px;
      height: 100px;
    }
    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width:330px;
        height:400px;
        margin-left: 0%;
    }

        img:hover {
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    }
</style>
