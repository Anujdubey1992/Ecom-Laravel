@extends('master')
@section('content')
<div class="custom-product">
  
  <div class="col-sm-10">
      <div class="trending-wrapper">
            <h3>Result For Products</h3>
            <a href="ordernow" class="btn btn-success">ordernow</a><br><br>
            @foreach ($products as $item)
                <div class="row searched-item cart-list-devider">
                <div class="col-sm-4">
                <a href="details/{{$item->id}}">
                  <img class="trending-image" src="{{$item->gallery}}" alt="{{$item->name}}">
                </a>
                </div>
                <div class="col-sm-4">
                   <div class="">
                    <h2>{{$item->name}}</h2>
                    <h3>{{$item->description}}</h3>
                    </div>
                </div>

                  <div class="col-sm-4">
                      <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove to cart</a>
                    </div>

                </div>
            @endforeach
                 </div>
                 <a href="ordernow" class="btn btn-success">ordernow</a><br><br>
      </div>
  </div>
</div>
@endsection