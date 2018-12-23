
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
        <h2>Category Table ( {{ $categories->total() }} )</h2>

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
         
            <div class="table-responsive">
                
                   @if ($message = Session::get('msg'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{!! $message !!}</strong>
                        </div>
                    @endif
                     <span style=""><em>show {{ $categories->count()}} of {{$categories->total()}} | Page no: {{ $categories->currentPage()}} | 
         <a href="{{$categories->previousPageUrl()}}"><< Previous</a> | <a href="{{$categories->nextPageUrl()}}">Next >> </a> </em></span> 
               
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl no.</th>
                            <th>Category name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td> {{ $category->publication_status=='1'? "Published":"Unpublished" }} </td>
                            <td>
                                 @if($category->publication_status==1)                                
                                <a href="{{ url('/update-category-status/unpublish/'.$category->id)}}" title="Unpublish"><span class="glyphicon glyphicon-arrow-down btn btn-danger"></span></a>
                                @else
                                <a href="{{ url('/update-category-status/publish/'.$category->id)}}" title="Publish"><span class="glyphicon glyphicon-arrow-up btn btn-success"></span></a>
                                @endif
                                
                                <a href="{{ url('/edit-category/'.$category->id)}}" class="btn btn-warning">Edit</a>  
                                <a href="{{ url('/delete-category/'.$category->id)}}" onclick="return confirmDelete();" class="btn btn-danger">Delete</a> 
                                
                            </td>                           
                        </tr>
                       @endforeach
                    </tbody>
                </table>
{{ $categories->links() }}
            </div>
        </div>
        <!-- end widget content -->

    </div>
    <!-- end widget div -->

</div>
@endsection