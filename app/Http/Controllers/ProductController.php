<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\WebCapsule;
use DB;

/**
 * Description of ProcuctController
 *
 * @author Administrator
 */
class ProductController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->webCapsuleClass = new WebCapsule();
    }

    function add() {
        $categories = Category::where('publication_status', '1')->get();
        return view('admin.product.product_form', [
            'categories' => $categories,
            'title' => 'Add Product'
        ]);
    }

    function store(Request $request) {
        $table = "products";
        $edit_id = $request->product_id;
//           dd($request->all());
        $this->validate($request, [
            'product_name' => 'required',
            'category_id' => 'required'
        ]);
        $data = array(
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'qty' => $request->qty,
            'weight' => $request->weight,
            'valve_size' => $request->valve_size,
            'valve_type' => $request->valve_type,
            'publication_status' => $request->publication_status
        );
        if ($edit_id) {

            // Start Image upload
            if ($request->hasFile('product_pic')) {
                $this->validate($request, [
                    'product_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $products = DB::table('products')->where('id', $edit_id)->first();
                // Delete old image first
                if ($products->product_pic) {
                    if (file_exists($products->product_pic)) {
                        unlink($products->product_pic);
                    }
                }
                // end old emage delete
                $files = $request->product_pic;
                
                $image_url=$this->fileUpload($files);
                if ($image_url) {
                    $data['product_pic'] = $image_url;
                } else {
                    $error = $files->getErrorMessage();
                    $message = "Image not uploaded and data not Inserted-" . $error;
                    return back()->with('msg', $message);
                }
            }
            // end image update        
            $res = $this->webCapsuleClass->updateInfo($table, $data, $edit_id);
            return redirect('manage-product')->with('msg', $res);
        } else {
            $this->validate($request, ['product_pic' => 'required']);
            // image upload ----------------------------
            if ($request->hasFile('product_pic')) {
                $this->validate($request, [
                    'product_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
                $files = $request->product_pic;                        
                $image_url=$this->fileUpload($files);         
                if ($image_url) {
                    $data['product_pic'] = $image_url;
                    $res = $this->webCapsuleClass->insertData($table, $data);
                } else {
                    $error = $files->getErrorMessage();
                    $res = "Image not uploaded and data not Inserted-" . $error;
                }
            }
            return back()->with('msg', $res);
        }
        // end image upload -------------------------
    }
    
    private function fileUpload($file){
        $fileName=$file->getClientOriginalName();
        $uniqueFileName = date('His') . "_" . $fileName; // add datetime for unique file name
        $directory='resources/assets/images/product/';
        $file->move($directory,$uniqueFileName);
        $fileUrl=$directory.$uniqueFileName;
        return $fileUrl;
    }

    function manage() {
        $products = DB::table('products')
                ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.category_name')
                ->paginate(5);
        return view('admin.product.manage_product', [
            'title' => 'Manage Product',
            'products' => $products
        ]);
    }

    function view($id) {

        $productByID = DB::table('products')
                ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.category_name')
                ->where('products.id', $id)
                ->first();

        return view('admin.product.view_product', ['product' => $productByID, 'title' => 'View product']);
    }

    function edit($id) {
//        return $id;
        $productById = Product::where('id', $id)->first();
        $categories = Category::where('publication_status', '1')->get();
//        $categories=DB::table('categories')->where('publication_status', '1')->get();
        return view('admin.product.product_form', [
            'title' => 'Edit product',
            'productById' => $productById,
            'categories' => $categories
        ]);
    }

    public function updatePublicationStatus($status, $id) {
        if ($status == 'publish') {
            $change = 1;
        }
        if ($status == 'unpublish') {
            $change = 0;
        }
        $data = array(
            'publication_status' => $change
        );
        $res = $this->webCapsuleClass->updateInfo('products', $data, $id);
        return back()->with('msg', $res);
    }

    function delete($id) {
//        $products = DB::table('products')->where('id', $id)->first();
        $products=Product::find($id);
//        $products->delete();
        $res = $this->webCapsuleClass->deleteItem('products', $id);
        if ($res) {

            if (file_exists($products->product_pic)) {
                unlink($products->product_pic);
            }
        }
        return back()->with('msg', $res);
    }

}
