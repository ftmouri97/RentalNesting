@extends('renter.layout.app')

@section('main-panel')
<div class="page-header">
    <h3 class="page-title">
      Notifications
    </h3>
</div>
<div class="card">
    <div class="card-body">
  
        <div class="table-responsive">
            <table id="order-listing" class="table table-bordered">
              <thead>
                <tr>
                    <th>Sl NO</th>
                    <th>Message</th>
                    <th>Read Status</th>
                </tr>
              </thead>
              <tbody id="notification_list">

              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<!-- <script src="{{asset('assets/melody')}}/js/data-table.js"></script> -->
<script src="{{asset('assets/melody')}}/js/custom/renter.js"></script>
<script>
  

    
</script>
@endsection
