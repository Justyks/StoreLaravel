<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function show()
    {
        $models=Good::pluck('model')->unique();
        $sizes=Good::pluck('size')->unique();
        $memories=Good::pluck('memory')->unique();
        $weights=Good::pluck('weight')->unique();
        $brands=Good::join('brands','brands.id','=','goods.brand_id')
            ->pluck('brand','brand_id')
            ->unique();
        return view('store.filter',
            compact("models","sizes","memories","weights","brands"));
    }

    public function filter(Request $request)
    {
        $goods=Good::selectRaw('goods.*, brands.brand')
        ->leftJoin('brands','goods.brand_id','=','brands.id')
        ->get();

        
        if($request->has('model') && $request->input('model')!="Open this select menu")
        {
            $goods=$goods->where('model',$request->input('model'));
        }

        if($request->has('memory') && $request->input('memory')!="Open this select menu")
        {
            $goods=$goods->where('memory',$request->input('memory'));
        }

        if($request->has('size') && $request->input('size')!="Open this select menu")
        {
            $goods=$goods->where('size',$request->input('size'));
        }

        if($request->has('weight') && $request->input('weight')!="Open this select menu")
        {
            $goods=$goods->where('weight',$request->input('weight') );
        }

        if($request->has('brand_id') && $request->input('brand_id')!="Open this select menu")
        {
            $goods=$goods->where('brand_id',$request->input('brand_id'));
            
        }
 
        return view('store.main',[
            'goods'=>$goods->toQuery()
            ->selectRaw('goods.*, brands.brand')
            ->leftJoin('brands','goods.brand_id','=','brands.id')->paginate(10)
        ]);
    }
}
