<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddingRequest;
use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show()
    {
        return view('store.addPost');
    }

    public function add(AddingRequest $request)
    {
        $validated=$request->validated();
        $imageName = time().'.'. $request->file('image')->extension();
        $request->file('image')->move(public_path('images'), $imageName); 
        $good=new Good($validated);
        $good->user_id=Auth::id();
        $good->brand_id=$request->input('brand_id');
        $good->image=$imageName;
        $good->save();
        return redirect()->route('main');
    }
}
