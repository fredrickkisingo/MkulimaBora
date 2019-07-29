@extends('layouts.app')

@section('content')
<div class="container">
<a href="/products" class="btn btn-default">Back to Products Catalogue</a>
  <div class="card">
    <div class="row">
      <aside class="col-sm-5">
            <a href="#"><img class="img-fluid" style="max-width:100%; max-height:100%;" src="/storage/{{$product->cover_image}}"></a>
        <!-- gallery-wrap .end// -->
      </aside>
      <aside class="col-sm-7">
        <article class="card-body p-5">
          <h3 class="title mb-3"><strong>{{$product->product_name}}</strong></h3>

          <p class="price-detail-wrap">
            <span class="price h3 text-info"> 
		<span class="currency">KSHS </span><span class="num">{!!$product->price!!}</span>
            </span>
            <span>/per kg</span>
          </p>
          <dl class="param param-feature">
            <dt>Farmer Name</dt>
            <dd>{!!$product->user->name!!}</dd>
          </dl>
          <!-- price-detail-wrap .// -->
          <dl class="item-property">
            <dt>Product Description</dt>
            <dd>
              {!!$product->product_desc!!}
            </dd>
          </dl>
          <!--farmer phone number-->
          <dl class="param param-feature">
            <dt>Phone Number</dt>
            <dd>+254{!!$product->phone_number!!}</dd>
          </dl>
          
          
          <!-- item-property-hor .// -->
          <dl class="param param-feature">
            <dt>Posted On</dt>
            <dd>{{$product->created_at}}</dd>
          </dl>
          
          <hr>
          

          <!--if user has logged in -->
          @if(!Auth::guest()) 

            @if(Auth::user()->id == $product->user_id)
              <a href="/products/{{$product->id}}/edit" class="btn btn-warning">Edit</a> 
              {!!Form::open(['action'=>['ProductsController@destroy', $product->id], 'method'=>'POST','class'=>'float-right'])!!} 
              {{Form::hidden('_method', 'DELETE')}} 
              {{Form::submit('Delete', ['class'=>'btn btn-danger'])}} 
              {!!Form::close()!!} 

           
            @else
              {!!Form::open(['action'=>['CartsController@update', $product->id], 'method'=>'POST','class'=>'float-left'])!!} 
              {{Form::hidden('_method','PUT')}}
              
              {!!Form::close()!!}
              
            @endif 

         <!-- Adds the login buttons if user is guest/not logged in -->
          @else
            <a href="/login" class="btn text-uppercase btn-info">Login</a>
          @endif 

          {{-- @if(!Auth::guest()) @if(Auth::user()->id != $product->user_id) @endif @endif --}}
          <!-- row.// -->
        </article>
        <!-- card-body.// -->
      </aside>
      <!-- col.// -->
    </div>
    <!-- row.// -->
  </div>
  <!-- card.// -->
</div>
@endsection