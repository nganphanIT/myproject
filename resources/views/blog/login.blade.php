@extends('blog.general.master')
@section('sidebar')
    <div class="border">
        <div class="col-6 px-0 d-none d-sm-block">
            <img src="https://i.pinimg.com/originals/78/f3/72/78f3721fdc1736f55b61761eff33ff79.jpg"
           alt="" style="border-radius: 2% ">
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
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form id="loginForm" action="{{url('login')}}" method="post">
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start divider d-flex align-items-center my-4">
                <p class="lead fw-normal mb-0 me-3"><h3>Đăng nhập với</h3></p>
            </div>
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start divider d-flex align-items-center my-4">
                <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>
                <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>
                <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fab fa-linkedin-in"></i>
                </button>

            </div>
            <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0">Hoặc</p>
            </div>
            @csrf
            <div class="form-outline mb-5">
                <input type="email"name="email" id="email"  class="form-control form-control-lg"
                placeholder="Nhập email của bạn..." {{Request::old('email')}} />
            </div>
            <div class="form-outline mb-5">
                <input type="password" name="password" id="password" class="form-control form-control-lg"
                placeholder="Nhập mật khẩu..." value="{{ old('password') }}"/>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                        Ghi nhớ
                    </label>
                </div>
                <a href="#!" class="text-body">Quên mật khẩu?</a>
            </div>
            <div class="divider d-flex align-items-center my-4">
                <button type="button" class="btn btn-primary btn-lg">
                    <input type="submit" class="btn btn-primary " style="font-size: 22pt;" value="Đăng nhập">
                </button>
            </div>
            <script>
                document.getElementById("loginForm").addEventListener("submit", function(event) {
                    var email = document.getElementById("email").value;
                    var password = document.getElementById("password").value;
                    if (!email || !password) {
                        event.preventDefault();
                        alert("Vui lòng điền đầy đủ thông tin.");
                    }
                });
            </script>
            <div class="text-center text-lg-start mt-4 pt-2">
                <p class=" fw-bold mt-2 pt-1 mb-0">Chưa có tài khoản? <a href="{{ url('/register') }}"
                    class="link-danger">Đăng kí</a></p>
            </div>
        </form>

    </div>
@endsection


