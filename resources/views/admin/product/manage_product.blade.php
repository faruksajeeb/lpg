
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
        <h2>Product Table ( {{ $products->total() }} )</h2>

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
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <span style=""><em>show {{ $products->count()}} of {{$products->total()}} | Page no: {{ $products->currentPage()}} | 
                        <a href="{{$products->previousPageUrl()}}"><< Previous</a> | <a href="{{$products->nextPageUrl()}}">Next >> </a> </em></span> 
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl no.</th>
                            <th>Image</th>
                            <th>Product name</th>
                            <th>Category name</th>

                            <th>Price</th>
                            <th>Weight</th>
                            <th>Valve Size</th>
                            <th>Valve Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><img src="{{ $product->product_pic }}" width="50"/></td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->category_name }}</td>

                            <td>{{ $product->price }}</td>
                            <td>{{ $product->weight }}</td>
                            <td>{{ $product->valve_size }}</td>
                            <td>{{ $product->valve_type }}</td>
                            <td> 
                            <?php 
                                echo $product->publication_status=='1'? 
                                        " <span class='label label-success'>Published</span>":
                                        " <span class='label label-danger'>Unpublished </span>" 
                                ?> 
                            </td>
                            <td>
                                @if($product->publication_status==1)                                
                                <a href="{{ url('/update-product-status/unpublish/'.$product->id)}}" title="Unpublish"><span class="glyphicon glyphicon-arrow-down btn btn-danger"></span></a>
                                @else
                                <a href="{{ url('/update-product-status/publish/'.$product->id)}}" title="Publish"><span class="glyphicon glyphicon-arrow-up btn btn-success"></span></a>
                                @endif
                                <a href="{{ url('/view-product/'.$product->id)}}" class="btn btn-default"><span class="glyphicon glyphicon-zoom-in"></span></a> 
                                <a href="{{ url('/edit-product/'.$product->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a> 
                                <a href="{{ url('/delete-product/'.$product->id)}}" class="btn btn-danger" onclick="return confirmDelete();"><span class="glyphicon glyphicon-remove"></span></a> 

                            </td>                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links()}}
            </div>
        </div>
        <!-- end widget content -->

    </div>
    <!-- end widget div -->

</div>
@endsection