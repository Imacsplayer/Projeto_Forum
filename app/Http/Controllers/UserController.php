<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listAllUsers(Request $request){
        // logica
        return view('users.listAllUsers');
    }

    public function listUser(Request $request, $uid){
        print($uid);
    }

    public function createUser(){
        return view('users.createUser');
    }

    public function editUser(){
        return view('users.editUser');
    }

    public function deleteUser(){
        return view('users.deleteUser');
    }
}