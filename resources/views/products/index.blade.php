@extends('app')
@section('pagetitle') Products index @endsection

@section('content')
    <h1> Products index home page </h1>

    @dump($products)

    <table class="table">
        <tr>
            <th>ID</th>  <th> Name</th>  <th> Price</th>  <th> instock</th>
            <th> Show</th>
        </tr>
        @foreach($products as $product )
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->instock}}</td>
                <td> <a class="btn btn-primary" href="{{route("products.show",$product->id)}}"> Show</a> </td>
            </tr>
        @endforeach
    </table>






@endsection


@section('main_section')
        <p> Laravel is Easy </p>
@endsection
