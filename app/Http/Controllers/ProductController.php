<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products = [
        ["name"=>'product1', 'price'=>10, 'instock'=>4, "id"=>10] ,
        ["name"=>'product2', 'price'=>20, 'instock'=>10, "id"=>2] ,
        ["name"=>'product3', 'price'=>30, 'instock'=>30, "id"=>3] ,
        ["name"=>'product4', 'price'=>30, 'instock'=>30, "id"=>4] ,
    ];
    function index(){
        # get data from the database
        # select * from products;
        $products = DB::table('products')->get();
//        dump($products);
        return view("products.index", $data=['products'=>$products]);
    }

    function create(){
        return view('products/create');
    }
    function store(){
        $product_details = request()->all();  # $_POST
        array_shift($product_details);  # remove _csrf
//        dd($product_details);
        DB::table('products')->insert($product_details);
        return to_route('products.index');
    }

    function show($id){

        # get product

        # select * from products where id = id limit 1;
        $product = DB::table('products')->where('id', $id)->first();

        if ($product){
            dump($product);

        }else{
            return abort(404);
        }



    }

}

