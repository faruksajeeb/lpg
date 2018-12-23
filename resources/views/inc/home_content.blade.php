@extends('master')

@section('mainContent')

@include('inc.slider')
<!--=======content================================-->
<script>
     $(document).ready(function(){
      $('#home').addClass("current");
    });
</script>

<div class="content page1">
    <div class="container_12 product table-responsive">
        <div class="grid_12">
            <h3 class="center">welcome to <span style="color:red;">BARAKA </span> Limited</h3>
        </div>
        <div class="clear"></div>
        @foreach($products as $product)
        <div class="grid_4" style="margin-bottom: 20px;">
            <div class="box maxheight">
                <img src="{{ asset($product->product_pic) }}"  alt=""  style="width:100%;height:400px;">
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
<!--
<div class="gray">
  <div class="container_12">
    <div class="grid_12">
      <h4><em class="wrap">recent services</em> <span></span></h4>
    </div>
    <div class="clear"></div>
    <div class="grid_3">
      <img src="images/page1_img4.jpg" alt="" class="img_inner">
      <div class="text1">Environmental &amp; Safety Services</div>At vero eos et accusamus et iusto <br>
      <a href="#" class="link1">Details</a>
    </div>
    <div class="grid_3">
      <img src="images/page1_img5.jpg" alt="" class="img_inner">
      <div class="text1">Offshore Drilling Services</div>At vero eos et accusamus et iusto <br>
      <a href="#" class="link1">Details</a>
    </div>
    <div class="grid_3">
      <img src="images/page1_img6.jpg" alt="" class="img_inner">
      <div class="text1">Oil Transportation Services</div>At vero eos et accusamus et iusto <br>
      <a href="#" class="link1">Details</a>
    </div>
    <div class="grid_3">
      <img src="images/page1_img7.jpg" alt="" class="img_inner">
      <div class="text1">Computing Facilities</div>At vero eos et accusamus et iusto <br>
      <a href="#" class="link1">Details</a>
    </div>
  </div>
</div>
-->
<!--
<div class="white">
  <div class="container_12">
    <div class="grid_7">
      <h4>What’s new?</h4>
      <div class="fl1">
        <div class="pad3">
          <time datetime="2013-01-01">December 20, 2013</time>
          <div class="text2">Nam libero tempore, cum soluta nobis est eligendi optio cumque</div>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat. <br>
          <a href="#" class="link2">read more</a><a href="#" class="comment">comments 0</a>
        </div>
      </div>
      <div class="fl1">
          <time datetime="2013-01-01">December 15, 2013</time>
          <div class="text2">Massa tempore, cum soluta nobis est eligendi optio cumque dolore</div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>Es dolore magna aliqua. Ut enim aminim veniam, quis nostrud exercitation ullamo laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in.      <br>
          <a href="#" class="link2">read more</a><a href="#" class="comment">comments 0</a>
      </div>
    </div>
    <div class="grid_5">
      <h4 class="head1">testimonials</h4>
      <blockquote>
        <p>
          <img src="images/quote.png" alt="">
          At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint” 
        </p>
        <span>Alex Green ,  Germany</span>
      </blockquote>
      <div class="alright"><a href="#" class="link2">view all </a></div>
    </div>
  </div>
</div>
-->

@endsection('mainCOntent')
