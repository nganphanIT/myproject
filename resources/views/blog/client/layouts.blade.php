@extends('blog.client.master')
@section('slideshow')
    <div class="w3-content w3-display-container">

        <img src="https://cdn.media.amplience.net/i/Marc_Jacobs/PERFECTINTENSE_PLP_CS?qlt=70" class="mySlides" alt="">
        <img src="https://i.pinimg.com/originals/ca/1a/19/ca1a19b11d4fa9b7ff838c4da909e129.jpg" alt="" class="mySlides">
        <img src="http://1.bp.blogspot.com/-MyZoCIRqJJw/T34keOHOpvI/AAAAAAAAqPY/gGGtDOD5B3I/s1600/gucci+Flora+2009+billboard.jpg" alt="" class="mySlides">
        <img src="https://1.bp.blogspot.com/-OS8nhFGQFnM/XnTZp9Y5xTI/AAAAAAAC13U/N4aYYzSQMhQzKvOEqNJeqj5z63cs85glACLcBGAsYHQ/w1200-h630-p-k-no-nu/Marc-Jacobs-Daisy-Love-Fragrance-Campaign03.jpg" alt="" class="mySlides">
        <img src="https://theimpression.com/wp-content/uploads/2020/08/Gucci-new-bloom-fall-2020-ad-campaign-the-impression-004-scaled.jpg" alt="" class="mySlides">
        <img src="https://fimgs.net/mdimg/secundar/o.49457.jpg" alt="" class="mySlides">
        <img src="https://www.fashiongonerogue.com/wp-content/uploads/2014/08/karlie-kloss-coco-noir-chanel-ad-campaign01.jpg" alt="" class="mySlides">
        <img src="http://www.theperfumegirl.com/perfumes/fragrances/gucci/gucci-bamboo/images/gucci-bamboo-ad-lg.jpg" alt="" class="mySlides">
        <img src="https://theimpression.com/wp-content/uploads/2020/08/Gucci-new-bloom-fall-2020-ad-campaign-the-impression-003-scaled.jpg" alt="" class="mySlides">
        <img src="https://theimpression.com/wp-content/uploads/2017/04/Marc-Jacobs-Daisy-Fragrance-ad-campaign-the-impression-04.jpg" alt="" class="mySlides">
        <img src="https://fimgs.net/himg/o.104168.jpg" alt="" class="mySlides">
        <img src="http://fimgs.net/images/secundar/o.27504.jpg" class="mySlides" alt="">
        <img src="http://4.bp.blogspot.com/-RcXoTC3bdio/Vd3D-Z6jHPI/AAAAAAAAEvA/edOOrq8RdeE/s1600/hinh-nen-phong-canh-dep-cua-nui-phu-si-nhat-ban-11.jpg" alt="" class="mySlides">
        <img src="https://kimkieuflower.vn/content/images/thumbs/000/0000665_top-10-loai-hoa-pho-bien-duoc-chiet-xuat-thanh-nuoc-hoa.jpeg" alt="" class="mySlides">
    </div>
    <style>
        .mySlides {
            object-fit: fill;
            width: 1300px;
            height: 600px;
            margin-bottom: 3%;
        }
    </style>
    <script>
        var slideIndex = 0;
        carousel();

        function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > x.length) {slideIndex = 1}
        x[slideIndex-1].style.display = "block";
        setTimeout(carousel, 2000); // Change image every 2 seconds
        }
    </script>
@endsection
@section('sidebar')
    <div class="border">
        <div class="col-10">
            <h4>BỘ LỌC</h4>
            <i>Giúp lọc nhanh sản phẩm bạn tìm kiếm</i>
        </div>
        <div class="col-10">
            <h4>Thương hiệu</h4>
            <form action="{{ url('blog/client/') }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" name="search"  class="form-control" value="{{ $search }}" placeholder="Nhập từ khóa.." aria-label="search" aria-describedby="basic-addon2">
                </div>
                <div class=" mb-3">
                    @foreach ($category as $key=>$value)
                        <div>
                            <button type="submit" aria-label="search" aria-describedby="basic-addon2" name="search" class="btn btn-default" value="{{ $value->title }}">
                             <b>{{ $value->title }}</b>
                            </button> <br>
                        </div>
                     @endforeach
                </div>
            </form>
            <form action="{{ url('blog/client/') }}" method="get">
                <h4>Giá sản phẩm</h4>
                <div class="col-10">
                    <div>
                        <label>
                            <input type="radio" name="price" value="20000000" onclick="this.form.submit()">  Dưới 20.000.000
                        </label>
                        <label>
                            <input type="radio" name="price" value="10000000" onclick="this.form.submit()">  Dưới 10.000.000
                        </label>
                        <label>
                            <input type="radio" name="price" value="5000000" onclick="this.form.submit()">  Dưới 5.000.000
                        </label>
                        <label>
                            <input type="radio" name="price" value="3000000" onclick="this.form.submit()">  Dưới  3.000.000
                        </label>
                        <label>
                            <input type="radio" name="price" value="2000000" onclick="this.form.submit()">  Dưới  2.000.000
                        </label>
                        <label>
                            <input type="radio" name="price" value="1000000" onclick="this.form.submit()"> Dưới 1.000.000
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
<style>
    .paginate svg{
        width: 20px;
    }
    .d-flex{
        justify-content: space-between;
        display: flex;
        flex-flow: row wrap;
        margin: 5px;
        padding: 5px;
    }
    .flex-container{
        background-color: white;
        width: 300px;
        height: max-content;
        display: block;
        margin: 2px;
        margin-top: 3px;
    }
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 80%;
    }
    .border{
        border: 2px solid rgb(216, 216, 216);
        border-radius: 5px;
        padding: 5px;
    }
    .btn-fa{
        border: 2px solid rgb(121, 117, 117);
        border-radius: 5px;
        padding: 5px;

    }
    .btn-center{
        align-items: center;
        margin-left: 25%;
    }
    .stars input {
        position: absolute;
        left: -999999px;
    }

    .stars a {
        display: inline-block;
        font-size: 0;
        text-decoration: none;
    }

    .stars a:before {
        position: relative;
        font-size: 18px;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        display: block;
        content: "\f005";
        color: #9e9e9e;
    }

    .stars a:hover:before,
    .stars a:hover ~ a:before,
    .stars a.active:before,
    .stars a.active ~ a:before {
        color: orange;
    }
    #chat-form {
        background-color: #fff; /* White background for the form */
        color: #333; /* Dark text color */
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .chat-Popup {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        z-index: 9;
        box-sizing: border-box;
        border: 2px solid black;
        resize: none;
        background-color: #f9f1e7; /* Vintage cream background for the chat popup */
        color: #000; /* Dark text color */
        border-radius: 10px; /* Rounded corners for the chat popup */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box shadow for depth */
        padding: 20px; /* Padding for the chat popup */
    }
    .chat-container {
        max-width: 300px;
        padding: 10px;
        background-color: #000; /* Black background color for luxury and vintage style */
        color: #fff; /* White text color for contrast */
        box-sizing: border-box;
        border: 2px solid #fff; /* White border */
        border-radius: 10px; /* Rounded corners */
    }
    .input-box {
        background-color: #f9f9f9; /* Slightly lighter background for input boxes */
        color: #333333; /* Dark text color for input boxes */
        /* Add other styles as needed */
    }

    .send-button {
        background-color: #4caf50; /* Green color for the send button */
        color: #ffffff; /* White text color for the send button */
        /* Add other styles as needed */
    }
    #chatArea  {
      font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
      resize: none;
      height: 200px;
      overflow-x: auto;

    }

    #question, #user {
        width: 100%;
        padding: 5px;
        margin-right: 10px;
    }
    .chat-container textarea:focus {
      background-color: #ddd;
    }
    #sendBtn {
      background-color: black;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:2px;
      /* opacity: 0.8; */
      font-style: bold;
      font-size: 20px;

    }
    #closeChatBtn {
        background-color: transparent; /* Transparent background for close button */
        border: none; /* No border */
        cursor: pointer; /* Cursor style */
        font-size: 24px; /* Font size for close icon */
        color: #333; /* Dark text color for close icon */
        transition: color 0.3s ease; /* Smooth color transition */
    }

    #closeChatBtn:hover {
        color: #d4af37; /* Gold color on hover for vintage effect */
    }
    #closeChatBtn {
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        background-color: transparent; /* Transparent background for close button */
        border: none; /* No border */
        cursor: pointer; /* Cursor style */
        font-size: 24px; /* Font size for close icon */
        color: #333; /* Dark text color for close icon */
        transition: color 0.3s ease; /* Smooth color transition */
    }

    #closeChatBtn:hover {
        color: #d4af37; /* Gold color on hover for vintage effect */
    }
    .send-button {
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        background-color: #333; /* Dark background color for vintage feel */
        color: #fff; /* White text color for contrast */
        border: none; /* No border */
        padding: 10px 20px; /* Padding for send button */
        cursor: pointer; /* Cursor style */
        border-radius: 5px; /* Rounded corners for send button */
        transition: background-color 0.3s ease; /* Smooth background color transition */
    }

    .send-button:hover {
        background-color: #d4af37; /* Gold color on hover for vintage effect */
    }
    /* Add some hover effects to buttons */
    .chat-container .btn:hover, .open-button:hover {
      opacity: 1;
    }
    #openChatBtn {
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
        background-color: #000; /* Black background color for a luxurious look */
        color: #fff; /* White text color */
        border: none; /* No border */
        padding: 20px 40px; /* Padding for the button */
        font-size: 24px; /* Font size */
        font-family: 'Times New Roman', serif; /* Ornate font family for vintage look */
        cursor: pointer; /* Cursor style */
        border-radius: 50px; /* Large border radius for a round button */
        transition: background-color 0.3s ease; /* Smooth background color transition */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle box shadow for depth */
        margin-left: 90%;
    }
    #openChatBtn i {
        margin-right: 10px;
        font-size: 36px;
    }
    #openChatBtn:hover {
        background-color: #444;
    }
    #clock {
    background-color: #f2f2f2;
    color: #333333;
    }

    #chat-history {
        background-color: #ffffff;
        color: #333333;
    }
    #closeChatBtn {
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    #closeChatBtn i {
        font-size: 36px;
        color: #333;
        transition: color 0.3s ease;
    }

    #closeChatBtn:hover i {
        color: #d4af37;
    }
</style>

