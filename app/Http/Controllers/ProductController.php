<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\Models\Product;
class ProductController extends Controller
{
    function index(){
        $products = Product::all();
        return view("products.index", $data=['products'=>$products]);
    }

    function create(){
        return view('products/create');
    }
    function store(){
        $product_details = request()->all();  # $_POST
        array_shift($product_details);  # remove _csrf
        $product = new Product();
        $product->name = $product_details["name"];
        $product->price = $product_details["price"];
        $product->instock = $product_details["instock"];
        $product->save();
        return to_route('products.index');
    }

    function show($id){
        $product = DB::table('products')->where('id', $id)->first();
        if ($product){
            dump($product);

        }else{
            return abort(404);
        }



    }


    function destory($id){
//       $product = Product::find($id);
//       if ($product){
//           $product->delete();
//       }
//
//       return to_route('products.index');
        $product = Product::findOrFail($id);
        $product->delete();
        return to_route('products.index');
    }


    function edit($id){
        $product = Product::findOrFail($id);

        return view('products.edit', $data=['product'=>$product]);
    }


    function update($id){
        $product = Product::findOrFail($id);
        $update_product = request()->all();
        $product->name = $update_product["name"];
        $product->price = $update_product["price"];
        $product->instock = $update_product["instock"];
        $product->save();
//        return "updated";
        return to_route("products.index");
    }


}

