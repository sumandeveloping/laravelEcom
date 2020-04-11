<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class CheckoutController extends Controller
{
    private function getNumbers()
    {
        $tax = config('cart.tax') / 100;       //// 18%  config -> cart.php
        $discount = session()->get('discount') ?? 0;
        //dd($discount);
        // ? Cart::subtotal()  is a string, so we have to convert it into a number;
        $OldCartSubtotal = Cart::subtotal(); // // this is a tring like this => "102,56.58"
        $OldCartSubtotal = str_replace(',','',$OldCartSubtotal); //// 10256.58
        //dd($OldCartSubtotal);

        $OldCartSubtotalNum = (float) $OldCartSubtotal; //// now ot is a number(float)
        //dd($OldCartSubtotalNum);
        //dd(gettype($OldCartSubtotalNum));

        $newSubtotal = $OldCartSubtotalNum - $discount;
        //dd($newSubtotal);
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal + $newTax;
        
        return collect([
            'tax' => $newTax,
            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('checkout')->with([
            'discount' => $this->getNumbers()->get('discount'),
            'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
            'newTax' => $this->getNumbers()->get('newTax'),
            'newTotal' => $this->getNumbers()->get('newTotal')
        ]);
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
    public function store(CheckoutRequest $request)
    {
        //
        
        try {
            //code...
            //dd($request->all());
            $contents = Cart::instance('default')->content()->map(function ($item) {
                return $item->model->slug.", ".$item->qty;
            })->values()->toJson();
            $stripe = Stripe::charges()->create([
                'amount' => $this->getNumbers()->get('newTotal'),
                'currency' => 'INR',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                    'coupon' => session()->get('coupon'),
                    'discount' => session()->get('discount')
                ]
            ]);

            // * SUCCESSFUL
            //dd($stripe);
            Cart::instance('default')->destroy();
            session()->forget(['coupon','discount']);
            return redirect()->route('confirmation.index')->with('success_message','Thank you!, Your payment has been successfully accepted');
        } catch (CardErrorException $e) {
            //throw $error;
            // return back()->withErrors("Error! " . $e->getMessage());
            // return back()->withErrors("Error! Something Went Wrong");
            return back()->with('error_message',"Error! " . $e->getMessage());
        }
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
    }
}