<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    // function index(){
    //     return "<h1> Products index </h1>";

    // }
    // function index(){
    //     return view("products");

    // }
    // function index(){
    //     return view("products");

    // }

    // function index(){
    //     $mesage = 'Hello sent from the controllers';
    //     return view("productsindex", $data=['usermessage'=> $mesage]);

    // }

    function index(){

        // $users = [
        //     "Asmaa", "Asmaa", "Mohamed", "Mohamed",
        //     "Ahmed", "Ahmed", "Abdulrahman", "Moataz",
        //     "Radwa","Hend"
        // ];

        $mesage = 'Hello sent from the controllers';
        return view("products", $data=['usermessage'=> $mesage]);

    }
}

