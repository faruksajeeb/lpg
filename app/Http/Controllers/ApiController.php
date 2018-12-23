<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ApiController extends Controller
{
    public function index(){
        return Product::where('publication_status',1)->get();
    }
}
