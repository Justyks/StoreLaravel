@extends('layouts.store')

@section('title','Add your offer')

@section('content')
<div class="container">
<form action="{{route('filterPost')}}" method="POST">
    @csrf
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Model</label>
    <select name="model" class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  @foreach($models as $model)
    <option value="{{$model}}">{{$model}}</option>
  @endforeach
</select>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Sizes</label>
    <select name="size" class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  @foreach($sizes as $size)
    <option value="{{$size}}">{{$size}}</option>
  @endforeach
</select>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Memories</label>
    <select name="memory" class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  @foreach($memories as $memory)
    <option value="{{$memory}}">{{$memory}}</option>
  @endforeach
</select>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Weights</label>
    <select name="weight" class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  @foreach($weights as $weight)
    <option value="{{$weight}}">{{$weight}}</option>
  @endforeach
</select>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Brand</label>
    <select name="brand_id" class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  @foreach($brands as $key=>$brand)
    <option value="{{$key}}">{{$brand}}</option>
  @endforeach
</select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
@endsection