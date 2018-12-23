
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
        <a href="{{URL::to('send-email')}}">send Email</a>

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
            {!! Form::open(['id'=>'order-form','url'=>'update-order','method'=>'POST']) !!}
            <input type="hidden" name="order_id" value='{{ $orderInfo->id}}' />
            <input type="hidden" name="payment_id" value='{{ $orderInfo->payment_id}}' />
            <div id="invoice">
            <div class="row"  style="100%">
                <div class="col-md-4"  style="float:left; width:33%">
                    <h3>Billing Address</h3>
                   <div>{{ $orderInfo->customer_name}}</div>
                   <div>{{ $orderInfo->mobile}}</div>
                   <div>{{ $orderInfo->address}}</div>
                   <div>{{ $orderInfo->city}}</div>
                   <div>{{ $orderInfo->country}}</div>
                </div>
                <div class="col-md-4"  style="float:left; width:33%">
                    <h3>Shipping Address</h3>
                   <div>{{ $orderInfo->shipping_name}}</div>
                   <div>{{ $orderInfo->mobile}}</div>
                   <div>{{ $orderInfo->shipping_address}}</div>
                </div>
                <div class="col-md-4"  style="float:left; width:33%">
                    <h3>Invoice Info</h3>
                   <div>Order ID: {{ $orderInfo->id}}</div>
                   <div>Invoice Date: {{ $orderInfo->created_at}}</div>
                   
                   <div>Payment Method: {{ $orderInfo->payment_type}}</div>
                     @if($title=='Edit Order')
                       <div>Payment Status: 
                            <select name="payment_status">
                                <option value="pending" <?php if($orderInfo->payment_status=='pending'){echo "selected='selected'";} ?>>Pending</option>
                                <option value="paid" <?php if($orderInfo->payment_status=='paid'){echo "selected='selected'";} ?>>Paid</option>
                                <option value="partly" <?php if($orderInfo->payment_status=='partly'){echo "selected='selected'";} ?>>Partly</option>
                            </select>
                       </div>
                       <div>Order Status: 
                            <select name="order_status">
                                <option value="pending" >Pending</option>
                                <option value="delivired" >Delivired</option>
                                <option value="completed" >Completed</option>
                            </select>
                       </div>
                    @else
                    <div>Payment Status: {{ $orderInfo->payment_status}}</div>
                    <div>Order Status: {{ $orderInfo->order_status}}</div>
                    @endif
                   
                </div>
                
            </div>
            <div class="table-responsive">
               <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl no.</th>
                            <th>Product name</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Amount (with tax)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $slNo=1; ?>
                        @foreach($orderDetailInfo as $singleOrder) 
                        <tr>
                            <td>{{ $slNo }}</td>                            
                            <td>{{ $singleOrder->product_name }}</td>
                            <td>{{ $singleOrder->product_qty }}</td>
                            <td>{{ $singleOrder->product_price }}</td>
                            <td>{{ $singleOrder->amount }}</td>
                            <td>                              
                                <a href="{{ url('/delete-order-item/'.$singleOrder->id)}}" class="btn btn-xs btn-danger" onclick="return confirmDelete();"><span class="glyphicon glyphicon-remove"></span></a> 
                            </td>                           
                        </tr>
                        <?php $slNo++; ?>
                        @endforeach
                        <tr>
                            <td colspan="3"></td>
                            <th >Total:</th>
                            <th >{{$orderInfo->order_total}}</th>
                            <td ></td>
                        </tr>
                    </tbody>
                </table>
               
               
                         
            </div>
        </div>
             <div class="pull-right">
                    @if($title=='Edit Order')                     
                    <input type="submit" value="Update">
                    @else
                     <a href="{{ url('/edit-order/'.$orderInfo->id)}}" class="btn btn-md btn-info" ><span class="glyphicon glyphicon-pencil"> Edit</span></a> 
                     <a href="#" class="btn btn-md btn-default" onclick="printDiv();" ><span class="glyphicon glyphicon-print"> Print</span></a> 
                    @endif
                </div>
             {!! Form::close() !!}
        </div>
        <!-- end widget content -->

    </div>
    <!-- end widget div -->

</div>

<script>
document.forms['order-form'].elements['order_status'].value='delivired';
   function printDiv() {
//       alert(0);
        var divToPrint = document.getElementById('invoice');
        var popupWin = window.open('', '_blank', 'width=800,height=auto');
        popupWin.document.open();
        var a = '<div style="width="100%; margin:0 auto;display:block;">\n\
        <div style="float:left;width:43%;text-align:right;">\n\
    \n\
    </div>\n\
    <div class="" style="line-height:48px;text-align: left;font-size:25px;color:red;font-weight:bold;text-decoration:underline;"> \n\
    <span style="padding-left:8px;font-family:Verdana, Geneva, sans-serif">BARAKA LPG Ltd.</span>' +
                '</div>\n\
    </div><br>';
        popupWin.document.write('<html><head><title>Invoice </title>\n\
    \n\
    \n\
    \n\
    \n\
    <style> body{ text-align:center;font-size:15px;margin:0 auto;}table{margin:0 auto; width:100%}table, th, td {padding-left:5px;padding-right:5px;font-size:10px;border-bottom: 1px solid black; border-collapse: collapse;}th{background: #DCDCDC; border-top:2px solid #000;} tr:nth-child(even) {background: #DCDCDC }tr:nth-child(odd) {background: #FFF}</style>\n\
                      \n\
    \n\
    \n\
    \n\
    \n\
    </head><body onload="window.print()">' + a + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
        }
</script>

@endsection