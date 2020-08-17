@extends('layouts.adlayout')

@section('title')

Services Category| MkulimaBora Admin
    
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Services Category

          <a href="{{url('service-create')}}" class="btn btn-primary float-right py-1">Add</a>
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
                @foreach ($services as $item)
                <tr>      
                <td>{{$item->id}}</td>
                    <td>{{$item->service_name}}</td>
                    <td>{{$item->service_description}}</td>
                    <td class="text-right">
                    <a href="{{url('service-cate-edit/'.$item->id) }}" class="btn btn-info">Edit</a>
                    </td>
                    <td class="text-right">
                        <a href="" class="btn btn-danger">Delete</a>
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