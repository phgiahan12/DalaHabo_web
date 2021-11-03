<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function index() {
        return view('admin.users.login', [
            'title' => 'DalaHabo | Admin - Đăng nhập' 
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if(Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
                //'level' => 1  --Kiem tra level, neu la 1 (admin) -> success, nguoc lai: failed
            ], $request->input('remember'))) {
            
            return redirect()->route('admin');
        }

        Session::flash('error', 'Email hoặc mật khẩu không đúng');

        return redirect()->back();
    }
}
