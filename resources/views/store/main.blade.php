@extends('layouts.store')
@section('title','Main')

@section('content')
        <div class="row row-centered">
        @foreach($goods as $good)
        <div class="col-md-4 mb-4 mt-4 justify-content center">
            <div class="card text-center content-center" >
                <img style="width: 50%;" src="{{asset('images/'.$good->image)}}" class="card-img-top mx-auto" alt="...">
                <div class="card-body">
                    <h5 class="card-title ">{{$good->brand}}  {{$good->model}}</h5>
                    <p class="card-text">{{$good->information}}</p>
                    <a href="{{route('post',['id'=>$good->id])}}" class="btn btn-primary">Full information</a>
                    <a href="{{route('addToBasket',['id'=>$good->id])}}" class="btn btn-primary">Add To Cart</a>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    {{$goods->links()}}
@endsection