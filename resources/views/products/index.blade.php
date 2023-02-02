@extends('layouts.app')
@section('pagetitle') Products index @endsection

@section('content')
    <div class="container">
    <h1> Products index home page </h1>
    <p style="text-align: center"> <a
            class="btn btn-success"
            href="{{route("products.create")}}"> Create Product</a> </p>
    <table class="table">
        <tr>
            <th>ID</th>  <th> Name</th>  <th> Price</th>  <th> instock</th>
            <th> Show</th>
            <th> Edit</th>
            <th> Delete</th>
        </tr>
        @foreach($products as $product )
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->instock}}</td>
                <td> <a class="btn btn-primary" href="{{route("products.show",$product->id)}}"> Show</a> </td>
                <td> <a class="btn btn-warning" href="{{route("products.edit",$product->id)}}"> Edit</a> </td>

                <td>
                    <form action="{{route('products.destroy', $product->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class='btn btn-danger' value="Delete">
                    </form>
                </td>

            </tr>
        @endforeach
    </table>

    </div>




@endsection


@section('main_section')
        <p> Laravel is Easy </p>
@endsection
