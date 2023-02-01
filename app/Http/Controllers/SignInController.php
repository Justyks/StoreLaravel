<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
   public function signInForm()
   {
        return view('auth.signIn');
   }

   public function signIn(SignInRequest $request)
   {
        $credentials = $request->validated();
        
        if(Auth::attempt($credentials)){
            session()->flash('success','signed in');
            return redirect()->route('main');
        }
        session()->flash('failed','The provided credentials are incorrect');
        return back()->withErrors([
            'password'=>'The provided credentials do not match our records.'
        ])->withInput();
   }

   public function logout()
   {
       Auth::logout();
       return redirect()->route('signInForm');
   }
}
