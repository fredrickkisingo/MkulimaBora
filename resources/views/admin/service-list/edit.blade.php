@extends('layouts.adlayout')

@section('title')

Services Category-List| MkulimaBora Admin
    
@endsection

@section('content')
 <div class="row">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Services Category-List EDIT</h4>     
                 </div>
                      <div class="card-body">
                         <form action="{{url('/servicelist-update/'.$ser_list->id) }}"method="post">
                                            {{ csrf_field() }}
                                            {{method_field('PUT') }}    
                                            <div class="modal-body">
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Update Now</button>
                                                 </div>
                                                        <div class="form-group">
                                                            <label for="">Service Category</label>
                                                            <select name="serv_cate_id"class="form-control" required>
                                                                    <option value="{{$ser_list->serv_cate_id}}">{{$ser_list->service_category->service_name}}</option>
                                                                        @foreach ($service_category as $cate_item)
                                                                        <option value="{{$cate_item->id}}">{{$cate_item->service_name}}</option>
                                                                        @endforeach
                                                            </select> 
                                                        </div>   
                                                        <div class="form-group">
                                                            <label for="">ServiceList Name</label>
                                                                <input type="text" name="title" class="form-control"value="{{$ser_list->title}}" placeholder="Enter title/Service Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">ServiceList Description</label>
                                                                <textarea name="description" class="form-control"rows="3">{{$ser_list->description}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">ServiceList Price</label>
                                                                <input type="text" name="price" class="form-control"value="{{$ser_list->price}}" placeholder="Enter Price">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">ServiceList Duration</label>
                                                                <input type="text" name="duration" class="form-control"value="{{$ser_list->duration}}" placeholder="Enter Duration">
                                                        </div>
                                            </div>    
                                                                                                       
                                </form>      
                            </div>     
                        
                        </div>  
         </div>  
 </div>
    </div>
@endsection