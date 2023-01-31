<?php

namespace App\Http\Controllers;

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

//        $product_info = "Sample product";
        $products_list = [
            "product1", 'product2', 'product3'
        ];

        $products_info = [
            "name"=>'product1', 'price'=>10, 'instock'=>5
        ];


        return view("products/index", $data=
            ['products'=>$products_list, 'product_info'=>$products_info,
                'products_details'=>$this->products
            ]

        );
    }

    function create(){
        return view('products/create');
    }
    function store(){
//        dd('Data received');
        dump('Data received');
        dump($_POST);
        ## get data sent from the client to the server --->
//        dump(request());
//        dump(request('name'));
//        dump(request('price'));
//        dump(request('instock'));
//        dump(request()->get('name'));
//        dump(request()->all());

        $product= request()->all();  ## $_POST
        array_shift($product);
        array_push($this->products, $product);
        dump($this->products);

        return to_route('products.index');
    }

    function show($id){
//        dump($id);
        # get product details ?
        $found = false;
        foreach ($this->products as $product){
            if ($product['id']==$id) {
                $found= true;
                dump($product);
                break;
            }
        }

        if ($found==false){
//            dump("product not found");
            return abort(404);
        }
    }

}

