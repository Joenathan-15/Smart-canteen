<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Product/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required'
        ]);

        $product = new Product();
        $product->id_user = Auth()->user()->id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->save();
        return back();

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id',$id)->first();
        return Inertia::render('Product/edit',[
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_price' => 'required|numeric',
            'product_name' => 'required',
        ]);
        $product = Product::where('id',$id)->first();
        $product->product_price = $request->product_price;
        $product->product_name = $request->product_name;
        $product->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();
    }
}
