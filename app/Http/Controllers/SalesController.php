<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(){
        $products = Product::where('id_user',Auth()->user()->id)->get();
        return Inertia::render('Sales/index',[
            'products' => $products
        ]);
    }
}
