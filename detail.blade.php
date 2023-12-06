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
        <img src="{{ url('/') }}/{{ $blog->image }}" id="myimage">
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
@endsection
@section('content')
    <div class="container">
        {{-- <h1>CHI TIẾT SẢN PHẨM</h1> --}}
        <div class="row">
            <div class="col-10">
                <table class="table table-stripe">
                    @if (!$blog->sale_off)
                        <p style="font-size:35pt"><strong>{{ $blog->title }}</strong> </p> <br>
                        <p style="color: red;font-style:italic; font-size:25pt">{{ number_format($blog->price,0)}} đồng</p>
                        <p><strong>Thương hiệu: </strong> {{ $category->title }}</p>
                        <p><strong>Giới tính: </strong>{{ $blog->sex }}</p>
                        <p><strong>Gọi đặt mua: </strong> 0989 888 888</p>
                        <p><strong>Vận chuyển: </strong> Freeship Hà Nội và TPHCM; Những thành phố khác đồng giá 30 000 đồng / 1 đơn hàng</p>
                        <p><i class='fas fa-user-shield' style='font-size:34px'></i>  Đảm bảo uy tín chất lượng</i></p>
                        <p><i class='far fa-check-square' style='font-size:24px'></i>   Miễn phí đổi trả trong vòng 7 ngày</p>
                        <p><i class='far fa-check-square' style='font-size:24px'></i>   Kiểm tra trước khi nhận hàng</p>
                        <p><i class='far fa-check-square' style='font-size:24px'></i>   Hoàn tiền nếu phát hiện hàng giả</p>
                        <a href="{{ url('blog/client/cart/add') }}/{{ $blog->id }}">
                            <button style="font-size:24px; background-color:black; color:white " class="btn-add   btn-fa">
                                THÊM VÀO GIỎ HÀNG
                            </button>
                        </a> <br>
                        <div  class="btn-flex">
                            <form id="like-form" action="{{ url('blog/client/like') }}/{{ $blog->id }}" method="post">
                                @csrf
                                <button id="like-btn" id="like-btn-{{ $blog->id }}" type="submit" class="btn-fa" onclick="toggleLike() onclick="toggleLike({{ $blog->id }})">
                                    <i id="like-icon-{{ $blog->id }}" class='far fa-heart' style="font-size:26px; color:{{ App\Models\Like::where(['user_id' => Auth::user()->id, 'product_id' => $blog->id])->exists() ? 'red' : 'black' }}"></i>
                                </button>
                            </form>
                            <button class="btn-fa">
                                {{ App\Models\Like::where('product_id', $blog->id)->count() }} Likes
                            </button>
                        </div>
                    @else
                        <p style="font-size:35pt"><strong>{{ $blog->title }}</strong> </p> <br>
                        <p>
                            <strong >Giá cũ:</strong>
                            <p style="text-decoration: line-through;"> {{ number_format($blog->price, 0) }} đồng</p>
                        </p>
                        <p style="color: red;font-style:italic; font-size:25pt">{{ number_format($blog->price-($blog->price*$blog->sale_off/100),0)}} đồng</p>
                        <p><strong>Thương hiệu: </strong> {{ $category->title }}</p>
                        <p><strong>Giới tính: </strong>{{ $blog->sex }}</p>
                        <p><strong>Gọi đặt mua: </strong> 0989 888 888</p>
                        <p><strong>Vận chuyển: </strong> Freeship Hà Nội và TPHCM; Những thành phố khác đồng giá 30 000 đồng / 1 đơn hàng</p>
                        <p><i class='fas fa-user-shield' style='font-size:34px'></i>  Đảm bảo uy tín chất lượng</i></p>
                        <p><i class='far fa-check-square' style='font-size:24px'></i>   Miễn phí đổi trả trong vòng 7 ngày</p>
                        <p><i class='far fa-check-square' style='font-size:24px'></i>   Kiểm tra trước khi nhận hàng</p>
                        <p><i class='far fa-check-square' style='font-size:24px'></i>   Hoàn tiền nếu phát hiện hàng giả</p>
                        <a href="{{ url('blog/client/cart/add') }}/{{ $blog->id }}">
                            <button style="font-size:24px; background-color:black; color:white " class="btn-add btn-fa">
                                THÊM VÀO GIỎ HÀNG
                            </button>
                        </a> <br>
                        <div  class="btn-flex">
                            <form id="like-form" action="{{ url('blog/client/like') }}/{{ $blog->id }}" method="post">
                                @csrf
                                <button id="like-btn" id="like-btn-{{ $blog->id }}" type="submit" class="btn-fa" onclick="toggleLike() onclick="toggleLike({{ $blog->id }})">
                                    <i id="like-icon-{{ $blog->id }}" class='far fa-heart' style="font-size:26px; color:{{ App\Models\Like::where(['user_id' => Auth::user()->id, 'product_id' => $blog->id])->exists() ? 'red' : 'black' }}"></i>
                                </button>
                            </form>
                            <button class="btn-fa">
                                {{ App\Models\Like::where('product_id', $blog->id)->count() }} Likes
                            </button>
                        </div>
                    @endif
                </table>
                <div class="detail">
                    <hr>
                    <h3>Thông tin chi tiết</h3>
                    <p> {!! $blog->description !!}</p>
                    <br>
                    <p> {!! $blog->content !!}</p> <br>
                </div>
                <div class="ad">
                    <hr>
                    <h3>Sản phẩm tương tự</h3>
                    <div class="flex-container">
                        @foreach ($randomBlogs as $value)
                        <div class="border">
                            @if($value->sale_off == 0)
                                <div class="new-icon">New</div> <br>
                                <img class="img-mini"  src="{{ url('/') }}/{{ $value->image }}" alt="" >
                                <p><b>{!! Str::limit($value->title, 30) !!}</b></p>
                                <p><strong>Giá: </strong>{{ number_format($value->price, 0) }} đồng</p>
                                <p style="color:white"><strong>Giá: </strong>{{ number_format($value->price, 0) }} đồng</p>

                            @else
                                <div class="sale-off-icon">{{$value->sale_off}}%</div> <br>
                                <img class="img-mini"   src="{{ url('/') }}/{{ $value->image }}" alt="" width="300px" height="280px">
                                <p><b>{!! Str::limit($value->title, 30) !!}</b></p>
                                <p style="text-decoration: line-through;"><strong>Giá cũ:</strong> {{ number_format($value->price, 0) }} đồng</p>
                                <p style="color: red"><strong>Giá mới: </strong>{{ number_format($value->price - ($value->price * $value->sale_off / 100)) }} đồng</p>
                            @endif
                            <div class="btn-container">
                                <a href="{{ url('blog/client/cart/add') }}/{{ $value->id }}">
                                    <button class="btn-fa">
                                        <i style="font-size:26px; color:black" class="fa fa-shopping-cart"></i>
                                    </button>
                                </a>
                                <a href="{{ url('blog/client/detail') }}/{{ $value->id }}">
                                    <button class="btn-fa">
                                    <i class="fas fa-bars" style="font-size:26px; color:black"></i>
                                    </button>
                                </a>
                                <form id="like-form" action="{{ url('blog/client/like') }}/{{ $value->id }}" method="post">
                                    @csrf
                                    <button id="like-btn" id="like-btn-{{ $value->id }}" type="submit" class="btn-fa" onclick="toggleLike() onclick="toggleLike({{ $value->id }})">
                                        <i id="like-icon-{{ $value->id }}" class='far fa-heart' style="font-size:26px; color:{{ App\Models\Like::where(['user_id' => Auth::user()->id, 'product_id' => $value->id])->exists() ? 'red' : 'black' }}"></i>
                                    </button>
                                </form>
                                <button class="btn-fa">
                                    {{ App\Models\Like::where('product_id', $value->id)->count() }} Likes
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
<style>

     .new-icon {
        height: 50px;
        width: 50px;
        background-color: green;
        border-radius: 30%;
        display: inline-flex; /* Use inline-flex to center vertically and horizontally */
        align-items: center; /* Center vertically */
        justify-content: center; /* Center horizontally */
        font-weight: bold;
        color: white;
        z-index: 9;
        top: 30%;
    }
    .sale-off-icon{
        height: 50px;
        width: 50px;
        background-color: red;
        border-radius: 30%;
        display: inline-flex; /* Use inline-flex to center vertically and horizontally */
        align-items: center; /* Center vertically */
        justify-content: center; /* Center horizontally */
        font-weight: bold;
        color: white;
        z-index: 9;
        top: 30%;
    }
    .btn-fa-like{
        padding: 0%;
        width: 50px;
        height: 50px;
        border: solid 1px rgb(179, 178, 178);
        border-radius: 5px;
    }
    .btn-fa {
        width: 50px;
        height: 50px;
        padding-bottom: 0%;
        border: solid 1px rgb(179, 178, 178);
        border-radius: 5px;
    }
    img:hover, .btn-fa:hover {
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    }
    .btn-flex{
        display: flex;
        margin-top: 5px;
        margin-right: 10px;
        padding-right: 30px;
    }
    .btn-add{
        width: fit-content;
    }
    .btn-container {
        display: flex;
        margin: 10%;
        justify-content: space-between;
    }
    .flex-container {
        display: flex;
        justify-content: space-between; /* or other flex properties as needed */
    }
    .ad,.detail{
        margin-left: -50%;
        font-size: 13pt;
        width: 180%;
        justify-content: space-around;
    }
    .promo {
        background: #ccc;
        padding: 3px;
        font-size: 13pt;
    }
    .expire {
        color: red;
    }
    h1{
        text-align: center;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    .center{
        margin-left: 30%;
    }

    .table{
       font-size: 13pt;
       background-color: white;
       background-size: cover;
       height: max-content;
       background-attachment: fixed;
       background-position: center;
       border-radius: 2%;
   }
    .img-magnifier-container {
      position:relative;
      width: 500px;
      margin-left: -20%;
    }

    .img-magnifier-glass {
      position: absolute;
      border: 3px solid #000;
      border-radius: 50%;
      cursor: none;
      width: 100px;
      height: 100px;
    }
    img {
        border: 1px solid #b6b4b4;
        border-radius: 4px;
        padding: 5px;
        width:380px;
        height:430px;
        margin-left: 0%;
    }
    .img-mini{
        margin-left: 5px;
        width: 250px;
        height: 200px;
    }

    img:hover {
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    }
</style>
