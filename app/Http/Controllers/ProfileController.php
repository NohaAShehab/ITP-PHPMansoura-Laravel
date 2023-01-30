<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    function getProfile ($username){

        return view("profile", ['username'=>$username]);

    }
}
