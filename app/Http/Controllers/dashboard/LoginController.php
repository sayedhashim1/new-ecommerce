<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    function getLogin()
    {

        return view('dashboard.auth.login');
    }

    function login(AdminLoginRequest $req)
    {
        $remember_me = $req->has('remember') ? true : false;
        if(auth()->guard('admin')->attempt(['email'=>$req->input('email'),'password'=>$req->input('password')],$remember_me))        {

            return redirect()->route('admin.dashboard');

        }
        else
        {
            return redirect()->back()->with(['error'=>'يوجد خطأ بالبيانات']);
        }
    }
}
