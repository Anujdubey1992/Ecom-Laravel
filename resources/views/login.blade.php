@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 custome-login">
            <form action="login" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                
                <button type="submit" class="btn btn-success">Login</button>
              </form>
        </div>
    </div>
</div>
@endsection