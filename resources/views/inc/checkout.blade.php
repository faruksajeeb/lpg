

@extends('master')
<link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets')}}/admin/css/bootstrap.min.css">
@section('mainContent')

<div class="row">
    <h1 style="text-align: center;font-size: 25px; padding: 40px; font-family: sans-serif;">Checkout Form</h1>
    <div class="col-md-2"></div>
    <div class="col-md-8">
{!! Form::open(['url'=>'customer-registration','method'=>'POST'])!!}
        <div class="row" style="margin-bottom:10px;">
            <div class="col-md-2"></div>
            <div class="col-md-2">Customer Name:</div>
            <div class="col-md-6"> <input type="text" class="form-control" name="customer_name" value="" /></div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-md-2"></div>
            <div class="col-md-2">Customer Email:</div>
            <div class="col-md-6"> <input type="text" class="form-control" name="customer_email" value="" /></div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-md-2"></div>
            <div class="col-md-2">Password:</div>
            <div class="col-md-6"> <input type="text" class="form-control" name="password" value="" /></div>
            <div class="col-md-2"></div>
        </div>
         <div class="row" style="margin-bottom:10px;">
            <div class="col-md-2"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"> <input type="submit"  class="btn btn-primary form-control"  value="Submit" /></div>
            <div class="col-md-2"></div>
        </div>


{!! Form::close() !!}

    </div>
    <div class="col-md-2"></div>
</div>
@endsection