@extends('master')
@section('content')
<div class="container">
  <div class="row">
     <div class="col-sm-6">
       <img class="details-img" src="{{$data['gallery']}}">
     </div>
     <div class="col-sm-6">
        <a href="/">Go Back</a>
        <h2>{{$data['name']}}</h2>
        <h3>Price: {{$data['price']}}</h3>
        <h4>Details: {{$data['description']}}</h4>
        <h4>Category: {{$data['category']}}</h4>
        <br><br>
        <form action="/add_to_cart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$data['id']}}">
            <button class="btn btn-primary">Add to Cart</button>
        </form>
        <br>
        <button class="btn btn-success">Buy Now</button>
     </div>
  </div>
</div>
@endsection