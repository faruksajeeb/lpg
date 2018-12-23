<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inc.checkout',['title'=>'Checkout']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registration(Request $request)
    {
        $this->validate($request,[
            'customer_name'=>'required',
            'customer_email'=>'required | email',
        ]);
        $data=array(
            'customer_name'=>$request->customer_name,
            'email_address'=>$request->customer_email,
            'password'=>md5($request->password),
            'mobile'=>$request->mobile,
            'address'=>$request->address,
            'city'=>$request->city,
            'country'=>$request->country,
            'zip_code'=>$request->zip_code
        );
        $customerId=DB::table('customer')->insertGetId($data);
        if($customerId){
            Session::put('customer_id',$customerId);
            Session::put('customer_name',$request->customer_name);
            return Redirect::to('billing-address');
        }
        
    }
    public function billingAddress(){
        return view('inc.billing_form',['title'=>'Billing Form']);
    }
    public function saveBillingInfo(Request $request){
        $this->validate($request,[
            'address'=>'required',
        ]);
        $customer_id=Session::get('customer_id');
        $data=array(
            'mobile'=>$request->mobile,
            'address'=>$request->address,
            'city'=>$request->city,
            'country'=>$request->country,
            'zip_code'=>$request->zip_code
        );
        Session::put('billing_id',$customer_id);
        DB::table('customer')->where('id',$customer_id)->update($data);
        return Redirect::to('shipping');
    }
    public function shipping(){
        return view('inc.shipping_form')->with('title','Shipping');
    }
     public function saveShipping(Request $request)
    {
        $this->validate($request,[
            'shipping_name'=>'required',
            'mobile'=>'required',
        ]);
        $data=array(
            'shipping_name'=>$request->shipping_name,
            'mobile'=>$request->mobile,
            'address'=>$request->address,
            'city'=>$request->city,
            'country'=>$request->country,
            'zip_code'=>$request->zip_code
        );
        $shippingId=DB::table('shipping')->insertGetId($data);
        if($shippingId){
            Session::put('shipping_id',$shippingId);
            return Redirect::to('payment');
        }
        
    }
    public function payment(){
        return view('inc.payment')->with('title','Payemnt');
    }
    public function saveOrder(Request $request){
        $parment_method=$request->payment_method;
        
       
        // payment ------------------
        $paymentData=array(
            'payment_type'=>$parment_method,
            'payment_status'=>'pending'
        );
        $paymentId=DB::table('payment')->insertGetId($paymentData);
        
        // Order ----------------------
        $orderData=array(
            'customer_id'=>Session::get('customer_id'),
            'shipping_id'=>Session::get('shipping_id'),
            'payment_id'=>$paymentId,
            'order_total'=>Cart::total(null,null,'')
        );
        
        
        $orderId=DB::table('order')->insertGetId($orderData);
        
        // Order details ---------------
        foreach(Cart::content() as $singleContent){
            $orderDetailData[]=array(
                'order_id'=>$orderId,
                'product_id'=>$singleContent->id,
                'product_name'=>$singleContent->name,
                'product_qty'=>$singleContent->qty,
                'product_price'=>$singleContent->price,
                'amount'=>$singleContent->total(null,null,'')
            );
        }
        DB::table('order_details')->insert($orderDetailData);
        
        /* 
         * Start successfull order email
         */
        $orderInfo=DB::table('order AS o')                
                ->select('o.*','c.customer_name','c.email_address','c.mobile','c.address','c.city','c.country','s.shipping_name','s.mobile as shipping_mobile','s.address as shipping_address','p.payment_type','p.payment_status')
                ->leftJoin('customer AS c','c.id','=','o.customer_id')
                ->leftJoin('shipping AS s','s.id','=','o.shipping_id')
                ->leftJoin('payment AS p','p.id','=','o.payment_id')
                ->where('o.id',$orderId)
                ->first();
       
        $orderDetailInfo=DB::table('order_details AS od')
                ->leftJoin('products as p','p.id','=','od.product_id')
                ->where('order_id',$orderId)
                ->get();
        $emailData=array(
            'customer'=>$orderInfo->customer_name,
            'to'=>$orderInfo->email_address,
            'subject'=>'Order confirmation mail!',
            'orderInfo'=>$orderInfo,
            'orderDetailInfo'=>$orderDetailInfo
        );

        // From gamil
         /*

          * Go to gmail setting>>sign-in & security >> Allow less secure apps: ON
          *           */
        Mail::send('email.order',$emailData, function($message) use ($emailData){
           $message->from('omfsajeeb@gmail.com','Baraka LPG')
                   ->to($emailData['to'])
                   // ->bcc($emailData['cc']) 
                  // ->attach($pathToFile)
                   ->subject($emailData['subject']); 
        });
        /*
         * End email
         */
        Cart::destroy();
        if($parment_method=='cash_on_delivery'){
          return view('inc.order_success',[
              'title'=>'Message',
              'message'=>'Your order have been successfully completed. Please check your email for confirmation.'
              ]);
        }
        if($parment_method=='paypal'){
            return view('inc.htmlWebsiteStandardPayment')->with('title','Paypal');
        }
    }
    public function sendEmail(){
        $orderInfo=DB::table('order AS o')                
                ->select('o.*','c.customer_name','c.mobile','c.address','c.city','c.country','s.shipping_name','s.mobile as shipping_mobile','s.address as shipping_address','p.payment_type','p.payment_status')
                ->leftJoin('customer AS c','c.id','=','o.customer_id')
                ->leftJoin('shipping AS s','s.id','=','o.shipping_id')
                ->leftJoin('payment AS p','p.id','=','o.payment_id')
                ->where('o.id',1)
                ->first();
       
        $orderDetailInfo=DB::table('order_details AS od')
                ->leftJoin('products as p','p.id','=','od.product_id')
                ->where('order_id',1)
                ->get();
         $pathToFile="resources\assets\pdf\invoice.pdf";
         $emailData=array(
            'customer'=>$orderInfo->customer_name,
            'to'=>'sajeeb@ahmedamin.com',
            'cc'=>'ofsajeeb@gmail.com',
            'subject'=>'Invoice from Baraka LPG',
            'orderInfo'=>$orderInfo,
            'orderDetailInfo'=>$orderDetailInfo,
            'att'=>$pathToFile
        );
        // From gamil
         /*

          * Go to gmail setting>>sign-in & security >> Allow less secure apps: ON
          *           */
         
        Mail::send('email.order',$emailData, function($message) use ($emailData){
           $message->from('programmer@ahmedamin-bd.com','Baraka LPG')
                   ->to($emailData['to'])
                   ->cc($emailData['cc'])
                   // ->bcc($emailData['cc']) 
                 // ->attach($emailData['att'])
                   ->subject($emailData['subject']); 
        });
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
