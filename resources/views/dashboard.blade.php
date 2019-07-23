@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- if the user is farmer, display farmers' products --}}
                    @if(Auth::user()->role_id==3)
                        <a href="/products/create" class="btn btn-primary">Add a Product</a>
                        <h3>Here are your Products You Uploaded</h3>
                        @if(count($products)>0)
                            <table class="table table-striped">
                                <tr>
                                <th>Product Name</th>
                                <th></th>
                                <th></th>
                                </tr>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->product_name}}</td>
                                    <td><a href="/products/{{$product->id}}/edit" class="btn btn-default">Edit</a></td>
                                    <td>
                                    {!!Form::open(['action'=>['ProductsController@destroy', $product->id], 'method'=>'POST','class'=>'float-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                    </td>
                                </tr>
                                @endforeach
                            @else
                            <p>
                                You have no products uploaded
                            </p>
                            </table>
                        @endif
                    
                    {{-- else display buyers' past purchases --}}
                    @else
                    <p>You're not a Farmer. Go to Products Page and view Posts by farmers</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
