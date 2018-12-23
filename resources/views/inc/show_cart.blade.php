@extends('master')
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets')}}/admin/css/bootstrap.min.css">
@section('mainContent')
<style>
    th{
        background-color: #990000;
    }
    table{
        border:3px solid #990000;
    }
    }
</style>
<div class="row">
    <h1 style="text-align: center;font-size: 25px; padding:10px;">Show Cart ( {{Cart::count()}} )</h1>
    <div class="col-md-2"></div>
<div class="col-md-8">

    <table class="table table-condensed table-responsive table-borderless" >
    <thead>
        
    <th>Sl no</th>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Size</th>
    <th>Weight</th>
    <th>Type</th>
    <th>Qty</th>
    <th>Amount (with tax)</th>
    <th></th>
    </thead>
    <tbody>
        <?php 
        $slNo=1;
        $cartContents=Cart::content();
        ?>
       @foreach($cartContents as $content)       
       <tr>
            <td>{{$slNo}}</td> 
            <td><img src="{{$content->options->image}}" width="70" /></td> 
            <td>{{$content->name}}</td> 
            <td>{{$content->price}}</td> 
            <td>{{$content->options->has('size')?$content->options->size:''}}</td> 
            <td>{{$content->options->weight}}</td> 
            <td>{{$content->options->type}}</td> 
            <td>
                {!! Form::open(['url'=>'update-cart','method'=>'post']) !!}
                
                <input type='hidden'  value='{{$content->rowId}}' name="row_id" />
                <div class="row">
                    <div class="col-md-6">
                        <input type='number' style="color:#000;width:80px;" value='{{$content->qty}}' name="qty" />
                    </div>
                    <div class="col-md-6">
                          <input type="submit" class="btn btn-xs btn-info" value="update" />
                    </div>
                </div>
                
              
                
                {!! Form::close() !!}
            </td> 
             <td>{{$content->total}}</td>
             <td><a href="{{URL::to('delete-cart/'.$content->rowId)}}" class="btn btn-xs btn-danger "><span class="glyphicon glyhicon-remove">X</span></a></td> 
        </tr>
        <?php $slNo++; ?>
          @endforeach
          <tr><td colspan="7"></td><td>Sub Total </td><td>{{Cart::subtotal()}}</td><td></td></tr>
          <tr><td colspan="7"></td><td> Tax (15%) </td><td>{{Cart::tax()}}</td><td></td></tr>
          <tr><td colspan="7"></td><td> Total </td><td>{{Cart::total()}}</td><td></td></tr>
    </tbody>
    
</table>
    <?php
    $shipping_id=Session::get('shipping_id');
    $customer_id=Session::get('customer_id');
    $billing_id=Session::get('billing_id');
    ?>
     @if($customer_id != NULL && $billing_id ==NULL && $shipping_id == NULL)
     <a href="{{URL::to('billing-address')}}" class="btn btn-primary pull-right">Complete Purchase >></a>
     @elseif($customer_id != NULL && $billing_id !=NULL && $shipping_id == NULL)
     <a href="{{URL::to('shipping')}}" class="btn btn-primary pull-right">Complete Purchase >></a>
     @elseif($customer_id != NULL && $billing_id !=NULL && $shipping_id != NULL)
     <a href="{{URL::to('payment')}}" class="btn btn-primary pull-right">Complete Purchase >></a>
     @else
     <a href="{{URL::to('checkout')}}" class="btn btn-primary pull-right">Checkout</a>
     @endif
     
    <a href="{{URL::to('product')}}" class="btn btn-primary pull-right">Continue Shopping</a>
   

    
</div>
     <div class="col-md-2"></div>
</div>
<script>
$(document).ready(function(){
    $('.cart-button').hide();
});

</script>
@endsection