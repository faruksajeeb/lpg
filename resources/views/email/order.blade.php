<html>
    <head>
        <style>
            body{
                font-family:sans-serif;
                font-size:10px;
               
                
            }
            .display{
                width:90%;
                 margin: 0 auto;
            }
            table { 
                width:100%;
                
                    border-spacing:0;
                    border-collapse: separate;
                }
            td,th{
                border-bottom:1px solid #ccc;
            }
            th{
                background:#cccccc;
            }
            .title{
                text-align:center;
                
            }
            .lavel{
                padding:10px;
                background: #333333;
                color:#FFF;
                font-size: 20px;
                font-weight:bold;
            }
        </style>
    </head>
    <body>
        <h1>Hello {{$customer}} ,</h1>
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

    <!-- widget div-->
    <div>

        <!-- widget edit box -->
        <div class="jarviswidget-editbox">
            <!-- This area used as dropdown edit box -->

        </div>
        <!-- end widget edit box -->

         <!-- widget content -->
        <div class="widget-body">
             <p>click here for confirm our order...<a href="{{URL::to('/confirm-order/'.$orderInfo->id)}}">Confirm Order</a></p>
           
           
            <div class="display">
                 <div class="business_info">
                <?php $pathToFile="resources/assets/admin/img/logo.png"; ?>
               <img src="<?php echo $message->embed($pathToFile); ?>"  width="80" style="float:right">
                <h1>Baraka LPG Ltd.</h1>
                <address>
                    H-25, Road-25, Gulshan-2, Dhaka-1212
                </address>
            </div>
            <div>
                <div class="title"><span class="lavel">Order Invoice</span></div>
            </div><br/>
            <table >
                <tr>
                    <th>Billing Address</th>
                    <th>Shipping Address</th>
                    <th>Invoice Info</th>
                </tr>
                <tr>
                    <td>
                       <div>{{ $orderInfo->customer_name}}</div>
                   <div>{{ $orderInfo->mobile}}</div>
                   <div>{{ $orderInfo->address}}</div>
                   <div>{{ $orderInfo->city}}</div>
                   <div>{{ $orderInfo->country}}</div>
                    </td>
                    <td>
                        <div>{{ $orderInfo->shipping_name}}</div>
                   <div>{{ $orderInfo->mobile}}</div>
                   <div>{{ $orderInfo->shipping_address}}</div>
                    </td>
                    <td>
                       <div>Order ID: {{ $orderInfo->id}}</div>
                   <div>Invoice Date: {{ $orderInfo->created_at}}</div>
                   
                   <div>Payment Method: {{ $orderInfo->payment_type}}</div>
                 
                    <div>Payment Status: {{ $orderInfo->payment_status}}</div>
                    <div>Order Status: {{ $orderInfo->order_status}}</div>
                    </td>
                </tr>
            </table>
            
               <table >
                    <thead>
                        <tr>
                            <th>Sl no.</th>
                            <th>Product name</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Amount (with tax)</th>
                           
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
                                                  
                        </tr>
                        <?php $slNo++; ?>
                        @endforeach
                        <tr>
                            <td colspan="3"></td>
                            <td style="font-weight: bold">Total:</td>
                            <td style="font-weight: bold">{{$orderInfo->order_total}}</td>
                            
                        </tr>
                    </tbody>
                </table>
             
               
                         
            </div>
             
        </div>
        <!-- end widget content -->

    </div>
    <!-- end widget div -->

</div>

    </body>
</html>