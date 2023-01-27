@extends('master')
@section('content')
<div class="custom-product">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
        @foreach ($products as $item)
        
          <div class="item {{$item['id']==1?'active':''}}">
            <a href="details/{{$item['id']}}">
              <img class="slider-img" src="{{$item['gallery']}}" alt="{{$item['name']}}">
            
            <div class="carousel-caption">
                <h3 style="font-size: 50px">{{$item['category']}}</h3>
                <p style="color: blue;font-size: 50px">{{$item['description']}}</p>
            </div>
          </a>
          </div>
        
        @endforeach
        </div>
      
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="trending-wrapper">
        <h3>Trending Products</h3>
        <div class="carousel-inner">
       @foreach ($products as $item)
        <a href="details/{{$item['id']}}">
          <div class="trending-item">
            <img class="trending-image" src="{{$item['gallery']}}" alt="{{$item['name']}}">
            <div class="">
                <h3>{{$item['category']}}</h3>
                
            </div>
          </div>
        </a>
        @endforeach
        </div>
      </div>
</div>
@endsection