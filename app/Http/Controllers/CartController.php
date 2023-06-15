<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Cart;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::where('user_id', auth()->user()->id)
        ->with('products') // Eager load the 'products' relationship
        ->get();
            return Inertia::render('Cart/index',[
                'carts' => $carts,
            ]);
    }
    public function remove($id){
        $cart_item = Cart::where('id',$id);
        $cart_item->delete();
    }

    public function pay(Request $request){
        $card = Card::where('card_id',$request->card_id)->get()->first();
        $cart = Cart::where('user_id',Auth()->user()->id)->get();
        
        $request->validate([
            'card_id' => 'required',
            'grand_total' => 'required|numeric',
        ]);
        if($request->grand_total > $card->card_balance){
            return back();
        }
        $card->card_balance = $card->card_balance - $request->grand_total;
        $card->save();
        for($i=0;$i<count($cart);$i++)
        {
            $transaction = new Transaction();
            $transaction->product_id = $cart[$i]->product_id;
            $transaction->user_id = Auth()->user()->id;
            $transaction->card_id = $request->card_id;
            $transaction->save();
            $cart[$i]->delete();
        }
        return redirect('/sales');
    }
}
