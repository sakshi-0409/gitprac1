<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate(
            [
                'u_name' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]
        );
        $user = new Users;
        $user->u_name = $request['u_name'];
        $user->password = Hash::make($request['password']);
        $user->save();

        return redirect()->back();
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'u_name' => 'required',
            'password' => 'required'
            
        ]);
        $username = $request['u_name'];
        // dd($username);
        $password = $request['password'];
        $users_count = DB::table('users')
        ->where('u_name', '=', $username)
        // ->where('password', '=', $password)
        ->count();
        dd($users_count);
       
    }
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
