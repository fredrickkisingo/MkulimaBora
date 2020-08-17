@extends('layouts.adlayout')

@section('title')

Services Category| MkulimaBora Admin
    
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Services Category-Add
            <a href="{{url('service-category')}}" class="btn btn-primary float-right py-1">Back</a>


        </h4>        
        </div>

        <div class="card-body">
        <form action ="{{url('category-store')}}" method="POST">
            {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <label>Service Category Name</label>
                            <input type="text" name="service_name" class="form-control" placeholder="Enter Service Name">
                        </div>
                        <div class="col-md-12">
                            <label>Service Category Description</label>
                            <textarea type="text" name="service_description" class="form-control" placeholder="Enter Service Description"></textarea>
                        </div>
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-info">SAVE</button> 
                        </div>
                    </div>
                </div>
            </form>
      </div>
    </div>
   
</div>
    

@endsection