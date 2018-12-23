

@extends('master')
<link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets')}}/admin/css/bootstrap.min.css">
@section('mainContent')

<div class="row">
    
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <p style="font-size:25px;">{{$message}}</p>
    </div>
    <div class="col-md-2"></div>
</div>
@endsection