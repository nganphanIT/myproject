<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\BlogCategory;

class LogoutController extends Controller
{
    function index(){
        Auth::logout();
        return redirect('/login');
    }
}
