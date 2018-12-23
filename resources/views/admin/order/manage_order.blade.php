
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
        <h2> Manage Order ( {{ $orderInfo->total() }} )</h2>

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
                <span style=""><em>show {{ $orderInfo->count()}} of {{$orderInfo->total()}} | Page no: {{ $orderInfo->currentPage()}} | 
                        <a href="{{$orderInfo->previousPageUrl()}}"><< Previous</a> | <a href="{{$orderInfo->nextPageUrl()}}">Next >> </a> </em></span> 
                <a href="{{ url('/export-excel/')}}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-export"> Export from View</span></a> 
                <a href="{{ url('/export-excel-order/')}}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-export"> Export to Excel</span></a> 
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl no.</th>
                            <th>Customer name</th>
                            <th>Shipping name</th>
                            <th>Payment Type</th>
                            <th>Order Total</th>
                            <th>Order Status</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderInfo as $singleOrder)
                        <tr>
                            <td>{{ $singleOrder->id }}</td>                            
                            <td>{{ $singleOrder->customer_name }}</td>
                            <td>{{ $singleOrder->shipping_name }}</td>
                            <td>{{ $singleOrder->payment_type }}</td>
                            <td>{{ $singleOrder->order_total }}</td>
                            <td>{{ $singleOrder->order_status }}</td>
                            <td>{{ $singleOrder->created_at }}</td>
                            <td>                              
                                <a href="{{ url('/view-order/'.$singleOrder->id)}}" class="btn btn-default"><span class="glyphicon glyphicon-zoom-in"></span></a> 
                                <a href="{{ url('/download-order/'.$singleOrder->id)}}" target="_blank" class="btn btn-info"><span class="glyphicon glyphicon-download"></span></a> 
                                
                                <a href="{{ url('/edit-order/'.$singleOrder->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a> 
                                <a href="{{ url('/delete-order/'.$singleOrder->id)}}" class="btn btn-danger" onclick="return confirmDelete();"><span class="glyphicon glyphicon-remove"></span></a> 
                            </td>                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orderInfo->links()}}
            </div>
        </div>
        <!-- end widget content -->

    </div>
    <!-- end widget div -->

</div>
@endsection