@extends('layouts.adlayout')

@section('title')

Services Category-List| MkulimaBora Admin
    
@endsection

@section('content')

<!-- Modal -->
<div class="modal fade" id="servicelistmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Service-List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form action="{{url('/servicelist-add')}}"method="post">
          {{ csrf_field() }}    
        <div class="modal-body">
            <div class="form-group">
                <label for="">Service Category</label>
                <select name="serv_cate_id"class="form-control" required>
                    <option value="">--Select Service Category--</option>
                    @foreach ($service_category as $cate_item)
                    <option value="{{$cate_item->id}}">{{$cate_item->service_name}}</option>
                    @endforeach
                </select> 
                    <div class="form-group">
                        <label for="">ServiceList Name</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter title/Service Name">
                    </div>
                    <div class="form-group">
                        <label for="">ServiceList Description</label>
                            <textarea name="description" class="form-control"rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">ServiceList Price</label>
                            <input type="text" name="price" class="form-control" placeholder="Enter Price">
                    </div>
                    <div class="form-group">
                        <label for="">ServiceList Duration</label>
                            <input type="text" name="duration" class="form-control" placeholder="Enter Duration">
                    </div>
            </div>
         </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>    
        </div>
    </div>
  </div>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Services Category-List
 {{-- add toggle modal to your button then sur modal id paste it to your target --}}
          <a href="" class="btn btn-primary float-right py-1"data-toggle="modal" data-target="#servicelistmodal">Add</a>
        </h4>
             
        </div>

        <div class="card-body">
       
            <table id="datatable" class="table">
              <thead>
            <tr>
              <th>
                ID
              </th>
                <th>
                  Service Category
                </th>
                <th class="w-10p">
                  Name
                </th>
                <th class="w-10p">
                  Price
                </th>
                <th class="text-right">
                    EDIT
                  </th><th class="text-right">
                    DELETE
                  </th>
                </tr> 
            </thead>
            <tbody>
              @foreach ($service_list as $item)
                <tr>   
                   <td>{{$item->id}}</td>
                   <td>{{$item->service_category->service_name}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->price}}</td>

                    <td class="text-right">
                    <a href="{{url('service-list-edit/'.$item->id) }}" class="btn btn-info">Edit</a>
                    </td>
                    <td class="text-right">
                        <button type="button" class="btn btn-danger servicedeletebtn">Delete</button>
                    </td>
                </tr>
                @endforeach  
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>  
</div>
@endsection