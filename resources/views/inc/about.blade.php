@extends('master')

@section('mainContent')
<script>
     $(document).ready(function(){
      $('#about').addClass("current");
    });
</script>
  <div class="container_12">
    <div class="grid_12">
      <h4><em class="wrap">About Us</em><span></span></h4>
	  <hr/>
      <div class="blog" style="text-align:justify;">
        
        <img src="{{asset('resources/assets')}}/images/page5_img1.jpg" alt="" class="img_inner" style="float:left; margin:10px; border:3px solid #ccc;">
        <p>
            BARAKA Ltd. is one of the subsidiaries of Ahmed Amin Group established on 28th April, 
            1998 engaged in manufacturing and marketing different consumer goods in the country.
            In this process, this company, with its experienced and capable staff, 
            endeavors to continuously review and improve upon its products and services ensuring 
            the highest quality with optimum satisfaction to the customers. BARAKA Ltd.
            has developed a well entrenched distribution network in the country for marketing 
            its various products in the most efficient and successful manner possible.Baraka Ltd. 
            is also involved with a number of foreign renowned companies in this endeavor.
        </p>
        <p>
            In order to achieve the optimum amount of efficiency, BARAKA Ltd.
            has been divided into different working divisions. 
            Brief details are enumerated below:
        </p>
        <h5>BARAKA Ltd - LPG Division </h5>
        <p>
            BARAKA Ltd. (LPG Division) is one of the wing of Baraka Limited entrusted for importation, 
            bottling, distribution and marketing of LPG throughout the country.
        </p>
        <p>
            Study has shown LPG consumption in 2015 stood at 200,000 MT, which soared to 300,000 MT in 2016.
            Demand is estimated to rise to around 400,000 tones in 2018. 
            It is to be recognized that LPG has a great future in Bangladesh.
        </p>
        <p>
            In order to cope with the need for accelerating the growth of LPG in Bangladesh and to 
            contribute the national economy, Management of Baraka Ltd.
            is constructing an import based LPG bottling plant at Mongla, Bagerhat, Bangladesh.
        </p>
        
        <p>
            Baraka Ltd. (LPG Division) will also build a LPG Cylinder manufacturing plant to
            cope up with growing demand of LPG market in the country.
        </p>
 
       
      </div>

    </div>
   
  </div>


@endsection('mainCOntent')
