

@extends('master')
<link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets')}}/admin/css/bootstrap.min.css">
@section('mainContent')

<div class="row">
    <h1 style="text-align: center;font-size: 25px; padding: 40px; ">Shipping Form</h1>
    <div class="col-md-2"></div>
    <div class="col-md-8">
{!! Form::open(['url'=>'save-shipping-info','method'=>'POST'])!!}
@csrf
       <div class="row" style="margin-bottom:10px;">
            <div class="col-md-2"></div>
            <div class="col-md-2">C/O:</div>
            <div class="col-md-6"> <input type="text" class="form-control" name="shipping_name" value="" /></div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-md-2"></div>
            <div class="col-md-2">Mobile:</div>
            <div class="col-md-6"> <input type="text" class="form-control" name="mobile" value="" /></div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-md-2"></div>
            <div class="col-md-2">Address:</div>
            <div class="col-md-6"> <textarea class="form-control" name="address" value="" ></textarea></div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-md-2"></div>
            <div class="col-md-2">City:</div>
            <div class="col-md-6"> <input type="text" class="form-control" name="city" value="" /></div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-md-2"></div>
            <div class="col-md-2">Country:</div>
            <div class="col-md-6"> <input type="text" class="form-control" name="country" value="" /></div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-md-2"></div>
            <div class="col-md-2">Zip code:</div>
            <div class="col-md-6"> <input type="text" class="form-control" name="zip_code" value="" /></div>
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