@extends('renter.layout.app')

@section('main-panel')
<div class="page-header">
    <h3 class="page-title">
        Apartments
    </h3>
</div>
<div class="card">
    <div class="card-body">

        <div class="table-responsive">
            <table id="order-listing" class="table table-bordered">
              <thead>
                <tr>
                    <th>Sl NO</th>
                    <th>Month</th>
                    <th>Rent Status</th>
                </tr>
              </thead>
              <tbody id="rent_details">

              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<!-- <script src="{{asset('assets/melody')}}/js/data-table.js"></script> -->
<script src="{{asset('assets/melody')}}/js/custom/renter.js?{{time()}}"></script>
<script>



</script>
@endsection
