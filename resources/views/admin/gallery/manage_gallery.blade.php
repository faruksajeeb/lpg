
@extends('admin.dashboard')

@section('content')
<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
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
        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
        <h2>Manage Gallery ( {{ $images->total() }} )</h2>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget edit box -->
        <div class="jarviswidget-editbox">
            <!-- This area used as dropdown edit box -->

        </div>
        <!-- end widget edit box -->

        <!-- widget content -->
        <div class="widget-body">
            
              @if ($message = Session::get('msg'))

                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>

                    @endif
         
            <div class="table-responsive">
 <span style=""><em>show {{ $images->count()}} of {{$images->total()}} | Page no: {{ $images->currentPage()}} | 
         <a href="{{$images->previousPageUrl()}}"><< Previous</a> | <a href="{{$images->nextPageUrl()}}">Next >> </a> </em></span> 
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl no.</th>
                            <th>Image Name</th>
                            <th>photo</th>
                            <th>description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl_no=1; ?>
                        @foreach($images as $image)
                        <tr>
                            <td>{{ $sl_no }}</td>
                            <td>{{ $image->image_name }}</td>
                             <td><img src="{{ $image->image_url }}" width="30"/></td>
                             <td>{{ $image->description }}</td>
                            <td> 
                                <?php 
                                echo $image->publication_status=='1'? 
                                        " <span class='label label-success'>Published</span>":
                                        " <span class='label label-danger'>Unpublished </span>" 
                                ?> 
                            </td>
                            <td>                      
                                @if($image->publication_status==1)                                
                                <a href="{{ url('/update-gallery-image-status/unpublish/'.$image->id)}}" title="Unpublish"><span class="glyphicon glyphicon-arrow-down btn btn-danger"></span></a>
                                @else
                                <a href="{{ url('/update-gallery-image-status/publish/'.$image->id)}}" title="Publish"><span class="glyphicon glyphicon-arrow-up btn btn-success"></span></a>
                                @endif
                                
                                <a href="{{ url('/view-gallery-image/'.$image->id)}}">View</a> | 
                                <a href="{{ url('/edit-galllery-image/'.$image->id)}}">Edit</a> | 
                                <a href="{{ url('/delete-image/'.$image->id)}}" onclick="return confirmDelete();" class="btn btn-danger">Delete</a> 
                                
                            </td>                           
                        </tr>
                       <?php $sl_no++; ?>
                       @endforeach
                     
                    </tbody>
                    
                </table>
  {{ $images->links()}}
            </div>
        </div>
        <!-- end widget content -->

    </div>
    <!-- end widget div -->

</div>
@endsection