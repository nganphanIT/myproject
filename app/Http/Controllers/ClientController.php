<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
use App\Models\Blog;

class ClientController extends Controller
{
    // private $__uploads='uploads';
    public function sort_down(Request $request)
    {
        $search = $request->input('search');
        $blog = Blog::orderBy('price', 'asc')->paginate(9)->appends($request->all());
        $categories = BlogCategory::orderBy('title', 'ASC')->get();
        return view('blog.client.index', ['blog' => $blog, 'category' => $categories,'search' => $search]);
    }
    public function sale_off(Request $request)
    {
        $search = $request->input('search');
        $blog = Blog::where('sale_off', '>', 0)->paginate(9)->appends($request->all());
        $categories = BlogCategory::orderBy('title', 'ASC')->get();
        return view('blog.client.index', ['blog' => $blog, 'category' => $categories, 'search' => $search]);
    }

    public function sort_up(Request $request)
    {
        $search = $request->input('search');
        $blog = Blog::orderBy('price', 'desc')->paginate(9)->appends($request->all());
        $categories = BlogCategory::orderBy('title', 'ASC')->get();
        return view('blog.client.index', ['blog' => $blog, 'category' => $categories,'search' => $search]);
    }
    public function sort(Request $request)
    {
        $search = $request->input('search');
        $create_at = Blog::orderBy('created_at', 'desc');
        $categories = BlogCategory::orderBy('title', 'ASC')->get();
        $blog =  $create_at ->paginate(9)->appends($request->all());
        return view('blog.client.index', ['blog' => $blog,'create_at' => $create_at,'category' => $categories,'search' => $search]);
    }
    function index(Request $request){
        $search = $request->input('search');
        $price = $request->input('price');
        $query = Blog::orderBy('title', 'ASC');
        $categories = BlogCategory::orderBy('title', 'ASC')->get();
        if($search){
            $query = Blog::orderBy('title', 'ASC');
            $query->where('title', 'like', "%$search%");
        }
        if($price){
            $query = Blog::orderBy('title', 'ASC');
            $query->where('price', '<', $price);
        }
        $blog = $query->paginate(9)->appends($request->all());
        return view('blog.client.index', ['blog' => $blog, 'category' => $categories, 'search' => $search]);
}


    function detail($id){
        $blog = new Blog;
        $blog = $blog->find($id);
        $category = new BlogCategory;
        $category = $category->find($blog->cat_id);
        return view('blog.client.detail',['blog'=>$blog,'category'=>$category]);
    }


}
