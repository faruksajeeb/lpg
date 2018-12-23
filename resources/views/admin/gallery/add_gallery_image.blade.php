
@extends('admin.dashboard')

@section('content')
<div class=" col-md-3"></div>
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
        <h2>Gallery form </h2>				

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
                {!! Form::open(['id'=>'order-form','url' => '/save-gallery-image','method'=>'POST',
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

                <fieldset>
                    <div class="row">
                        <section class="col col-md-12">
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                               
                                <input type="text" name="image_name" placeholder="Image Name">
                            </label>
                        </section>

                    </div>
                  
                    <div class="row">
                        <section class="col col-md-12">
                   
                               
                                Upload Image:     <input id="" type="file" name="gallery_image" >
                           
                        </section>

                    </div>
                    <div class="row">
                        <section class="col col-md-12">
                            <label class="input"> Description:
                                <textarea name="description" rows="3" style="width:100%;" >
                                    
                                </textarea>
                           </label>
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
<div class=" col-md-3"></div>
<script>
    $(document).ready(function () {
   
        pageSetUp();


    });

</script>
@endsection