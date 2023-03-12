<?php
namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UsersService
{
    public function store($request)
    {
        try {
            User::create([
                'name' => (string)$request->input('name'),
                'email' => (string)$request->input('email'),
                'password' => Hash::make((string)$request->input('password')),
//                'thumb' => (string)$request->input('file')
            ]);
            Session::flash('success', 'Đăng ký tài khoản thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
        }
        return true;
    }

}
