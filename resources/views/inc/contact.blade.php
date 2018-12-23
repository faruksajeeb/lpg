@extends('master')

@section('mainContent')
<script>
     $(document).ready(function(){
      $('#contact').addClass("current");
    });
</script>
<div class="content page1">
  <div class="container_12 product">
    <div class="grid_12">
      <h3 class="center">Contact<span style="color:red;"> Us</span></h3>
	  <hr/>
    </div>
    <div class="grid_12">
	<div class="container_12">
	<h4><em class="wrap">How to find us</em><span></span></h4>
	<div class="grid_8 map">
	
	
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58980.717267213586!2d89.56694049220401!3d22.493118851432413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a002443c92698d1%3A0xcc234547f8c6ff9a!2sMongla!5e0!3m2!1sen!2sbd!4v1517377961422" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
  
	</div>
	<div class="grid_4">
	 <div class="text1">Baraka Limited | LPG Division. </div>
              <address>
                            <dl>
                                <dt>
                                   Plot # 9, Mongla Port I/A, Mongla, Bagerhat
                                </dt>
                                <dd><span>Freephone:</span>+1 800 000 0000</dd>
                                <dd><span>Telephone:</span>+1 800 000 0000</dd>
                                <dd><span>FAX:</span>+1 800 000 0000</dd>
                                <dd>E-mail: <a href="#" class="link-1">info@barakaltd.com</a></dd>
                            </dl>
                         </address>
                     
	</div>
	</div>
   
    </div>
   
  </div>
</div>


@endsection('mainCOntent')
