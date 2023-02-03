<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    use HasFactory;  # generate dump data

    protected $fillable =['name','price', 'instock', 'category_id','product_creator'];
//    protected $guarded = ['_token'];

    # we have one to many relation with the category model ?
    ### product may belong to one category at most.

    function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    function product_owner(){
        return $this->belongsTo(User::class, 'product_creator');
    }
}
