@extends('master')

@section('mainContent')
<script>
     $(document).ready(function(){
      $('#product').addClass("current");
    });
</script>
<div class="content page1">
  <div class="container_12 product">
    <div class="grid_12">
      <h3 class="center"> Product Gallery</h3>
    </div>
    <div class="clear"></div>
    @foreach($products as $product)
        <div class="grid_4" style="margin-bottom: 20px;">
            <div class="box maxheight">
                <img src="{{ asset($product->product_pic) }}"  alt="" style="width:100%;height:350px;">
                <div class="pad1">
                    <div class="title">{{ $product->product_name }}</div>
                    <div class="description">
                        <p><strong>Weight:</strong> {{ $product->weight }}</p>
                        <p><strong>Valve Size:</strong> {{ $product->valve_size }}</p>
                        <p><strong>Usage:</strong> {{ $product->category_name }}</p>
                        <p><strong>Valve Type:</strong> {{ $product->valve_type }}</p>		
                    </div>
                    <br>
                    <!-- <a href="#" class="btn">Details</a></div> -->
                </div>
                <a href="{{URL::to('add-to-cart/'.$product->id)}}" class="btn btn-primary">Add to cart</a>
            </div>
        </div>
        @endforeach
    
  </div>
</div>

@endsection('mainCOntent')
