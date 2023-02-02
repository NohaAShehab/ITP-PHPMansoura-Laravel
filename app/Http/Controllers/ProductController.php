<?php

namespace App\Http\Controllers;

use App\Models\Product;
use  App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
//
//    function  __construct()
//    {
////        $this->middleware('auth')->only(['update', 'store', 'destroy']);
//        $this->middleware('auth')->except(['index', 'show']);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(Auth::user());  # return with user object

        $products = Product::all();
        return view("products.index", $data = ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products/create', ['categories'=>$categories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

//        dd($request);
        ### create new object
        $logged_in_usr  = null;
//        if (Auth::user()){
////            $logged_in_usr = Auth::user()->id;
//            $logged_in_usr = Auth::id();
//        }

        if (Auth::check()) {
            $logged_in_usr = Auth::id();
        }

        $data = $request->all();
        $data['product_creator'] = $logged_in_usr;

        Product::create($data);

        return  to_route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //

        dd($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return  view('products.edit', $data=['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'instock'=>'required'
        ]);
        $product->update($request->all());

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //

        $product->delete();

        return to_route('products.index');
    }
}
