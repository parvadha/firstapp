<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_form(Request $request)
    {
        $user=$request->input('user');
        return "Welcome ".$user;
    }
}
