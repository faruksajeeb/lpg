

@extends('master')
<link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets')}}/admin/css/bootstrap.min.css">
@section('mainContent')

<div class="row">
    <h1 style="text-align: center;font-size: 25px;">Payment Form</h1>
    <div class="col-md-2"></div>
    <div class="col-md-8">
{!! Form::open(['url'=>'save-order','method'=>'POST'])!!}
       <div class="row" style="margin-bottom:10px;color:white;text-align: left">
            <div class="col-md-2"></div>
            <div class="col-md-2">Select payment method:</div>
            <div class="col-md-6"> 
                <div class="row"> 
                    <input type="radio" class="" name="payment_method" value="cash_on_delivery" />
                    <strong>Cash on delivery</strong>
               </div> 
                <div class="row"> 
                    <input type="radio" class="" name="payment_method" value="paypal" />
                    <strong>Pay Pal</strong>
               </div> 
                
                <input type="submit" class="btn btn-primary" name="shipping_name" value="Submit Order" />
            </div>
            <div class="col-md-2"></div>
        </div>
     

{!! Form::close() !!}

    </div>
    <div class="col-md-2"></div>
</div>
@endsection