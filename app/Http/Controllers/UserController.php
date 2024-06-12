<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function listAllUsers(Request $request){
        // logica
        return view('users.listAllUsers');
    }

    public function listUser(Request $request, $uid){
        $user = User::where('id', $uid)->first();
        return view('users.profile', ['user' => $user]);
    }

    public function updateUser(Request $request, $uid) {
        $user = User::where('id', $uid)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != '') {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('routeListUser', [$user->id])
                    ->with('message', 'Atualizado com sucesso!');
    }

    public function deleteUser(Request $request, $uid) {
        User::where('id', $uid)->delete();
        return redirect()->route('routeListAllUsers')
                    ->with('message', 'Deletado com sucesso!');
    }

    public function registerUser(Request $request) {
        if($request->method() === 'GET') {
            return view('auth.registerUser');
        } else {

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            Auth::login($user);

            return redirect()->route('routeListAllUsers');
        }
    }
}