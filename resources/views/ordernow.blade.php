@extends('master')
@section('content')
<div class="custom-product">
  <div class="col-sm-10">
    <table class="table table-striped">
        
        <tbody>
          <tr>
            <td>Amount</td>
            <td>$ {{$total}}</td>
            
          </tr>
          <tr>
            <td>Tax</td>
            <td>$ 0</td>
            
          </tr>
          <tr>
            <td>Delivery</td>
            <td>$ 10</td>
            
          </tr>
          <tr>
            <td>Total Amount</td>
            <td>$ {{$total+10}}</td>
            
          </tr>
        </tbody>
      </table>
      <div>
        <form action="/orderplace" method="POST">
            @csrf
            <div class="form-group">
              <textarea name="address" placeholder="Please enter your address" class="form-control"></textarea>
               
            </div>
            <div class="form-group">
              <label for="pwd">Payment Method:</label><br>
              <input type="radio" value="online" name="payment">&nbsp;<span>Online Payment</span><br>
              <input type="radio" value="emi" name="payment">&nbsp;<span>EMI Payment</span><br>
              <input type="radio" value="cash" name="payment">&nbsp;<span>Cash on Delivery</span><br>
            </div>
            
            <button type="submit" class="btn btn-success">Order Now</button>
          </form>
      </div>
  </div>
</div>
@endsection