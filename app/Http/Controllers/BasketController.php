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
            abort(404);
        }
    }
    public function add(Request $request,$id)
    {
        $basket_id=$request->cookie('basket_id');
        if(empty($basket_id))
        {
            $basket=Basket::create();
            $basket_id=$basket->id;
        }else
        {
            $basket=Basket::findOrFail($basket_id);
            $basket->touch();
        }
        if($basket->goods->contains($id))
        {
            $pivotRow=$basket->goods()->where('good_id',$id)->first()->pivot;
            $quantity=$pivotRow->quantity+1;
            $pivotRow->update(['quantity'=>$quantity]);
        }else
        {
            $basket->goods()->attach($id,['quantity'=>1]);
        }
        return back()->withCookie(cookie('basket_id',$basket_id,60));
    }

    public function plus(Request $request,$id)
    {
        $basket_id=$request->cookie('basket_id');
        if(empty($basket_id))
        {
            abort(404);
        }
        $this->change($basket_id,$id,1);
        
        return redirect()->route('showBasket')->withCookie(cookie('basket_id',$basket_id,60));
    }

    public function minus(Request $request,$id)
    {
        $basket_id=$request->cookie('basket_id');
        if(empty($basket_id))
        {
            abort(404);
        }
        $this->change($basket_id,$id,-1);
        
        return redirect()->route('showBasket')->withCookie(cookie('basket_id',$basket_id,60));
    }

    private function change($basket_id,$product_id,$count=0)
    {
        if($count == 0)
        {
            return;
        }
        $basket = Basket::findOrFail($basket_id);
        if($basket->goods->contains($product_id))
        {
            $pivotRow=$basket->goods()->where('good_id',$product_id)->first()->pivot;
            $quantity=$pivotRow->quantity + $count;
            if($quantity == 0)
            {
                $pivotRow->delete();
            }else
            {
                $pivotRow->update(['quantity'=>$quantity]);
                $basket->touch();
            }
        }
    }
}
