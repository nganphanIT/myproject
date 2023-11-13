<?php

namespace App\Http\Controllers;
use   App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\BlogCategory;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{
    function index( Request $request){
        $blogCategory = new BlogCategory;
        $blogCategory = $blogCategory->orderBy('title','ASC')->paginate(10)->appends($request->all());
        return view('blog.category.index',['blogCategory'=>$blogCategory]);
    }
  

    function create(){
        return view('blog/category/create');
    }
    function store(Request $request){

        $title = $request->input('title');

        if(!$title){
            $request->session()->flash('error-message', 'Vui lòng nhập tiêu đề');
            return Redirect('blog/category/create');
        }
        $createCategory = new BlogCategory;
        $createCategory->title  = $title;
        $createCategory->save();
        return redirect::to('/blog/category/detail/'.$createCategory->id);
    }
    function detail($id){
        $category = new BlogCategory;
        $category = $category->find($id);
        // $category = $category->where('id',$id)->first;
        return view('blog.category.detail',['category'=>$category]);
    }
    function delete($id, Request $request){
        $category = new BlogCategory;
        $category = $category->find($id);
        $category->delete();
        $request->session()->flash('error-message', 'Xóa thành công');
        return Redirect('blog/category/create');
    }

}
