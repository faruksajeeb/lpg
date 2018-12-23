@extends('master')

@section('mainContent')
<script>
     $(document).ready(function(){
      $('#safety_concern').addClass("current");
    });
</script>
<div class="content page1">
  <div class="container_12 product">
    <div class="grid_12">
      <h3 class="">Safety  <span style="color:red;">Concern</span></h3>
	  <hr/>
    </div>
    <div class="clear"></div>
   
    <h2 class="center" style="font-size:30px; text-align: center">User Manual</h2>
    <img src="{{asset('resources/assets')}}/images/user_manual/1.png" alt="" />
    <h2 class="center" style="font-size:30px;text-align: center">User Manual</h2>
    <img src="{{asset('resources/assets')}}/images/user_manual/2.png" alt="" />
  </div>
</div>
@endsection('mainCOntent')
