@extends('admin.layout.app')

@section('main-panel')
<style>
    .owl-stage{
        overflow-y: auto;
        height: 224px;
    }
</style>

<div class="page-header">
    <h3 class="page-title">
        Apartment Requests
    </h3>
</div>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-">
        <h3></h3>
      <!--  <button class="btn btn-primary" data-toggle="modal" data-target="#add-apertment-detail-modal">Add</button>-->
    </div>
    <div class="card-body">
        <div class="table-responsive" id="owner-posts">

        </div>
    </div>
</div>

@endsection

@section('page-js')

<script src="{{ asset('assets/admin/owner-posts.js') }}"></script>
@endsection
