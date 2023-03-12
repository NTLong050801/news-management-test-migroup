<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;

use App\Http\Services\UsersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    protected  $userServices;
    public function __construct(UsersService $userServices )
    {
        $this->userServices = $userServices;
    }

    public function index(){
        $title = "Đăng nhập";
        return view('admin.users.login',compact('title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ],[
            'email.required'=> 'Vui lòng điền email',
            'password.required' => 'Vui lòng điền mật khẩu',
        ]);

        $email = $request -> input('email');
        $password = $request -> input('password');


        if (Auth::attempt(['email' => $email, 'password' => $password , 'status' => 1])) {
            Session::flash('sucsses','Đăng nhập thành công !');
            return redirect()->route('admin.home');
        };
        if (Auth::attempt(['email' => $email, 'password' => $password , 'status' => 0])) {
            Session::flash('sucsses','Đăng nhập thành công !');
            return redirect()->route('users.home.index');
        };
        Session::flash('error','Email hoặc password không chính xác');
        return redirect()->back();
    }
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|max:255',
            'password' => 'required|confirmed|min:5',
        ],[
            'name.min' => "Tên ít nhất :min ký tự",
            'email.required'=> 'Vui lòng điền email',
            'password.required' => 'Vui lòng điền mật khẩu',
            'password.confirmed' => 'Mật khẩu không khớp',
            'password.min' => 'Mật khẩu ít nhất :min ký tự',

        ]);
        $result =  $this->userServices-> store($request);
        return redirect()->route('login');
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()-> route('login');
    }

}
