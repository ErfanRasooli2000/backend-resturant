<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{

    public function login()
    {

    }

    public function create_user(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required' ,
            'email' => 'email|required|unique:users,email' ,
            'password' => 'required'
        ] , [
            'name.required' => 'نام را وارد کنید.',
            'email.unique' => 'ایمیل تکراری است.',
            'email.required' => 'ایمیل را وارد کنید.',
            'email.email' => 'فرمت ایمیل درست نیست.',
            'password.required' => 'رمز عبور الزامی است.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return $user->id;
    }
}
