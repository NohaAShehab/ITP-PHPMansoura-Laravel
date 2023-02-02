@extends('layouts.app')
@section('title')  Add new Product @endsection

@section('content')
{{--@dd($categories)--}}

    @if ($errors->any())
        @dump($errors)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1> Add new Product </h1>

    @if(auth()->user())
    <h1> Hello {{auth()->user()->name}}</h1>

    @endif

{{--    <form class="form" action="/products/store"  method="POST">--}}
    @dump(route('products.store'))
    <form class="form" action="{{route('products.store')}}?mm==44"  method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name"  class="form-control">
        </div>

{{--        <input type="hidden" name="product_creator" value="{{auth()->user()->id}}" class="form-control">--}}
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name='price' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">InStock</label>
            <input type="number" name="instock" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option selected disabled>Open this select menu</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
