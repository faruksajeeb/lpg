<style>
         .top_menu_fixed{  /* To fix main menu container */
    z-index: 9999;
    position: fixed;
	opacity:0.8;
    transition:2s;
    top:0;
    /*width: 100%;*/
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
</style>
<div class="container_12" id="top_menu">
        <div class="grid_12">
            <div class="menu_block">

                <nav   class="" >
                    <ul class="sf-menu">
                        <li class="clickable " id="home"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="clickable " id="about"><a href="{{ route('about') }}">About Us</a>
                            <!-- 
                            <ul>
                 <li><a href="#">history</a></li>
                 <li><a href="#">news</a>
                     <ul>
                     <li><a href="#">latest       </a></li>
                     <li><a href="#">archive</a></li>
                   </ul>
                 </li>
                 <li><a href="#">testimonials</a></li>
              </ul>
                            -->
                        </li>
                        <li class=" " id="product"><a href="{{ url('/product') }}">Products</a></li>
                        <li class=" " id="gallery" ><a href="{{ url('/gallery') }}">Gallery</a>
<!--                            <ul>
                                <li><a href="#">TVC</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Photo Gallery</a></li>
                                <li><a href="#">Video Gallery</a></li>

                            </ul>-->

                        </li>
                        <li class="clickable " id="safety_concern" ><a href="{{ url('/safety-concern') }}">Safety Concern</a></li>
                        <li class="clickable " id="contact"><a href="{{ url('/contact') }}">Contacts </a></li>
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
        </div>
    </div>
<script>
        $(document).ready(function(){
           
            var topMenu=$('.menu_block');
            $(window).scroll(function(){
//                 alert(0);
                if($(this).scrollTop()> 150){
                    topMenu.addClass('top_menu_fixed');
                }else{
                    topMenu.removeClass('top_menu_fixed');
                }
            });
        });
        </script>