<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function create(){
        return Inertia::render('User/create');
    }
    public function store(Request $request){
        $request->validate([
            'store_name' => 'required',
            'store_email' => 'required|email',
            'store_password' => 'required'
        ]);
        $user = new User();
        $user->name = $request->store_name;
        $user->email = $request->store_email;
        $user->password = $request->store_password;
        if( $request->is_admin == null){
            $user->is_admin = false;
        }else{
            $user->is_admin = true;
        }
        $user->save();
        return redirect('/');

    }
}
