@extends('master')
@section('content')
<div class="custom-product">
  
  <div class="col-sm-10">
      <div class="trending-wrapper">
            <h3>My Orders</h3>
            
            @foreach ($orders as $item)
                <div class="row searched-item cart-list-devider">
                <div class="col-sm-4">
                <a href="details/{{$item->id}}">
                  <img class="trending-image" src="{{$item->gallery}}" alt="{{$item->name}}">
                </a>
                </div>
                <div class="col-sm-4">
                   <div class="">
                    <h2><b>Name:</b> {{$item->name}}</h2>
                    <h5><b>Delivery Status:</b> {{$item->status}}</h5>
                    <h5><b>Address:</b> {{$item->address}}</h5>
                    <h5><b>Payment Method:</b> {{$item->payment_method}}</h5>
                    <h5><b>Payment Status:</b> {{$item->payment_status}}</h5>
                    <h5><b>Date:</b>{{$item->created_at}}</h5>
                    </div>
                </div>

                  

                </div>
            @endforeach
                 </div>
                 
      </div>
  </div>
</div>
@endsection