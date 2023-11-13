@extends('blog.general.master')
@section('sidebar')
    <div class="border">
        <div class="col-10">
            <h4>BỘ LỌC</h4>
            <i>Giúp lọc nhanh sản phẩm bạn tìm kiếm</i>
        </div>
        <div class="col-10">
            <h4>Thương hiệu</h4>
            <form action="{{ url('blog/blog') }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" name="search"  class="form-control" value="{{ $search }}" placeholder="Nhập từ khóa.." aria-label="search" aria-describedby="basic-addon2">
                </div>

            </form>
        </div>
        <div class="col-10">
            <h4>Giá sản phẩm</h4>
            <form action="{{ url('blog/blog') }}" method="get">
                    <input type="radio" id="price1" name="price" value=">10.000.000">
                    <label for="price1">Trên 10 triệu</label><br>
                    <input type="radio" id="price2" name="price" value=">5.000.000">
                    <label for="price1">Trên 5 triệu</label><br>
                    <input type="radio" id="price1" name="price" value=">2.000.000">
                    <label for="price1">Trên 2 triệu</label><br>
                    <input type="radio" id="price1" name="price" value=">1.000.000">
                    <label for="price1">Trên 1 triệu</label><br>
                    <input type="radio" id="price1" name="price" value="<1.000.000">
                    <label for="price1">Dưới 1 triệu</label><br>
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
        height: 300px;
        display: block;
        margin: 2px;
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
</style>
@section('content')
    <div class="container border">
        <h2>Nước hoa chính hãng</h2>
        <div>
            <form action="{{ url('blog/blog') }}" method="get">
                <b>Xếp theo: </b>
                <input type="radio" id="product" name="product" value="">
                <label for="">Hàng mới</label>
                <input type="radio" id="price" name="price" value="">
                <label for="">Giá thấp đến cao</label>
                <input type="radio" id="price" name="price" value="">
                <label for="">Giá cao đến thấp</label>
            </form>
        </div>
        <hr>
        <div class="d-flex">
                @foreach ($blog as $key=>$value )
                    <div class="flex-container">
                        <td><img src="{{ url('/') }}/{{ $value->image }}" alt=""
                            width="200px" height="200px" class="center" ></td> <br>
                        <td><b>{{ $value->title }}</b></td> <br>
                        <td><b>Giá: </b>{{ number_format($value->price,0)}} đồng</td> <br>

                    </div>
                @endforeach
        </div>
        <div class="col-12">
            <div class="paginate">
             <br>{{ $blog }}
            </div>
         </div>
    </div>
@endsection


