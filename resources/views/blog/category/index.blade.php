@section('title')
Danh mục Blog
@stop
@extends('blog.general.master')
@section('content')
<style>
    .paginate svg{
        width: 20px;
    }
</style>
    <div class="container">
        <div class="alert alert-success fw-bold">Trang danh mục loại</div> <hr>
        <div class="row">
            <div class="col-15">
                <table class="table table-stripe">
                    <tr>
                        <td class="fw-bold">ID</td>
                        <td class="fw-bold">Loại sản phẩm</td>
                        <td class="fw-bold" style="width: 400px" >Hành động</td>
                    </tr>
                    @foreach ($blogCategory as $key=>$value )
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->title }}</td>
                            <td style="width: 400px"><a href="{{ url('blog/category/detail') }}/{{ $value->id }}"><button class="btn btn-primary">Xem</button></a>
                                {{-- <a href="{{ url('blog/category/delete') }}/{{ $value->id }}"><button class="btn btn-primary">   Xóa</button></a> --}}
                                <a href="javascript:(0)" onclick="return confirmDelete('{{ url('blog/category/delete') }}/{{ $value->id }}','{{ trans('general.confirmDelete') }}')"><button class="btn btn-primary">Xóa</button></a>

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div> <br>
            <div class="col-12">
               <div class="paginate">
                <br>{{ $blogCategory }}
               </div>
            </div>
        </div>
    </div>
@endsection
<style>
     .table{
        /* background-image: url('https://tse3.mm.bing.net/th?id=OIP.bTYsCs0RONiA-iPrcouJPgHaEK&pid=Api&P=0&h=180');
        background-repeat: no-repeat, repeat; */
        background-color: white;
        background-size: cover;
        height: max-content;
        background-attachment: fixed;
        background-position: center;
        border-radius: 2%
    }
</style>
