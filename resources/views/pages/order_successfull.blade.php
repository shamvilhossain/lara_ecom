@extends('master')

@section('billing_view')
<section id="aa-error">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-error-area">
            <h2>Done !</h2>
            <span>Your order successfully Placed.</span>
            <p>Please check your email.</p>
            <a href="{{URL::to('/')}}"> Go to Homepage</a>
          </div>
        </div>
      </div>
    </div>
  </section>
   @endsection 