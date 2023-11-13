@extends('blog.general.master')
@section('sidebar')
    <div class="border">
        <div class="col-6 px-0 d-none d-sm-block">
            <img src="https://static.designboom.com/wp-content/uploads/2017/01/hermes-bottle-design-competition-terre-designboom-600.jpg"
           alt=""  style="border-radius: 5%; width= 300px ">
        </div>
    </div>
@endsection
<style>
    .bg-image-vertical {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: right center;
        background-size: 500px;
    }
    @media (min-width: 2025px) {
    .h-custom-2 {
        height: 300%;
        }
    }
    img{
        width:300px;
        height: 90%;
        margin-top: 10%;
        padding: 5px;
        border-radius: 10%;

    }
    .paginate svg{
        width: 20px;
    }
    .d-flex{
        justify-content: space-between;
        display: flex;
        flex-flow: row wrap;
        margin: 5px;
        padding: 5px;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }
    .flex-container{
        background-color: white;
        width: 200px;
        height: 200px;
        display: block;
        margin: 2px;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

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
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }
    .h-custom {
        height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
    .h-custom {
        height: 100%;
    }
    .btn-primary{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    h3, .container{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

}
</style>
@section('content')
    <div class="container border">
        <div class="alert alert-success text-center"><h3>Trang đăng kí thành viên Perfume</h3></div> <hr>
        @if (Session::has('error-message'))
            <div class="alert alert-warning">{{ Session::get('error-message'); }}</div> <hr>
        @endif
            <div class="row">
                <form action="{{url('register')  }}" class="form-inline" method="post">
                    @csrf
                    <div class="form-outline mb-5">
                        <input type="text" class="form-control form-control-lg" name="name" id="name"
                        placeholder="Nhập tên của bạn..."  value="{{ old('name') }}">
                    </div>
                    <div class="form-outline mb-5">
                        <input type="email"name="email" id="email"  class="form-control form-control-lg"
                        placeholder="Nhập email của bạn..." value="{{ old('email') }} "/>
                    </div>
                    <div class="form-outline mb-5">
                        <input type="text" name="tel" id="tel"  class="form-control form-control-lg"
                        placeholder="Nhập số điện thoại của bạn..." value="{{ old('tel') }}" />
                    </div>
                    <div class="form-outline mb-5">
                        <input type="password" name="password" id="password" class="form-control form-control-lg"
                        placeholder="Nhập mật khẩu..." value="{{ old('password') }}"/>
                    </div>
                    <div class="divider d-flex align-items-center my-4">
                        <button type="button" class="btn btn-primary btn-lg">
                            <input type="submit" class="btn btn-primary " style="font-size: 22pt;" value="Đăng kí">
                        </button>
                    </div>
                    <script>
                        document.getElementById("loginForm").addEventListener("submit", function(event) {
                            var email = document.getElementById("email").value;
                            var name = document.getElementById("name").value;
                            var tel = document.getElementById("tel").value;
                            var password = document.getElementById("password").value;
                            if (!email || !password || !tel || !name) {
                                event.preventDefault();
                                alert("Vui lòng điền đầy đủ thông tin.");
                            }
                        });
                    </script>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <p class=" fw-bold mt-2 pt-1 mb-0">Đã có tài khoản? <a href="{{ url('/login') }}"
                            class="link-danger">Đăng nhập</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
{{-- <style>
    .bg-image-vertical {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: right center;
        background-size: 300px;
    }
    @media (min-width: 2025px) {
    .h-custom-2 {
        height: 200%;
        }
    }
    .col-6 img{
        width:290px;
        height: 70%;
        margin-top: 10%;
        padding: 15px;
        border-radius: 5%;

    }
    .paginate svg{
        width: 20px;
    }
    .d-flex{
        justify-content: space-between;
        display: flex;
        flex-flow: row wrap;
        margin: 5px;
        padding: 5px;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */

    }
    .flex-container{
        background-color: white;
        width: 200px;
        height: 200px;
        display: block;
        margin: 2px;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */

    }
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 80%;
    }
    .container{
        border: 2px solid rgb(216, 216, 216);
        border-radius: 5px;
        padding: 5px;
    }
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */

    }
    .h-custom {
        height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
    .h-custom {
        height: 100%;
    }
    .btn-primary{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
    }
    h3, .container{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; /* Specify a fallback font family */
    }

}
</style> --}}
