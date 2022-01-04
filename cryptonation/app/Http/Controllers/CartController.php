<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request){
        Cart::add(
            '1234',
            'product 1',
            1,
            9.99
            );
            return redirect('/merch')->with('message','product added to cart');
    }
}
