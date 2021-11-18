<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Services\User\UserService;
use App\Http\Requests\User\CreateFormRequest;

class LoginController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Đăng nhập',
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'level' => 1
        ], $request->input('remember'))) {

            $result = $this->userService->getUsername($request);
            Session::put('username', $result->name);
            Session::put('id', $result->id);

            return redirect()->route('admin');
        }

        Session::flash('error', 'Email hoặc mật khẩu không đúng');

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}
