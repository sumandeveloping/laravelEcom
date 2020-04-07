<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class saveForLaterController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // * id should be rowId
        Cart::instance('saveForLater')->remove($id);

        return back()->with('success_message',"Item has been removed from your saved collection");
    }

    public function switchToCart ($id) {
        // * id should be rowId

        //todo 1. get from saveForLater instance
        $item = Cart::instance('saveForLater')->get($id);
        
        //todo 2. remove from saveForLater instance
        Cart::instance('saveForLater')->remove($id);

        //todo check for duplicacy
            
            $duplicates = Cart::instance('default')->search(function($cartItem,$rowId) use ($id) {
                return $rowId === $id;
            });

            if($duplicates->isNotEmpty()) {
                return redirect()->route('cart.index')->with('success_message','Item is already in your cart!');
            }

        //todo add to cart instance
        Cart::instance('default')->add($item->id,$item->name,1,$item->price)->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message',"Item has been moved to your cart!");
    }
}
