@extends('app')
@section('title')  Add new Product @endsection

@section('content')


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

{{--    <form class="form" action="/products/store"  method="POST">--}}
    @dump(route('products.store'))
    <form class="form" action="{{route('products.store')}}"  method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" required class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name='price' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">InStock</label>
            <input type="number" name="instock" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
