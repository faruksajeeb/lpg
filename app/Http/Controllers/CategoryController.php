<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\WebCapsule;
use DB;
use Auth;

/**
 * Description of ProcuctController
 *
 * @author Administrator
 */
class CategoryController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->webCapsuleClass = new WebCapsule();
    }

    function add() {
        return view('admin.category.category_form')->with('title', 'Add category');
    }

    function save(Request $request) {
//           dd($request->all());
        $this->validate($request, [
            'category_name' => 'required'
        ]);
        $table = 'categories';
        $edit_id = $request->category_id;
        $data = array(
            'category_name' => $request->category_name,
            'publication_status' => $request->publication_status
        );
        if ($edit_id) {
            $res = $this->webCapsuleClass->updateInfo($table, $data, $edit_id);
            return redirect('manage-category')->with('msg', $res);
        } else {
            $res = $this->webCapsuleClass->insertData($table, $data);
            return back()->with('msg', $res);
        }
    }

public function updatePublicationStatus($status, $id) {
        if ($status == 'publish') {
            $change = 1;
        }
        if ($status == 'unpublish') {
            $change = 0;
        }
        $data=array(
            'publication_status' => $change
        );
        $res = $this->webCapsuleClass->updateInfo('categories', $data,$id);
        return back()->with('msg', $res);
    }

    function view() {
//        $categories=Category::all();
        $categories = DB::table('categories')->paginate(2);
        return view('admin.category.manage_category', [
            'categories' => $categories,
            'title' => 'Manage category'
        ]);
    }

    function edit($id) {
//        return $id;
        $categoryById = Category::where('id', $id)->first();
        return view('admin.category.category_form', [
            'categoryById' => $categoryById,
            'title' => 'Edit category'
        ]);
    }



    function delete($id) {
        $product=Product::where('category_id',$id)->first();
        if($product){
            $res="<font color='red'>Sorry!!! </font> I can't delete this category because this is use in product";
        }else{
            $res=$this->webCapsuleClass->deleteItem('categories',$id);
        }                
        return back()->with('msg',$res);
    }

}
