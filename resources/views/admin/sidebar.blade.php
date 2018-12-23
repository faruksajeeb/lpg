<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
        <span> <!-- User image size is adjusted inside CSS, it should stay as it --> 

            <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                <img src="{{asset('resources/assets')}}/admin/img/avatars/sunny.png" alt="me" class="online" /> 
                <span>
                    {{ Auth::user()->name }} 
                </span>
                <i class="fa fa-angle-down"></i>
            </a> 

        </span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
        <ul>
            <li class="active">
                <a href="{{URL::to('/dashboard')}}" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
            </li>
            
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">Tables</span></a>
                <ul>
                    <li>
                        <a href="{{ url('/manage-category') }}">Category</a>
                    </li>
                    <li>
                        <a href="{{ url('/manage-product') }}">Product</a>
                    </li>
                     <li>
                        <a href="{{ url('/manage-gallery') }}">Gallery</a>
                    </li>
                    <li>
                        <a href="{{ url('/manage-order') }}">Order</a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Entry</span></a>
                <ul>
                    <li>
                        <a href="{{ url('/add-category')}}">Add category</a>
                    </li>
                    <li>
                        <a href="{{ url('/add-product')}}">Add product</a>
                    </li>
                    <li>
                        <a href="{{ url('/add-gallery-image')}}">Add Gallery Image</a>
                    </li>
                   
                </ul>
            </li>
            
            

        </ul>
    </nav>
    <span class="minifyme" data-action="minifyMenu"> 
        <i class="fa fa-arrow-circle-left hit"></i> 
    </span>

</aside>