@extends('owner.layout.app')

@section('main-panel')
<div class="page-header">
    <h3 class="page-title">
        Renters
    </h3>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Sl No#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Apertment</th>
                    <th>Rent status</th>
                    <th>Service charge status</th>
                    <th>Gas bill status</th>
                </tr>
              </thead>
              <tbody id="data">

              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<script src="{{asset('assets/melody')}}/js/data-table.js"></script>
<script src="{{asset('assets/owner/renters.js')}}"></script>
@endsection
