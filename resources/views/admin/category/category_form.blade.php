
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
            {!! Form::open(['id'=>'category-form','url' => '/save-category','method'=>'POST',
            'enctype'=>'multipart/form-data','novalidate'=>'novalidate','class'=>'smart-form category-form']) !!}                            
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
            <input type="hidden" name="category_id"  value="<?php if($title=='Edit category'){ echo $categoryById->id;} ?>">

            <fieldset>
                <div class="row">
                    <section class="col col-md-12">
                        <label class="input">
                            <input type="text" name="category_name" placeholder="Category Name" value="<?php if($title=='Edit category'){ echo $categoryById->category_name;} ?>">
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
                            SAVE
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
    var $categoryForm = $("#category-form").validate({
    // Rules for form validation
    rules : {
    category_name : {
    required : true
    }
    },
            // Messages for form validation
            messages : {
            category_name : {
            required : 'Please enter category name'
            }
            },
            // Do not change code below
            errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
            }
    });
    });
     document.forms['category-form'].elements['publication_status'].value =<?php if($title=='Edit category'){ echo $categoryById -> publication_status;} ?>
    
</script>
@endsection