@extends('admin.layout.app')

@section('main-panel')
<div class="page-header">
    <h3 class="page-title">
        Apartments
    </h3>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Flor no</th>
                    <th>Flat name</th>
                    <th>District</th>
                    <th>Zone</th>
                    <th>Address</th>
                    <th>Bed</th>
                    <th>Bath</th>
                    <th>Size</th>
                    <th>Description</th>
                    <th>Rent</th>
                    
                    <th>Active tatus</th>
                    <th>Active tatus2</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Flor no</td>
                    <td>Flat name</td>
                    <td>District</td>
                    <td>Zone</td>
                    <td>Address</td>
                    <td>Bed</td>
                    <td>Batd</td>
                    <td>Size</td>
                    <td>Description</td>
                    <td>Rent</td>
                   
                    <td>Active tatus</td>
                    <td>
                      <label class="badge badge-info">On hold</label>
                    </td>
                    <td>
                      <button class="btn btn-outline-primary">View</button>
                    </td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<script src="{{asset('assets/melody')}}/js/data-table.js"></script>
<script>
    $(function() {
        readData();
    })

    function readData() {
        $.ajax({
            processData:false,
            contentType:false,
            type:'GET',
            url:'{{url("read-apartment-details")}}',
            success:function(data){
                console.log(data);
            }
        })
    }
</script>
@endsection
