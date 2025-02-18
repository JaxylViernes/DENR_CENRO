<?php

namespace App\Http\Controllers;
use App\Models\Accounts;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        return view('dashboard');
    }

//login
public function loginUser(Request $request){
    $username = $request->input('username');
    $password = $request->input('myInput');
    $users = Accounts::where('username', $username)
    ->where('password', $password)->first();
if($users){
    if($users->userType == 1){
        return view('dashboard', ["currentPage"=>'dashboard'])->with('success', 'Successfully logged in!');
    }
    elseif($users->userType == 0){
        // return view('dashboard');
        return back()->with('success', 'Successfully logged in!');
    }
}

    else{
return back()->with('message', 'Wrong username or password!');
    }
}


}
