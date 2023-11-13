@extends('blog.general.master')
@section('content')
    <div class="container">
        <div class="alert alert-success fw-bold">Trang tạo danh mục</div> <hr>
        @if (Session::has('error-message'))
            <div class="alert alert-warning">{{ Session::get('error-message'); }}</div> <hr>
        @endif
        <div class="row">
            <div class="col-13">
                <form action="{{url('blog/category/create')  }}"  class="form-inline" method="post">
                    @csrf
                    <table class="table table-stripe">
                        <tr>
                            <td class="fw-bold"> Tên danh mục</td>
                            <td>  <input type="text" class="form-control" name="title"
                                placeholder="Nhập tên danh mục..." value="{{ old('title') }}"></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" class="btn btn-primary " value="Tạo mới">
                            </td>
                        </tr>

                    </table>
                </form>
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
