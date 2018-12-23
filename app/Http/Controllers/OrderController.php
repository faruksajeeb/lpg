<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $orderInfo = DB::table('order AS o')
                ->leftJoin('customer AS c', 'c.id', '=', 'o.customer_id')
                ->leftJoin('shipping AS s', 's.id', '=', 'o.shipping_id')
                ->leftJoin('payment AS p', 'p.id', '=', 'o.payment_id')
                ->select('o.*', 'c.customer_name', 's.shipping_name', 'p.payment_type')
                ->paginate(5);
        $data = array(
            'title' => 'Manage Order',
            'orderInfo' => $orderInfo
        );
//        print_r($data);
//        exit;
        return view('admin.order.manage_order', $data);
    }

    public function viewOrder($id) {

        $orderInfo = DB::table('order AS o')
                ->select('o.*', 'c.customer_name', 'c.mobile', 'c.address', 'c.city', 'c.country', 's.shipping_name', 's.mobile as shipping_mobile', 's.address as shipping_address', 'p.payment_type', 'p.payment_status')
                ->leftJoin('customer AS c', 'c.id', '=', 'o.customer_id')
                ->leftJoin('shipping AS s', 's.id', '=', 'o.shipping_id')
                ->leftJoin('payment AS p', 'p.id', '=', 'o.payment_id')
                ->where('o.id', $id)
                ->first();

        $orderDetailInfo = DB::table('order_details AS od')
                ->leftJoin('products as p', 'p.id', '=', 'od.product_id')
                ->where('order_id', $id)
                ->get();

        $data = array(
            'title' => 'View Order',
            'orderInfo' => $orderInfo,
            'orderDetailInfo' => $orderDetailInfo
        );
//        echo "<pre>";
//        print_r($data);
//        exit;
        return view('admin.order.view_order', $data);
    }

    public function editOrder($id) {
        $orderInfo = DB::table('order AS o')
                ->select('o.*', 'c.customer_name', 'c.mobile', 'c.address', 'c.city', 'c.country', 's.shipping_name', 's.mobile as shipping_mobile', 's.address as shipping_address', 'p.payment_type', 'p.payment_status')
                ->leftJoin('customer AS c', 'c.id', '=', 'o.customer_id')
                ->leftJoin('shipping AS s', 's.id', '=', 'o.shipping_id')
                ->leftJoin('payment AS p', 'p.id', '=', 'o.payment_id')
                ->where('o.id', $id)
                ->first();

        $orderDetailInfo = DB::table('order_details AS od')
                ->leftJoin('products as p', 'p.id', '=', 'od.product_id')
                ->where('order_id', $id)
                ->get();

        $data = array(
            'title' => 'Edit Order',
            'orderInfo' => $orderInfo,
            'orderDetailInfo' => $orderDetailInfo
        );
//        echo "<pre>";
//        print_r($data);
//        exit;
        return view('admin.order.view_order', $data);
    }

    public function updateOrder(Request $request) {
        $orderId = $request->order_id;
        $paymentId = $request->payment_id;
        $pData['payment_status'] = $request->payment_status;
        $oData['order_status'] = $request->order_status;
        DB::table('payment')->where('id', $paymentId)->update($pData);
        DB::table('order')->where('id', $orderId)->update($oData);
        return back();
    }

    public function deleteOrderItem($id) {
        $itemInfo = DB::table('order_details')->where('id', $id)->first();
        $deleteItem = DB::table('order_details')
                ->where('id', $id)
                ->delete();
        if ($deleteItem) {
            $orderInfo = DB::table('order')->select('order_total')->where('id', $itemInfo->order_id)->first();
            $data['order_total'] = $orderInfo->order_total - $itemInfo->amount;
            DB::table('order')
                    ->where('id', $itemInfo->order_id)
                    ->update($data);
        }
        return back();
    }

    public function deleteOrder($id) {
        $orderInfoById = DB::table('order')->where('id', $id)->first();
        $delOk = DB::table('order')->where('id', $id)->delete();
        if ($delOk) {
            DB::table('order_details')->where('order_id', $id)->delete();
            DB::table('shipping')->where('id', $orderInfoById->shipping_id)->delete();
            DB::table('payment')->where('id', $orderInfoById->payment_id)->delete();
            $res = 'Order delete successfully!';
        }
        return back()->with('msg', $res);
    }

    public function confirmOrder($id) {
        $data['order_status'] = 'confirmed';
        $updateOk = DB::table('order')->where('id', $id)->update($data);
        if ($updateOk) {
            $res = "Thank you for confirmed your order!";
        }
        return view('inc.order_success', [
            'title' => 'Message',
            'message' => $res
        ]);
    }

    public function downloadOrder($id) {
        $orderInfo = DB::table('order AS o')
                ->select('o.*', 'c.customer_name', 'c.mobile', 'c.address', 'c.city', 'c.country', 's.shipping_name', 's.mobile as shipping_mobile', 's.address as shipping_address', 'p.payment_type', 'p.payment_status')
                ->leftJoin('customer AS c', 'c.id', '=', 'o.customer_id')
                ->leftJoin('shipping AS s', 's.id', '=', 'o.shipping_id')
                ->leftJoin('payment AS p', 'p.id', '=', 'o.payment_id')
                ->where('o.id', $id)
                ->first();

        $orderDetailInfo = DB::table('order_details AS od')
                ->leftJoin('products as p', 'p.id', '=', 'od.product_id')
                ->where('order_id', $id)
                ->get();

        $data = array(
            'title' => 'Download Order',
            'orderInfo' => $orderInfo,
            'orderDetailInfo' => $orderDetailInfo
        );

        // Start PDF code here --------------------------------------------
        $customPaper = array(0, 0, 560, 160); // use mm to point converter 127mm=360 point (margin right,margin top,width,height)

        $pdf = PDF::loadView('admin.pdf.download_order', $data)
                ->setPaper('a4', 'portrait')
//                ->setPaper($customPaper)
//                ->setPaper('a4', 'landscape')
                ->setWarnings(false);
        return $pdf->stream('invoice.pdf');
//        return $pdf->download('order_invoice.pdf');
        // End PDF code here ----------------------------------------------
//        return view('admin.order.download_order',$data);
    }

    public function exportExcel() {
        $orders = DB::table('order AS o')
                        ->leftJoin('customer AS c', 'c.id', '=', 'o.customer_id')
                        ->leftJoin('shipping AS s', 's.id', '=', 'o.shipping_id')
                        ->leftJoin('payment AS p', 'p.id', '=', 'o.payment_id')
                        ->select('o.*', 'c.customer_name', 's.shipping_name', 'p.payment_type')
                        ->get()->toArray();
        // Column name

        $orderArray[] = array('sl no', 'Customer name', 'Shipping name', 'payment type', 'Order Total', 'Order Status', 'Order Date');
        $sl_no = 1;
        // Create excel field and value 
        foreach ($orders as $order) {
            $orderArray[] = array(
                'sl no' => $sl_no,
                'Customer name' => $order->customer_name,
                'Shipping name' => $order->shipping_name,
                'payment type' => $order->payment_type,
                'Order Total' => $order->order_total,
                'Order Status' => $order->order_status,
                'Order Date' => $order->created_at
            );
            $sl_no++;
        }

        Excel::create('Order Data', function($excel) use ($orderArray) { // Order Data is file name
            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Orders');
            $excel->setCreator('Laravel')->setCompany('Baraka LPG');
            $excel->setDescription('Order file');

            // Build the spreadsheet, passing in the orders array
            $excel->sheet('orders', function($sheet) use ($orderArray) {
                $sheet->fromArray($orderArray, null, 'A1', false, false);
                $sheet->setStyle(array(
                    'font' => array(
                        'name' => 'Calibri',
                        'size' => 12,
                        'bold' => true
                    )
                ));
            });
//        $excel->sheet('sheet2', function($sheet) use ($orderArray) {
//            $sheet->fromArray($orderArray, null, 'A1', false, false);
//        });
        })->download('xlsx');
    }

    public function exportExcelFromBlade() {
        $orderInfo = DB::table('order AS o')
                ->leftJoin('customer AS c', 'c.id', '=', 'o.customer_id')
                ->leftJoin('shipping AS s', 's.id', '=', 'o.shipping_id')
                ->leftJoin('payment AS p', 'p.id', '=', 'o.payment_id')
                ->select('o.*', 'c.customer_name', 's.shipping_name', 'p.payment_type')
                ->get();
        $orderDetailInfo=DB::table('order_details')->get();
        $data = array(
            'title'=>'Orders',
            'orderInfo' => $orderInfo
        );
        $OrderDetail = array(
            'title'=>'Order Details',
            'orderDetailInfo' => $orderDetailInfo
        );
        Excel::create('Orders', function($excel) use ($data,$OrderDetail) {

            $excel->sheet('Orders', function($sheet) use ($data) {
                $sheet->loadView('admin.order.export_order_excel', $data);
                       
            });
            $excel->sheet('Order Details', function($sheet) use ($OrderDetail) {
                $sheet->loadView('admin.order.export_order_detail_excel', $OrderDetail);
            });
        })->download('xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
