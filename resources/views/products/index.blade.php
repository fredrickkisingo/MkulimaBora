@extends('layouts.app') 
@section('content')

<div class="container">
    <h1>Products Catalogue</h1>
    <div class="row">
        {{-- Carries data from the ProductsController with the variable products --}} 
        @if(count($products)>0) 
        @foreach ($products as $product) {{-- Displays titles on the post table --}}
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img style="width:100%; height: 16vw; object-fit: cover; " src="/storage/{{$product->cover_image}}" class="card-img-top" />
                <div class="card-body">
                    <h3><a href="/products/{{$product->id}}">{{$product->product_name}}</a></h3>
                    <div class="productprice">
                        <div class="pricetext"><i style='font-size:16px' class='fas'>&#xf0d6;</i><b> KSHS {{$product->price}}</b></div>
                    </div>
                    <small>Posted On {{$product->created_at}}</small><br>
                    <small>Farmer Name: {{$product->user->name}}</small><br>
                    <span>Status: </span><span class="text-success"><strong>In Stock</strong></span><br>
                    <a href="/products/{{$product->id}}" class="btn btn-primary">More Information</a>
                    
                </div>
            </div>
            <br>
        </div>
        @endforeach {{-- Pagination connected to the ProductsController --}} {{$products->links()}} 
        @else
        <p>
            No Products Available
        </p>
        @endif
    </div>
</div>
@endsection