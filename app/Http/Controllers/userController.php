<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Store;
use App\Models\Session;
use App\Models\Category;
use App\Models\Stockstore;
use App\Models\AuditLog;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function signup(){
    return view(('pages.signup'));
}


public function signin(){
    return view('pages.signin');
}


public function signinConfig(Request $request){
    $formData =  $request->validate([
        'name' => 'required',
        'password' => 'required'
    ]);
    if(auth()->attempt($formData)){
        $request->session()->regenerate();

        return redirect('/dashboard')->with('message', 'You are now logged in');
    }
    return back()->withErrors(['name' => 'Invalid Credentials'])->onlyInput('name');
}


public function changepassword(){
    return view('pages.changepassword');
}


public function signupConfig(Request $request){
    $formData = $request->validate([
    'name' => ['required', 'min:6'],
    'email' => ['required', 'email', Rule::unique('users', 'email')],
    'password' => 'required|confirmed|min:6'
    ]);

      //Hash password
      $formData['password'] = bcrypt($formData['password']);

      //create user
      $user = User::create($formData);

      //Login
      auth()->login($user);

      return redirect('/dashboard')->with('message', 'user created and logged in');

}

public function logout(Request $request){
    auth()->logout();

        //To invalidate session and regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
}
}
