
<style>

tr:nth-child(even) {background: #CCC}
h1{
    font-size: 35px;
    text-align: center;
    height:100px;
}
</style>
<table class="table table-bordered" style="" >
                    <thead>
                        <tr style="height:100px;"><th colspan="7"  ><h1 >BARAKA LPG Limited</h1></th></tr>
                        <tr><th colspan="7"><h2 style="text-align: center;">{{$title}}</h2></th></tr>
                        <tr>
                            <th>Sl no.</th>
                            <th>Order Id</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Amount</th>                         
                        </tr>
                    </thead>
                    <tbody>
                        <?php $orderTotal=0; ?>
                        @foreach($orderDetailInfo as $singleOrder)
                        <tr>
                            <td>{{ $singleOrder->id }}</td>                            
                            <td>{{ $singleOrder->order_id }}</td>
                            <td>{{ $singleOrder->product_id }}</td>
                            <td>{{ $singleOrder->product_name }}</td>
                            <td>{{ $singleOrder->product_qty }}</td>
                            <td align="right">{{ number_format($singleOrder->product_price,2) }}</td>
                            <td align="right">{{ number_format($singleOrder->amount,2) }}</td>
                                                 
                        </tr>
                        <?php
//                            $orderTotal+=$singleOrder->order_total;
//                            $orderTotalg= number_format($orderTotal,2)
                        ?>
                        @endforeach
<!--                        <tr>
                            <td colspan="3"></td>
                            <td style="font-weight: bold;">Total</td>
                            <td style="font-weight: bold;text-align:right">{{number_format($orderTotal,2)}}</td>
                            <td colspan="2"></td>
                        </tr>-->
                    </tbody>
                </table>
         