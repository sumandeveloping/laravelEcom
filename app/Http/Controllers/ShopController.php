<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagination = 9;
        $categories = Category::all(); //// this give us a collection
        //dd(request()->input());
        // * if  url has a category query in URL then show this
        if(request()->category) {
            $products = Product::with('categories')->whereHas('categories', function($query) {
                $query->where('slug',request()->category);
            });
            //dd($products); ////this return query builder
            $categoryName = optional($categories->where('slug',request()->category)->first())->name;  //// first() gives us whole collection 
            ////optional func doesnt show anything if category is not found
        }else {
            // * Otherwise show this
            $products = Product::where('featured',true); ////this give us query builder
            //dd($products);
            $categoryName = 'Featured';
        }

        // * price sorting
        if (request()->sort == 'low_high') {
            # code...
            // dd($products);
            $products = $products->orderBy('price','asc')->paginate($pagination);  //// sortBy is available method of "Collection" -> see docs 
        } elseif (request()->sort == 'high_low') {
            # code...
            $products = $products->orderBy('price','desc')->paginate($pagination); //// sortByDesc is available method of "Collection" -> see docs 
        } else {
            //dd($products); ////this is query builer. We can use paginate method on query builder but not to a Collection
            $products = $products->paginate($pagination);
        }

        return view('shop', compact('products','categories','categoryName'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $product = Product::where('slug',$slug)->firstOrFail();
        $mightAlsoLike = Product::where('slug','!=',$slug)->mightAlsoLike()->get();

        // * render product page
        return view('product',compact('product','mightAlsoLike'));
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
