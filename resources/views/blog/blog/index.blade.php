@section('title')
Danh mục Blog
@stop
@extends('blog.general.master')
@section('content')
<style>
    .paginate svg{
        width: 20px;
    }
    .table{
        /* background-image: url('https://tse3.mm.bing.net/th?id=OIP.bTYsCs0RONiA-iPrcouJPgHaEK&pid=Api&P=0&h=180');
        background-repeat: no-repeat, repeat; */
        background-color: white;
        background-size: cover;
        height: max-content;
        background-attachment: fixed;
        background-position: center;
        border-radius: 2%;
    }
</style>
    <div class="container">
        <div class="alert alert-success fw-bold">Trang danh sách sản phẩm</div> <hr>
        <div class="row">
            <div class="col-10">
                <form action="{{ url('blog/blog') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" name="search"  class="form-control" value="{{ $search }}" placeholder="Nhập từ khóa.." aria-label="search" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2"> <input type="submit" value="Tìm kiếm" class="btn btn-primary"></span>
                      </div>
                </form>
            </div>
            <div class="col-30">
                <table class="table table-stripe">
                    <tr>
                        <td class="fw-bold">ID</td>
                        <td width="250px" class="fw-bold">Tên sản phẩm</td>
                        {{-- <td class="fw-bold">Hình ảnh</td> --}}
                        {{-- <td class="fw-bold">Mô tả</td>
                        <td class="fw-bold">Nội dung</td> --}}
                        <td class="fw-bold">Giá</td>
                        <td class="fw-bold">Giới tính</td>
                        <td class="fw-bold">Hành động</td>
                    </tr>
                    @foreach ($blog as $key=>$value )
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td width="250px">{{ $value->title }}</td>

                            <td>{{ number_format($value->price,0)}} đồng</td>
                            <td>{{ $value->sex }}</td>
                            <td><a href="{{ url('blog/blog/detail') }}/{{ $value->id }}"><button class="btn btn-primary">Xem</button></a>
                                <a href="javascript:(0)" onclick="return confirmDelete('{{ url('blog/blog/delete') }}/{{ $value->id }}','{{ trans('general.confirmDelete') }}')"><button class="btn btn-primary">Xóa</button></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div> <br>
            <div class="col-12">
               <div class="paginate">
                <br>{{ $blog }}
               </div>
            </div>
        </div>
    </div>
@endsection
