
@extends('admin.dashboard')

@section('content')
<div class="col-md-3"></div>
<div class="jarviswidget col-md-6" id="wid-id-5" data-widget-editbutton="false" data-widget-custombutton="false">
    <!-- widget options:
            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
            
            data-widget-colorbutton="false"	
            data-widget-editbutton="false"
            data-widget-togglebutton="false"
            data-widget-deletebutton="false"
            data-widget-fullscreenbutton="false"
            data-widget-custombutton="false"
            data-widget-collapsed="true" 
            data-widget-sortable="false"
            
    -->
    <header>
        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
        <h2>{{$title}} form </h2>				

    </header>

    <!-- widget div-->
    <div>

        <!-- widget edit box -->
        <div class="jarviswidget-editbox">
            <!-- This area used as dropdown edit box -->

        </div>
        <!-- end widget edit box -->

        <!-- widget content -->
        <div class="widget-body no-padding">
                {!! Form::open(['id'=>'product-form','url' => '/save-product','method'=>'POST',
                'enctype'=>'multipart/form-data','novalidate'=>'novalidate','class'=>'smart-form client-form']) !!}                            
                            {{ csrf_field() }}
                             @if ($message = Session::get('msg'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif

                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            <?php if($title=='Edit product') { ?>
                            <input type="hidden" name="product_id" value="<?php if($title=='Edit product'){ echo $productById->id;} ?>" />
                            <?php } ?>
                            <fieldset>
                    <div class="row">
                        <section class="col col-md-12">
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input type="text" name="product_name" placeholder="Product Name" value="<?php if($title=='Edit product'){ echo $productById->product_name;} ?>">
                            </label>
                        </section>

                    </div>
                    
                    <div class="row">
                        <section class="col col-md-12">
                           Category:
                           <select  name="category_id" class="form-control" >
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            
                        </section>

                    </div>
                    <div class="row">
                        <section class="col col-md-12">
                            <label class="input"> <i class="icon-append fa fa-dollar"></i>
                                <input type="text" name="price" value="<?php if($title=='Edit product'){ echo $productById->price;} ?>" placeholder="Product Price" >
                            </label> 
                        </section>

                    </div>
                    <div class="row">
                        <section class="col col-md-12">
                            <label class="input"> 
                                <input type="text" name="qty" value="<?php if($title=='Edit product'){ echo $productById->qty;} ?>" placeholder="Product Qty">
                            </label>
                        </section>
                    </div>
                  
                    <div class="row">
                        <section class="col col-md-12">                  
                               
                                Product Image:     <input id="" type="file" name="product_pic" >
                                <?php if($title=='Edit product'){?>
                                <img src="{{asset($productById->product_pic)}}" alt="product Image" width="100" />
                                <?php } ?>
                        </section>

                    </div>
                    <div class="row">
                        <section class="col col-md-12">
                            <label class="input"> Weight:
                                <input type="text" name="weight" value="<?php if($title=='Edit product'){ echo $productById->weight;} ?>" placeholder="Product weight">
                            </label>
                        </section>
                    </div>
                    <div class="row">
                        <section class="col col-md-12">
                            <label class="input"> Valve_size:
                                <input type="text" name="valve_size" value="<?php if($title=='Edit product'){ echo $productById->valve_size;} ?>" placeholder="Product valve_size">
                            </label>
                        </section>
                    </div>
                    <div class="row">
                        <section class="col col-md-12">
                            <label class="input"> Valve_type:
                                <input type="text" name="valve_type" value="<?php if($title=='Edit product'){ echo $productById->valve_type;} ?>" placeholder="Product valve_type">
                            </label>
                        </section>
                    </div>
                     <div class="row">
                        <section class="col col-md-12">
                            <select  name="publication_status" class="form-control" >                                    
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>                                   
                                </select>
                        </section>

                    </div>
                </fieldset>
                <footer>
                    <div class="row">
                        <section class="col col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Save Changes
                            </button>
                        </section>

                    </div>

                </footer>
             {!! Form::close() !!}

        </div>
        <!-- end widget content -->

    </div>
    <!-- end widget div -->

</div>
<div class="col-md-3"></div>
<script>
    $(document).ready(function () {
    //alert(0);
    pageSetUp();
     var $productForm = $("#product-form").validate({
            // Rules for form validation
            rules : {
            product_name : {
            required : true
            },
            product_pic : {
            required : true
            },
            },
                    // Messages for form validation
                    messages : {
                    product_name : {
                    required : 'Please enter product name'
                    },
                    product_pic : {
                    required : 'Please select product image'
                    },
                    },
                    // Do not change code below
                    errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                    }
            });
    });
       document.forms['product-form'].elements['category_id'].value=<?php if($title=='Edit product'){ echo $productById->category_id;} ?>
       
    document.forms['product-form'].elements['publication_status'].value=<?php if($title=='Edit product'){ echo $productById->publication_status;} ?>
</script>
@endsection