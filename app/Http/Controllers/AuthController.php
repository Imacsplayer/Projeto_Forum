<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginUser(Request $request) {
        if($request->method() === 'GET'){
            return view('auth.login');  
        } else {
            $email = $request->email;
            $password = $request->password;
            $method = $request->method();
            $credentials = $request->only('username', 'password', 'method');
            print($email . " - " . $password . " - " . $method);
            print_r($credentials);
        }
    }
}
