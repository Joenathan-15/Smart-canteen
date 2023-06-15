<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(){
        return Inertia::render('Card/index',[
            'cards' => Card::all()
        ]);
    }
    Public function topup(Request $request){
        $request->validate([
            'card_balance' => 'required|numeric',
            'card_id' => 'required'
        ]);
        $add_card_balance = str_replace('-','',$request->card_balance);
        $card = Card::where('card_id',$request->card_id)->first();
        $old_card_balance = $card->card_balance;
        $new_card_balance = $old_card_balance + $add_card_balance;
        $card->card_balance = $new_card_balance;
        $card->save(); 

    }
    public function create(){
        return Inertia::render('Card/create');
    }
    public function store(Request $request){
        $request->validate([
            'card_id' => 'required',
            'card_owner' => 'required',
        ]);
        
        $newCard = new Card();
        $newCard->card_id = $request->card_id;
        $newCard->card_owner = $request->card_owner;
        $newCard->card_balance = 50000;
        $newCard->save();
        return redirect('/topup');
    }
    public function edit($id){
        $card = Card::where('id',$id)->first();
        return Inertia::render('Card/edit',[
            'card' => $card,
        ]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'card_owner' => 'required',
        ]);
        $card = Card::where('id',$id)->first();
        $card->card_owner = $request->card_owner;
        $card->save();
        return redirect('/topup');
    }
    public function destroy($id){
        $card = Card::where('id',$id)->first();
        $card->delete();
    }
}
