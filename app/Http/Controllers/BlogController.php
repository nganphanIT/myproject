<?php

namespace App\Http\Controllers;
use   App\Http\Requests;
use Symfony\Component\Console\Input\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Blog;
use App\Models\Users;
use League\Config\Exception\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\BlogCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\ValidatedInput;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveMultipleImages;
use DB;
use App\Models\ProductLikeDislike;
class BlogController extends Controller
{
    private $__uploads='uploads';
    function index( Request $request){
        $blog = new Blog;
        $blog = $blog->orderBy('title','ASC')->paginate(3)->appends($request->all());
        $search = $request->input('search');
        if($search){
            $blog = Blog::where('title','like',"%$search%")->orderBy('title','ASC')->paginate(6)->appends($request->all());
        }
        else
        {
            $blog = Blog::orderBy('title','ASC')->paginate(10)->appends($request->all());
        }

        $getCategory = new BlogCategory;
        $getCategory = $getCategory->get();
        $category=array();
        $category[0]='';
        foreach($getCategory as $key=>$value)
        {
            $category[$value->id] = $value->title;
        }
        return view('blog.blog.index',['blog'=>$blog,'category'=>$category,'search'=>$search]);
    }


       public function filterByPrice(Request $request)
    {
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        $blogs = Blog::whereBetween('price', [$minPrice, $maxPrice])->get();

        return response()->json($blogs);
    }


    function create(){
        $category = new BlogCategory;
        $category =   $category->orderBy('title','ASC')->get();
        return view('blog/blog/create',['category'=>$category]);
    }

    function store(Request $request){

        $title = $request->input('title');
        $description = $request->input('description');
        $content = $request->input('content');
        $price = $request->input('price');
        $sex = $request->input('sex');
        $image = $request->input('image');
        $cate = $request->input('cate');
        $sale_off = $request->input('sale_off');
        

        if(!$title){
            $request->session()->flash('error-message', 'Vui lòng nhập tiêu đề');
            return redirect('blog/blog/create');
        }
        if(!$description){
            $request->session()->flash('error-message', 'Vui lòng nhập mô tả');
            return redirect('blog/blog/create');
        }
        if(!$content){
            $request->session()->flash('error-message', 'Vui lòng nhập nội dung');
            return redirect('blog/blog/create');
        }
        if(!$price){
            $request->session()->flash('error-message', 'Vui lòng nhập giá');
            return redirect('blog/blog/create');
        }
        if(!$sex){
            $request->session()->flash('error-message', 'Vui lòng nhập giới tính');
            return redirect('blog/blog/create');
        }
        // $image='';
        if($request->hasFile('image')){
            $rules = array('image'=> 'mimes:jpeg,jpg,png,gif|max:1000');
            $file = $request->file('image');
            $files = array('image'=>$file);
            $getClientOriginalName=$file->getClientOriginalName();
            $validator = Validator::make($files,$rules);
            if($validator->fails()){
                $request->session()->flash('error-message', 'Không thể upload image');
            }
            else{
                $fileName=time().$file->getClientOriginalName();
                $destinationPath = $this->__uploads;
                $fileLocation = $destinationPath.'/'.$fileName;
                $file->move($destinationPath,$fileName);
                $image = $fileLocation;
            }

        }
        $blog = new Blog;
        $blog->title  = $title;
        $blog->description  = $description;
        $blog->content = $content;
        $blog->price = $price;
        $blog->sex = $sex;
        $blog->image = $image;
        $blog->cat_id = $cate;
        $blog->sale_off = $sale_off;
        $blog->save();
        $request->session()->flash('error-message', 'Thêm thành công');
        return redirect::to('blog/blog/detail/'.$blog->id);
    }
    function detail($id){
        $blog = new Blog;
        $blog = $blog->find($id);
        $category = new BlogCategory;
        $category = $category->find($blog->cat_id);
        return view('blog.blog.detail',['blog'=>$blog,'category'=>$category]);
    }

    function delete($id, Request $request){
        $blog = new Blog;
        $blog = $blog->find($id);
        if($blog->image){
           File::delete($blog->image);
        }
        $blog->delete();
        $request->session()->flash('error-message', 'Xóa thành công');
        return redirect('blog/blog');
    }
    function edit($id){
        $blog = new Blog;
        $blog = $blog->find($id);
        $category = new BlogCategory;
        $category =   $category->orderBy('title','ASC')->get();
        return view('blog.blog.edit',['blog'=>$blog,'category'=>$category]);
    }

    function update($id,Request $request){
        $blog = new Blog;
        $blog = $blog->find($id);
        $title = $request->input('title');
        $description = $request->input('description');
        $content = $request->input('content');
        $price = $request->input('price');
        $sex = $request->input('sex');
        $image = $request->input('image');
        $cate = $request->input('cate');
        if(!$title){
            $request->session()->flash('error-message', 'Vui lòng nhập tiêu đề');
            return redirect('blog/blog/create');
        }
        if(!$description){
            $request->session()->flash('error-message', 'Vui lòng nhập mô tả');
            return redirect('blog/blog/create');
        }
        if(!$content){
            $request->session()->flash('error-message', 'Vui lòng nhập nội dung');
            return redirect('blog/blog/create');
        }
        if(!$price){
            $request->session()->flash('error-message', 'Vui lòng nhập nội dung');
            return redirect('blog/blog/create');
        }
        if(!$sex){
            $request->session()->flash('error-message', 'Vui lòng nhập nội dung');
            return redirect('blog/blog/create');
        }
        if($request->hasFile('image'))
        {
            $rules = array('image'=>'mines:jpeg,jpg,png,gif,svg|required|max:1500');
            $file = $request->file('image');
            $files = array('image' =>$file);
            $getClientOriginalName =$file->getClientOriginalName();
            $validator  = Validator::make($files,$rules);
            if ($validator->failed()){
                $request->session()->flash('error-message', 'Lỗi không thể upload ảnh');
            }
            else {
                $fileName=time().$file->getClientOriginalName();
                $destinationPath = $this->__uploads;
                $fileLocation = $destinationPath.'/'.$fileName;
                $file->move($destinationPath,$fileName);
                $image = $fileLocation;
            }
        }
        // dd($image);
        $blog->title        = $title;
        $blog->description  = $description;
        $blog->content      = $content;
        $blog->price      = $price;
        $blog->sex     = $sex;
        if ($image){
            $blog->image    = $image;
        }
        $blog->cat_id       = $cate;
        $blog->save();
        $request->session()->flash('error-message', 'Sửa thành công');
        return redirect::to('blog/blog/detail/'.$blog->id);
    }






}
