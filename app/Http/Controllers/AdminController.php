<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Redirect;
class AdminController extends Controller
{
    public function index()
    {
        // Lấy danh sách người dùng từ cơ sở dữ liệu
        $users = Users::all();
        return view('blog/update-role', compact('users'));
    }

    public function updateRole(Request $request)
    {
        $id= $request->input('id');
        $role = $request->input('role');

        $user = Users::find($id);
        $user->role = $role;
        $user->save();

        return response()->json(['message' => 'Vai trò đã được cập nhật thành công.']);
    }
}
