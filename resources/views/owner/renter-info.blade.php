@extends('owner.layout.app')

@section('main-panel')
<div class="card">
    <div class="card-body">
        <div class="page-header">
            <h3 class="page-title">
                Renters informations
            </h3>
        </div>
        <div class="table-responsive" id="data">

        </div>
    </div>
</div>
@endsection

@section('page-js')
<script src="{{asset('assets/owner')}}/renter-info.js"></script>
@endsection
