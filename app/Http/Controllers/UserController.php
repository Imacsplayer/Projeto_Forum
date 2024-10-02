<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listAllUsers()
    {
        $users = User::all();

        return view('users.listAllUsers', ['users' => $users]);
    }

    public function listUserById(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        return view('users.profile', ['user' => $user]);
    }


    public function register(Request $request)
    {
        if ($request->isMethod('GET')) {

            return view('users.createUser');
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'photo' => $request->photo ?? "",
                'role' => $request->role ?? "user",
            ]);

            Auth::login($user);

            return redirect()->route('welcome')
                ->with('message-sucess', 'Bem Vindo! ' . Auth::user()->name);
        }
    }

    public function UpdateUser(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password != '') {

            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('routeListUserById', [$user->id])
            ->with('message-sucess', 'Atualizado com sucesso');
    }

    public function deleteUser(Request $request, $id)
    {
        $user = User::where('id', $id)->delete();

        return redirect()->route('routeListAllUsers')
            ->with('message', 'Excluído com sucesso!');
    }
}
