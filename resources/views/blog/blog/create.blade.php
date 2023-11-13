@extends('blog.general.master')
@section('content')
    <div class="container">
        <div class="alert alert-success fw-bold">Trang tạo sản phẩm</div> <hr>
        @if (Session::has('error-message'))
            <div class="alert alert-success">{{ Session::get('error-message'); }}</div> <hr>
        @endif
        <div class="row">
            <div class="col-20">
                <form action="{{url('blog/blog/create')  }}" class="form-inline" method="post" enctype="multipart/form-data" >
                    @csrf
                    <table class="table table-stripe">
                        <tr>
                            <td class="fw-bold">Tên sản phẩm</td>
                            <td>
                                <input type="text" class="form-control" name="title" placeholder="Nhập tên sản phẩm..." value="{{ old('title') }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Danh mục</td>
                            <td>
                                <select name="cate" id="" class="form-control">
                                    <option value="0">Chọn danh mục</option>
                                    @foreach ($category as $key=>$value)
                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                    </tr>
                        <tr>
                            <td class="fw-bold">Mô tả ngắn</td>
                            <td>
                                <textarea name="description" class="form-control" placeholder="Mô tả ngắn.." cols="10" rows="3"></textarea> <br>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Nội dung</td>
                            <td>
                                <textarea name="content" id="edit-reply-modal" class="form-control" placeholder="Nội dung.." cols="10" rows="10"></textarea> <br>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Giá</td>
                            <td>
                                <textarea name="price" id="edit-reply-modal" class="form-control" placeholder="Giá.." cols="10" rows="1"></textarea> <br>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Giới tính</td>
                            <td>
                                <input type="radio" id="sex1" name="sex" value="Nữ">
                                <label for="sex1">Nữ</label><br>
                                <input type="radio" id="sex2" name="sex" value="Nam">
                                <label for="sex2">Nam</label><br>
                                <input type="radio" id="sex3" name="sex" value="Unisex">
                                <label for="sex3">Unisex</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Ảnh sản phẩm </td>
                            <td><input type="file" name="imsex "></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Giảm giá </td>
                            <td>
                                <input type="number" id="sale_off" name="sale_off" min="0" value="0">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-primary " value="Tạo mới"></td>
                        </tr>
                    </table>
                    <br>
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
