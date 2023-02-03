<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        dd($this);
//        return parent::toArray($request);

        return [
            'product_id'=>$this->id,
            'name'=>$this->name,
            'price'=>$this->price,
            'description'=>$this->description,

//            'creartor'=>1,
//            'category'=>$this->category_id,
//            'category'=> $this->category_id? Category::find($this->category_id)->name : null,
//            'category_name'=>$this->category  # return new object from the category model
//            'category'=> new CategoryResource($this->category)
//            'category_name'=>$this->category_id? $this->category->name : null # return new object from the category model
            'category'=> new CategoryResource($this->category),
            'product_creator'=>$this->product_owner
//
        ];


    }
}
