@extends ('layouts.app') 
@section ('content')
<div class="container">
  <h1>New Product</h1>

  {!! Form::open(['action'=> 'ProductsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  <div class="form-row">
    <div class="form-group col-md-6">
      {{Form::label('product_name','Product Name')}} 
      {{Form::text('product_name', '', ['class'=>'form-control', 'placeholder'=>'Product Name'])}}
    </div>
    <div class="form-group col-md-6">
      {{Form::label('price','Price (KSHS)')}} 
      {{Form::text('price', '', ['class'=>'form-control ', 'placeholder'=>'Price (KSHS)'])}}
    </div>
    <div class="form-group col-md-6">
      {{Form::label('phone_number','My Phone Number')}} {{Form::text('phone_number', '', ['class'=>'form-control ', 'placeholder'=>'Phone Number'])}}
    </div>
  </div>
  <div class="form-group">
    {{Form::label('product_desc','Product Description')}} 
    {{Form::textarea('product_desc', '', ['id'=> 'article-ckeditor', 'class'=>'form-control',
    'placeholder'=>'Product Description'])}}
  </div>
  <div class="form-group">
    {{Form::file('cover_image')}}
  </div>
  {{Form::submit('Submit', ['class'=>'btn btn-primary'])}} {!! Form::close() !!}

</div>
@endsection