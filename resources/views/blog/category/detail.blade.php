@section('title')
{{ $category->title }} = Danh mục sản phẩm
@stop
@extends('blog.general.master')
@section('content')
    <div class="container">
        <div class="alert alert-success fw-bold">Trang chi tiết danh mục</div> <hr>
        @if (Session::has('error-message'))
            <div class="alert alert-warning">{{ Session::get('error-message'); }}</div> <hr>
        @endif
        <div class="row">
            <div class="col-10">
                <table class="table table-stripe">
                    <tr>
                        <td class="fw-bold">ID</td>
                        <td class="fw-bold"> Danh mục</td>
                        <td class="fw-bold"> Hành động</td>
                    </tr>
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>
                            <a href="javascript:(0)" onclick="return confirmDelete('{{ url('blog/category/delete') }}/{{ $category->id }}','{{ trans('general.confirmDelete') }}')"><button class="btn btn-primary">Xóa</button></a>
                            {{-- <a href="{{ url('blog/category/delete') }}/{{ $category->id }}"><button class="btn btn-primary">Xóa</button></a> --}}
                        </td>
                    </tr>
                </table>
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
