@extends('layouts.store')
@section('title','My posts')

@section('content')
<ul>
        @foreach($posts as $post)
        <div class="card" style="width: 18rem;">
             <img src="1.jpg" class="card-img-top" alt="...">
             <div class="card-body">
                <h5 class="card-title">{{$post->brand->brand}}  {{$post->model}}</h5>
                <p class="card-text">{{$post->information}}</p>
                <a href="{{route('post',['id'=>$post->id])}}" class="btn btn-primary">Full information</a>
                <a href="{{route('addToBasket',['id'=>$post->id])}}" class="btn btn-primary">Add To Cart</a>
            </div>
        </div>
        @endforeach
    </ul>
@endsection