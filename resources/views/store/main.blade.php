@extends('layouts.store')
@section('title','Main')

@section('content')
    <ul>
        @foreach($goods as $good)
        <div class="card" style="width: 18rem;">
             <img src="1.jpg" class="card-img-top" alt="...">
             <div class="card-body">
                <h5 class="card-title">{{$good->brand}}  {{$good->model}}</h5>
                <p class="card-text">{{$good->information}}</p>
                <a href="{{route('post',['id'=>$good->id])}}" class="btn btn-primary">Full information</a>
                <a href="{{route('addToBasket',['id'=>$good->id])}}" class="btn btn-primary">Add To Cart</a>
            </div>
        </div>
        @endforeach
    </ul>
    {{$goods->links()}}
@endsection