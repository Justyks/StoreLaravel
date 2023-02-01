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
        $good=new Good($validated);
        $good->user_id=Auth::id();
        $good->brand_id=$request->input('brand_id');
        $good->save();
        return redirect()->route('main');
    }
}
