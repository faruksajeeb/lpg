<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart($id)
    {
       $productInfo=DB::table('products')->where('id',$id)->first();
       $data=array(
           'id'=>$productInfo->id,
           'name'=>$productInfo->product_name,
           'qty'=>1,
           'price'=>$productInfo->price,
           'options'=>[
               'image'=>$productInfo->product_pic,
               'size'=>$productInfo->valve_size,
               'weight'=>$productInfo->weight,
               'type'=>$productInfo->valve_type
           ]
       );
       Cart::add($data);
       return Redirect::to('show-cart');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
      
        return view('inc.show_cart',['title'=>'Show Cart']);
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
    public function updateCart(Request $request)
    {
       $qty=$request->qty;
       $rowId=$request->row_id;
       Cart::update($rowId,$qty);
       return Redirect::to('show-cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCart($rowId)
    {
        Cart::remove($rowId);
        return Redirect::to('show-cart');
    }
}
