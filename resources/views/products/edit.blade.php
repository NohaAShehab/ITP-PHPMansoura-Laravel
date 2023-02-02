@extends('layouts.app')
@section('title')  Add new Product @endsection

@section('content')
    <h1> Edit Product </h1>
    <form class="form" action="{{route("products.update", $product->id)}}"  method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name"
                   value="{{$product->name}}"
                   class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name='price'
                   value="{{$product->price}}"
                   class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">InStock</label>
            <input type="number" name="instock"
                   value="{{$product->instock}}"
                   class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
