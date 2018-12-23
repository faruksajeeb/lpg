<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $products = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*','categories.category_name')
            ->where('products.publication_status',1)
            ->get();
//            ->paginate(3);
        return view('inc.home_content',['title'=>'Home'],['products'=>$products]);
    }
    public function about()
    {
        return view('inc.about',['title'=>'About']);
    }
    public function product()
    {
        $products = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*','categories.category_name')
            ->where('products.publication_status',1)
            ->get();
//            ->paginate(3);
        return view('inc.product',['title'=>'Product'],['products'=>$products]);
    }
    public function gallery()
    {
        $data=DB::table('gallery')->where('publication_status',1)->get();
        return view('inc.gallery',['title'=>'Gallery','galleryData'=>$data]);
    }
    public function safety_concern()
    {
        return view('inc.safety_concern',['title'=>'Safety Concern']);
    }
    public function contact()
    {
        return view('inc.contact',['title'=>'Contact']);
    }
}
