<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use App\Http\Requests\SignUpRequest;

class SignUpController extends Controller
{
    public function register(SignUpRequest $request)
    {
        $validated=$request->validated();
        $user=new User($validated);
        $user->save();
        session()->flash('succes','User added');
        return redirect('main');
    }

    public function registerForm()
    {
        return view('auth.signUp');
    }
}
