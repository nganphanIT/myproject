@extends('blog.general.master')
@section('content')
    <div class="container">
        <div class="alert alert-success">Trang sửa sản phẩm</div> <hr>
        @if (Session::has('error-message'))
            <div class="alert alert-success">{{ Session::get('error-message'); }}</div> <hr>
        @endif
        <div class="row">
            <div class="col-15">
                <form action="{{url('blog/blog/edit/'.$blog->id)  }}" class="form-inline" method="post" enctype="multipart/form-data" >
                    @csrf
                    <table class="table table-stripe">
                        <tr>
                                <td class="fw-bold">Tên sản phẩm</td>
                                <td>
                                    <input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề..." value="{{ $blog->title}}">
                                </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Danh mục</td>
                            <td>
                                <select name="cate" id="" class="form-control">
                                    <option value="0">Chọn danh mục</option>
                                    @foreach ($category as $key=>$value)
                                        <option value="{{ $value->id }}"
                                            @if($blog->cat_id==$value->id) selected @endif>
                                            {{ $value->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                    </tr>
                        <tr>
                            <td class="fw-bold">Mô tả ngắn</td>
                            <td>
                                <textarea name="description" class="form-control" placeholder="Mô tả ngắn.." cols="40" rows="5">{!! $blog->description !!}</textarea> <br>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Giá</td>
                            <td>
                                <textarea name="price" class="form-control" placeholder="Giá.." cols="40" rows="1">{!! $blog->price !!}</textarea> <br>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Giới tính</td>
                            <td>
                                <input type="radio" id="sex1" name="sex" value="Nữ" {{ $blog->sex }}>
                                <label for="sex1">Nữ</label><br>
                                <input type="radio" id="sex2" name="sex" value="Nam"{{ $blog->sex }}>
                                <label for="sex2">Nam</label><br>
                                <input type="radio" id="sex3" name="sex" value="Unisex" {{ $blog->sex }}>
                                <label for="sex3">Unisex</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Nội dung</td>
                            <td>
                                <textarea name="content" class="form-control" placeholder="Nội dung.." cols="40" rows="5">{!! nl2br($blog->content) !!}</textarea> <br>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Ảnh sản phẩm</td>
                            <td>
                                <div> <input type="file" name ='image'>
                                    <i>Chọn ảnh mới nếu muốn thay đổi</i>
                                </div>
                                @if ($blog->image)
                                    <div>
                                        <img src="{{ url('/') }}/{{ $blog->image }}" alt="" width="300px" height="300px">
                                    </div>
                                @endif

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-primary " value="Cập nhật"></td>
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
