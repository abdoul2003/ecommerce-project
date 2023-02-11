<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            return 'Email ou mot de passe incorrect';
        } else {
            $request->session()->put('user', $user);
            return redirect('/');
        }
    }

    public function register(Request $req)
    {
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        return redirect('/login');
    }
}
