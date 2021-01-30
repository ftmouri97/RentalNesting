@extends('admin.layout.app')

@section('main-panel')
<div class="page-header">
    <h3 class="page-title">
        List Of Holding No
    </h3>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-">
        <h3></h3>
      <!--  <button class="btn btn-primary" data-toggle="modal" data-target="#add-holding-modal">Add</button>-->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Holding No</th>
                    
                </tr>
              </thead>
              <tbody>
     @foreach($holding_address as $holding )
    <tr>
      
      <td>{{ $holding->id }}</td>
      <td>{{ $holding->holding_id }}</td>
      
      
    </tr>
    @endforeach
    </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

