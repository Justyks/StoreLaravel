@extends('layouts.store')
@section('title','$postInfo->id')

@section('content')      
<div class="card" style="width: 18rem;">
             <img src="{{asset('images/'.$postInfo->image)}}" class="card-img-top" alt="...">
             <div class="card-body">
                <h5 class="card-title">{{$postInfo->brand->brand}}  {{$postInfo->model}}</h5>
                <p class="card-text">{{$postInfo->information}}</p>
                <a href="{{route('post',['id'=>$postInfo->id])}}" class="btn btn-primary">Full information</a>
                <a href="{{route('addToBasket',['id'=>$postInfo->id])}}" class="btn btn-primary">Add To Cart</a>
            </div>
        </div>

@endsection