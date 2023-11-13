<?php

namespace App\Http\Controllers;
use   App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Request;
use App\Models\Users;
use app\Models\BlogCategory;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    function register(){
        return view('blog/register');
    }
    function create(Request $request){
        $email= $request->input('email');
        $name = $request->input('name');
        $tel = $request->input('tel');
        $password=$request->input('password');
        if(!$name){
            $request->session()->flash('error-message', 'Vui lòng nhập tên');
            return Redirect('register');
        }
        if(!$email)
        {
            $request->session()->flash('error-message', 'Vui lòng nhập email');
            return Redirect('register');
        }
        if(!$password){
            $request->session()->flash('error-message', 'Vui lòng nhập mật khẩu');
            return Redirect('register');
        }
        if(!$tel){
            $request->session()->flash('error-message', 'Vui lòng nhập số điện thoại');
            return Redirect('register');
        }
        $newCheckUser = new Users;
        $newCheckUser =   $newCheckUser->where('email',$email)->first();
        if($newCheckUser)
        {
            $request->session()->flash('error-message', 'Email '.$email.' đã tồn tại');
            return Redirect('register');
        }
        $createNewUser = new Users;
        $createNewUser->name = $name;
        $createNewUser->email = $email;
        $createNewUser->tel = $tel;
        $createNewUser->password = bcrypt($password);
        $createNewUser->save();
        $request->session()->flash('success', 'Đăng ký tài khoản thành công');
        return Redirect('login');




    }

}
