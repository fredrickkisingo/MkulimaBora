@extends ('layouts.app') 
@section ('content')
<div class="container">

  <h1>Edit Your Product Details</h1>
  {!! Form::open(['action'=> ['ProductsController@update', $product->id], 'method'=>'POST','enctype'=>'multipart/form-data'])
  !!}
  <div class="form-row">
    <div class="form-group col-md-6">
      {{-- Starts with the label (first is the label name associated with the second parameter(displayed on the screen)) Then the
      text has the text name associated with what will be entered in the second parameter (empty because user must provide),
      then the third is the attribute of that text or textarea etc using bootstrap --}} 
      {{Form::label('product_name','Product Name')}} 
      {{Form::text('product_name', $product->product_name, ['class'=>'form-control', 'placeholder'=>'Product Name'])}}
    </div>
    <div class="form-group col-md-6">
      {{Form::label('price','Price (KSHS)')}} 
      {{Form::text('price', $product->price, ['class'=>'form-control ', 'placeholder'=>'Price (GH₵)'])}}
    </div>
    <div class="form-group col-md-6">
      {{Form::label('phone_number','My Phone Number')}} 
      {{Form::text('phone_number', $product->phone_number, ['class'=>'form-control ', 'placeholder'=>'Phone Number'])}}
    </div>
  </div>
  <div class="form-group">
    {{Form::label('product_desc','Product Description')}} {{Form::textarea('product_desc', $product->product_desc, ['id'=> 'article-ckeditor',
    'class'=>'form-control', 'placeholder'=>'Product Description'])}}
  </div>
  {{-- file upload --}}
  <div class="form-group">
    {{Form::file('cover_image')}}
  </div>
  {{-- Laravel allows us to spoof a PUT request as per the route requirement since you cannot change the form's method to PUT
  or PATCH therefore, you do the hidden spoofing below --}} {{Form::hidden('_method','PUT')}} {{Form::submit('Submit', ['class'=>'btn
  btn-primary'])}} {!! Form::close() !!}
</div>
@endsection