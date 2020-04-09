<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $mightAlsoLike = Product::mightAlsoLike()->get();
        return view('cart',compact('mightAlsoLike'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        //dd(Cart::content());
        $duplicates = Cart::Search(function($cartItem,$rowId) use ($request){
            return $cartItem->id === $request->id;
        });

        //dd($duplicates);

        if($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message','Item is already in your cart!');
        }

        Cart::add($request->id,$request->name,1,$request->price)->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message',"Item was added to your cart");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cart::remove($id);

        return back()->with('success_message',"Item has been removed from your cart");
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function switchToSaveForLater(Request $request,$id) {
        // $id = rowId of Cart item
        $item = Cart::Get($id);

        Cart::remove($id);

        // todo Check for duplicates
            $duplicates = Cart::instance('saveForLater')->search(function($cartItem,$rowId) use ($id) {
                return $rowId === $id;
            });

            if($duplicates->isNotEmpty()) {
                return redirect()->route('cart.index')->with('success_message','Item is already saved for later!');
            }

        // todo SAVE for later 
        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message',"Item has been saved for your future purchase");
    }
}
