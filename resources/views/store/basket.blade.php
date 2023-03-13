@extends('layouts.store')
@section('title','Cart')

@section('content')
@if(empty($goods))
<div class="container">
<div class="alert alert-warning" role="alert">
  Your cart is empty
</div>
</div>
@else
<table class="table">
  <thead>
    <tr>
      <th scope="col">Good</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($goods as $good)
    <td>{{$good->model}}</td>
    <td>
      <form action="{{ route('basket.minus', ['id' => $good->id]) }}"
          method="post" class="d-inline">
        @csrf
        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
            <i class="fas fa-minus-square"></i>
        </button>
      </form>
    <span class="mx-1">{{$good->pivot->quantity}}</span>
      <form action="{{ route('basket.plus', ['id' => $good->id]) }}"
          method="post" class="d-inline">
        @csrf
        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
            <i class="fas fa-plus-square"></i>
        </button>
      </form>
    </td>
    @endforeach
  </tbody>
</table>
@endif
@endsection