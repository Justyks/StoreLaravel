<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function show(Request $request)
    {
        
        $basket_id=$request->cookie('basket_id');
        if(!empty($basket_id))
        {
           
            $goods=Basket::findOrFail($basket_id)->goods;//need to fix
            return view('store.basket',[
                'goods'=>$goods
            ]);
        }else
        {
            return view('store.basket',[
                'error'=>'Your basket is empty'
            ]);
        }
    }
    public function add(Request $request,$id)
    {
        // $basket_id=$request->cookie('basket_id');
        // if(empty($basket_id))
        // {
        //     $basket=Basket::create();
        //     $basket_id=$basket->id;
        // }else
        // {
        //     $basket=Basket::findOrFail($basket_id);
        //     $basket->touch();
        // }
        // if($basket->goods->contains($id))
        // {
        //     $pivotRow=$basket->goods()->where('good_id',$id)->first()->pivot;
        //     $quantity=$pivotRow->quantity+1;
        //     $pivotRow->update(['quantity'=>$quantity]);
        // }else
        // {
        //     $basket->goods()->attach($id,['quantity'=>1]);
        // }
        // return back()->withCookie(cookie('basket_id',$basket_id,525600));
    }
}
