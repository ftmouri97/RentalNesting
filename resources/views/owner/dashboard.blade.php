@extends('owner.layout.app')

@section('main-panel')
<div class="page-header">
    <h3 class="page-title">
        Dashboard
    </h3>
</div>
<div class="row">
    <div class="col-md-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-0">Total Renter</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                        <div class="d-md-flex">
                            <h2 class="mb-0">{{ $total_renter }}</h2>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-0">Total Flat</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                        <div class="d-md-flex">
                            <h2 class="mb-0">{{ $total_flat }}</h2>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('page-js')
<script src="{{asset('assets/melody')}}/js/data-table.js"></script>
@endsection
