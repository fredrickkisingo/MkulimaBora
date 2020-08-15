@extends('layouts.adlayout')

@section('title')

About Us | MkulimaBora Admin
    
@endsection

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Recipient:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> About Us
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>
        </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Id
                </th>
                <th>
                  Title
                </th>
                <th>
                  City
                </th>
                <th class="text-right">
                  Subtitle
                </th>
                <th class="text-right">
                    EDIT
                  </th><th class="text-right">
                    DELETE
                  </th>
            </thead>
              <tbody>
                <tr>
                  <td>
                    Dakota Rice
                  </td>
                  <td>
                    Niger
                  </td>
                  <td>
                    Oud-Turnhout
                  </td>
                  <td class="text-right">
                    $36,738
                  </td>
                  <td class="text-right">
                      <a href="#" class="btn btn-success">EDIT</a>
                  </td>
                  <td class="text-right">
                    <a href="#" class="btn btn-danger">DELETE</a>
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

@section('scripts')
    
@endsection