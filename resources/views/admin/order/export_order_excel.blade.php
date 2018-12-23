
<style>

tr:nth-child(even) {background: #CCC}
h1{
    font-size: 35px;
    text-align: center;
}
</style>
<table class="table table-bordered" style="" >
                    <thead>
                        <tr><th colspan="7" ><h1 >
                                    <!--<img src="{{asset('resources/assets/admin')}}/img/logo.png" />-->
                                    BARAKA LPG Limited
                                </h1></th></tr>
                        <tr><th colspan="7"><h2 style="text-align: center;">{{$title}}</h2></th></tr>
                        <tr>
                            <th>Sl no.</th>
                            <th>Customer name</th>
                            <th>Shipping name</th>
                            <th>Payment Type</th>
                            <th>Order Total</th>
                            <th>Order Status</th>
                            <th>Order Date</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        <?php $orderTotal=0; ?>
                        @foreach($orderInfo as $singleOrder)
                        <tr>
                            <td>{{ $singleOrder->id }}</td>                            
                            <td>{{ $singleOrder->customer_name }}</td>
                            <td>{{ $singleOrder->shipping_name }}</td>
                            <td>{{ $singleOrder->payment_type }}</td>
                            <td align="right">{{ number_format($singleOrder->order_total,2) }}</td>
                            <td>{{ $singleOrder->order_status }}</td>
                            <td>{{ $singleOrder->created_at }}</td>
                                                 
                        </tr>
                        <?php
                            $orderTotal+=$singleOrder->order_total;
//                            $orderTotalg= number_format($orderTotal,2)
                        ?>
                        @endforeach
                        <tr>
                            <td colspan="3"></td>
                            <td style="font-weight: bold;">Total</td>
                            <td style="font-weight: bold;text-align:right">{{number_format($orderTotal,2)}}</td>
                            <td colspan="2"></td>
                        </tr>
                    </tbody>
                </table>
         