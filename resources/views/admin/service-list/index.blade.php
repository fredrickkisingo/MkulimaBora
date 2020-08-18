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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form action="{{url('/service-list-add')}}"method="post">
          {{ csrf_field() }}    
        <div class="modal-body">
            <div class="form-group">
                <label for="">Service Category</label>
                <select name=""id="">
                    <option value="">--Select Service Category--</option>
                    <option value=""></option>
                    <option value=""></option>


                </select> 

            </div>
         </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
                  Id
                </th>
                <th class="w-10p">
                  Name
                </th>
                <th class="w-10p">
                  Description
                </th>
                <th class="text-right">
                    EDIT
                  </th><th class="text-right">
                    DELETE
                  </th>
                </tr> 
            </thead>
            <tbody>
                <tr>   
                   <td>ssss</td>
                    <td>dddd</td>
                    <td>esdddd</td>
                    <td class="text-right">
                    <a href="" class="btn btn-info">Edit</a>
                    </td>
                    <td class="text-right">
                        <button type="button" class="btn btn-danger servicedeletebtn">Delete</button>
                    </td>
                </tr>
                
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>  
</div>
@endsection