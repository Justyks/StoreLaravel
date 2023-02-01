<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Good;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function main(Request $request)
    {
        if($request->has('search'))
        {
            $goods=Good::selectRaw('goods.*, brands.brand')
                ->where('model','like','%'.$request->input('search').'%')
                ->join('brands','brands.id','=','goods.brand_id')
                ->orWhere('brand','like','%'.$request->input('search').'%')
                ->orWhere('information','like','%'.$request->input('search').'%')
                ->orWhere('size','like','%'.$request->input('search').'%')
                ->orWhere('memory','like','%'.$request->input('search').'%')
                ->orWhere('weight','like','%'.$request->input('search').'%')
                ->paginate(10);
        }else{
            $goods=Good::selectRaw('goods.*, brands.brand')
                ->leftJoin('brands','goods.brand_id','=','brands.id')
                ->paginate(10);

        }
        return view('store.main',[
            'goods'=>$goods
        ]);
    }

    public function showPost($id)
    {
        $post=Good::find($id);
        return view('store.post',[
            'postInfo'=>$post
        ]);
    }

    public function showUserPosts($id)
    {
        $posts=User::find($id)->goods()->get();
        return view('store.userPosts',[
            'posts'=>$posts
        ]);
    }
}
