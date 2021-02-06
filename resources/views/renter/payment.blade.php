@extends('renter.layout.app')

@section('main-panel')
<div class="page-header">
    <h3 class="page-title">
        Payment Method
    </h3>
</div>
<form action="{{ route('payment') }}"  method="post">
@csrf
  <div class="form-row">
  <div class="form-group col-md-6">
     <h4> <label for="inputPassword4">Name</label> </h4>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Enter Your Name">
    </div>
    <div class="form-group col-md-6">
     <h4> <label for="inputEmail4">Email</label> </h4>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
     <h4> <label for="inputPassword4">Owner Name</label></h4>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Enter Your Name">
    </div>
  </div>
  <div class="form-group">
   <h4> <label for="inputAddress">Address</label></h4>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
 <!-- <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>-->
  <div class="form-row">
    <div class="form-group col-md-6">
    <h4>  <label for="inputCity">City</label> </h4>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <br>
    <div class="form-group col-md-6">
     <h4> <label for="inputCity">Holding No</label></h4>
      <input type="number" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-6">
      <h4><label for="inputCity">Flat Name</label></h4>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-6">
     <h4> <label for="inputCity">Amount</label></h4>
      <input type="number" class="form-control" id="inputCity">
    </div>
    
  </div>
  <div class="row">
                <div class="col-lg-8">
                  <div class="invbody-terms">
                    
                    <br>
                    <h4>Payment Terms and Methods</h4>
                    <p>
                    <img src="{{ asset('assets')}}/frontend/pic1.png" width="100px" height="75px">
                    <img src="{{ asset('assets')}}/frontend/logo3.png" width="100px" height="75px">
                    </p>
                  </div>
                </div>
              </div>
  
  <button type="submit" class="btn btn-primary">Pay Now</button>
</form>
@endsection