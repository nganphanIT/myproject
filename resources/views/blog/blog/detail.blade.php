@section('title')
{{ $blog->title }} = Danh sách sản phẩm
@stop
@extends('blog.general.master')
@section('content')
    <div class="container">
        <div class="alert alert-success x fw-bold">Trang chi tiết sản phẩm </div> <hr>
        @if (Session::has('error-message'))
            <div class="alert alert-success">{{ Session::get('error-message'); }}</div> <hr>
        @endif
        <div class="row">
            <div class="col-20">
                <table class="table table-stripe">
                    <tr>
                        <td style="width: 200px;"class="fw-bold">ID</td>
                        <td style="width: 800px;">{{ $blog->id }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;"class="fw-bold">Tên sản phẩm</td>
                        <td style="width: 800px;">{{ $blog->title }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;"class="fw-bold">Danh mục</td>
                        <td style="width: 800px;">{{ $category->title }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;"class="fw-bold" >Hình ảnh</td>
                        <td style="width: 800px;"><img src="{{ url('/') }}/{{ $blog->image }}"  alt=""
                            width="300px" height="300px"></td>
                    </tr>
                    <tr>
                        <td style="width: 200px;"class="fw-bold">Mô tả</td>
                        <td style="width: 800px;">{{ $blog->description }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;"class="fw-bold" >Nội dung</td>
                        <td style="width: 800px;">{{ $blog->content }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;"class="fw-bold" >Giá</td>
                        <td style="width: 800px;">{{ number_format($blog->price,0)}} đồng</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;"class="fw-bold">Giới tính</td>
                        <td style="width: 800px;"> {{ $blog->sex }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px;"class="fw-bold">Giảm giá</td>
                        <td style="width: 800px;"> {{ $blog->sale_off }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Hành động</td>
                        <td><a href="javascript:(0)" onclick="return confirmDelete('{{ url('blog/blog/delete') }}/{{ $blog->id }}','{{ trans('general.confirmDelete') }}')"><button class="btn btn-primary">Xóa</button></a>
                            <a href="{{ url('blog/blog/edit') }}/{{ $blog->id }}"><button class="btn btn-primary">Sửa</button></a></td>
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
       width: max-content;
       background-attachment: fixed;
       background-position: center;
       border-radius: 2%;
       margin-left: 0%;
    }
</style>
