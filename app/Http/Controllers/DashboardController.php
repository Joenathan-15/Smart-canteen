<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        $products = Product::where('id_user',Auth()->user()->id)->get();
        return Inertia::render("Dashboard",[
            'products' => $products
        ]);
    }
}
