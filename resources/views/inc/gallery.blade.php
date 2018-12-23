@extends('master')

@section('mainContent')
<link href="{{asset('resources/assets')}}/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->

<script>
    $(document).ready(function () {
        $('#gallery').addClass("current");
    });

</script>
<style>
    .btn:focus, .btn:active, button:focus, button:active {
        outline: none !important;
        box-shadow: none !important;
    }
    .cart-button{
        width:70px;
    }
    .h_top{
        padding-bottom: -20px !important;
    }
    #top_menu{margin-top:-60px;}


</style>
<link rel="stylesheet" href="{{asset('resources/assets')}}/css/smoothbox.css" type='text/css' media="all" />

	<!-- lightbox -->
<div style="min-height: 400px;">
    <div class="content page1">
        <div class="container_12 product">
            <div class="grid_12">
                <h4 class="" align="center" style="color:#FFF; ">Gallery</h4>

                <div class="container">
                        <div class="row">
                            @foreach($galleryData as $singleData)
                            <div class="col-sm-4 agileits_w3layouts_gallery_grid1 w3layouts_gallery_grid1 hover14">
                                <div class="w3_agile_gallery_effect">
                                    <a href="{{$singleData->image_url}}" class="sb" title="{{$singleData->image_name}}">
                                        <figure>
                                            <img src="{{$singleData->image_url}}" alt=" " class="img-fluid" style="height:200px;width:100%; border-radius: 5px; border:5px solid #FFF" />
                                        </figure>
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                </div>
            </div>

        </div>
    </div>
</div>
        
	<!-- projects light box -->
	<script src="{{asset('resources/assets')}}/js/smoothbox.jquery2.js"></script>
	<!-- //projects light box -->
@endsection('mainCOntent')
