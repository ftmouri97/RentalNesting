@extends('owner.layout.app')

@section('main-panel')
<div class="page-header">
    <h3 class="page-title">
        Booking requests
    </h3>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive" id="data">

        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="advanceRentModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <input type="hidden" id="rent_request_id">
            <div class="form-group">
                <label for="advance">Advance rent</label>
                <input type="number" class="form-control" id="advance_rent" placeholder="Advance rent">
            </div>
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-primary" onclick="SubmitAdvanceRent()">Save changes</button>
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('page-js')
<script src="{{asset('assets/melody')}}/js/data-table.js"></script>
<script src="{{asset('assets/owner/booking-requests.js')}}"></script>
@endsection
