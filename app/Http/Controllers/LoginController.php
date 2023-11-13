<?php

namespace App\Http\Controllers;

use   App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Controllers\RegisterController;
use app\Models\BlogCategory;

class LoginController extends Controller
{


    function index(){
            return view('blog/login');
    }
    function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $userInfo = array(
            'email'=> $email,
            'password'=>$password,
        );
        if(Auth::validate($userInfo,true)){
            if (Auth::attempt($userInfo) && Auth::user()->role == '0') {
                return redirect('/blog/client/');
                // return redirect('/blog/blog');
                // echo 'Đăng nhập thành công';
            }
            else  if (Auth::attempt($userInfo) && Auth::user()->role == '1') {
                return redirect('/blog/blog/');
                // echo 'Đăng nhập thành công';
            }
            else {
                // echo 'Đăng nhập thất bại';
                $request->session()->flash('error-message', 'Đăng nhập thất bại');
                return redirect('/login');
            }
        }
        else{
            $request->session()->flash('error-message', 'Đăng nhập thất bại');
            return redirect('/login');
            // echo 'Đăng nhập thất bại';
        }
    }
}
