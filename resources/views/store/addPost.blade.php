@extends('layouts.store')

@section('title','Add your offer')

@section('content')
<div class="container">
<form action="{{route('addPost')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3 mt-3">
    <label for="exampleInputEmail1" class="form-label">Model</label>
    <input type="text" class="form-control" name="model" value="{{old('model')}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Information</label>
    <input type="text" class="form-control" id="exampleInputEmail1" value="{{old('information')}}" name="information">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Size</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="size" value="{{old('size')}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Memory</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="memory" value="{{old('memory')}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Weight</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="weight" value="{{old('weight')}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Brand</label>
    <select name="brand_id" class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  @php
    $brands=App\Models\Brand::get();
  @endphp
  @foreach($brands as $brand)
    <option value="{{$brand->id}}">{{$brand->brand}}</option>
  @endforeach
</select>
  </div>
  <div class="mb-3">
    <label class="form-label" for="inputImage">Select Image:</label>
    <input type="file" name="image" class="form-control">
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