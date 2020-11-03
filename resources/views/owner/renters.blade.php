@extends('owner.layout.app')

@section('main-panel')
<div class="page-header">
    <h3 class="page-title">
        Renters
    </h3>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive" id="data">

        </div>
    </div>
</div>
@endsection

@section('page-js')
<script src="{{asset('assets/owner/renters.js')}}"></script>
@endsection
