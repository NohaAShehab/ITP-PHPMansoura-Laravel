<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;  # generate dump data

    protected $fillable =['name','price', 'instock', 'category_id','product_creator'];
//    protected $guarded = ['_token'];
}
