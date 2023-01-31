@extends('app')
@section('pagetitle') Products index @endsection

@section('content')
    <h1> Products index home page </h1>
{{--    @dump($products)--}}
{{--    <h1> ------------ </h1>--}}

{{--    @dd($products)--}}
{{--    <h1> ------------ </h1>--}}

{{--    @foreach($products as $product)--}}
{{--         <li> {{$product}} </li>--}}

{{--    @endforeach--}}


{{--    <h1> Product info </h1>--}}
{{--    @foreach($product_info as $k=>$v)--}}

{{--           <p>  {{$k}} : {{$v}} </p>--}}
{{--    @endforeach--}}


{{--    <h1> Product info with another type </h1>--}}
{{--    <p> {{$product_info["name"]}}</p>--}}

    <table class="table">
        <tr>
           <th> Name</th>  <th> Price</th>  <th> instock</th> <th>ID</th>
            <th> Show</th>
        </tr>
        @foreach($products_details as $p )
            <tr>
                @foreach($p as $k=>$v)
                    <td> {{$v}}</td>
                @endforeach
                <td> <a class="btn btn-primary" href="{{route("products.show",$p['id'])}}"> Show</a> </td>
            </tr>
        @endforeach
    </table>






@endsection


@section('main_section')
        <p> Laravel is Easy </p>
@endsection
