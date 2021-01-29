@extends('owner.layout.app')

@section('main-panel')
<div class="page-header">
    <h3 class="page-title">
        Apartments
    </h3>
</div>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-">
        <h3></h3>
        <button class="btn btn-primary" data-toggle="modal" data-target="#add-apertment-detail-modal">Add</button>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="apartment-details">

        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="add-apertment-detail-modal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Property Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="floor_no">Holding Address</label>
                <input type="text" class="form-control" id="holding_address" placeholder="holding_address">
                <p id="holding_error" style="color:red">ERROR</p>
            </div>
            <div class="form-group">
                <label for="floor_no">Floor no</label>
                <input type="text" class="form-control" id="floor_no" placeholder="Floor no" value=" ">
            </div>
            <div class="form-group">
                <label for="flat_name">Flat Name</label>
                <input type="text" class="form-control" id="flat_name" placeholder="Flat name" value=" ">
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" class="form-control" id="district" placeholder="District" value=" ">
            </div>
            <div class="form-group">
                <label for="zone">Zone</label>
                <input type="text" class="form-control" id="zone" placeholder="Zone" value=" ">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Address" value=" ">
                <input type="text" class="form-control" id="floor_no" placeholder="Floor no" >
            </div>
            <div class="form-group">
                <label for="flat_name">Flat name</label>
                <input type="text" class="form-control" id="flat_name" placeholder="Flat name" >
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" class="form-control" id="district" placeholder="District" >
            </div>
            <div class="form-group">
                <label for="zone">Zone</label>
                <input type="text" class="form-control" id="zone" placeholder="Zone" >
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Address" >

            </div>
            <div class="form-group">
                <label for="total_bed">Bed Room</label>
                <input type="number" class="form-control" id="total_bed" placeholder="Total bed" value=" ">
            </div>
            <div class="form-group">
                <label for="total_bath">Bath Room</label>
                <input type="number" class="form-control" id="total_bath" placeholder="Total bath" value=" ">
            </div>
            <div class="form-group">

                <label for="apartment_size">Property Size</label>
                <input type="text" class="form-control" id="apartment_size" placeholder="apartment size" value=" ">

                <label for="apartment_size">Apartment size</label>
                <input type="text" class="form-control" id="apartment_size" placeholder="apartment size" >
            </div>
            <div class="form-group">
                <label for="feature_image">Property Feature Image</label>
                <input type="file" id="feature_image">
            </div>
            <div class="form-group">
                <label for="detail_image">Property Details Images</label>
                <input type="file" id="detail_image" multiple>
            </div>
            <div class="form-group">
                <label for="apartment_rent">Rent</label>
                <input type="text" class="form-control" id="apartment_rent" placeholder="apartment rent" value=" ">
            </div>
            <div class="form-group">
                <label for="apartment_category">Property Type</label>
                <select class="form-control" id="apartment_category" placeholder="Apartment category">
                    <option value="apartment">All</option>
                    <option value="apartment">Apartment</option>
                    <option value="apartment">Duplex</option>
                    <option value="sublet">Sublet</option>
                    <option value="office space">Office Space</option>
                </select>
            </div>
            <div class="form-group">
                <label for="apartment_description">Property Description</label>
                <textarea  type="text" class="form-control" id="apartment_description" placeholder="apartment description"> </textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="addApertmentDetails()">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" tabindex="-1" role="dialog" id="edit-apertment-detail-modal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Property Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="edit_apartment_id">
            <div class="form-group">
                <label for="edit_floor_no">Floor no</label>
                <input type="text" class="form-control" id="edit_floor_no" placeholder="Floor no" >
            </div>
            <div class="form-group">
                <label for="edit_flat_name">Flat name</label>
                <input type="text" class="form-control" id="edit_flat_name" placeholder="Flat name" >
            </div>
            <div class="form-group">
                <label for="apartment_edit_category">Property Type</label>
                <select name="apartment_category" class="form-control" id="apartment_edit_category" placeholder="Apartment category">
                    <option value="apartment">All</option>
                    <option value="apartment">Apartment</option>
                    <option value="apartment">Duplex</option>
                    <option value="sublet">Sublet</option>
                    <option value="office space">Office Space</option>
                </select>
            </div>
            <div class="form-group">
                <label for="edit_district">District</label>
                <input type="text" class="form-control" id="edit_district" placeholder="District" value=" ">
            </div>
            <div class="form-group">
                <label for="edit_zone">Zone</label>
                <input type="text" class="form-control" id="edit_zone" placeholder="Zone" value=" ">
            </div>
            <div class="form-group">
                <label for="edit_address">Address</label>
                <input type="text" class="form-control" id="edit_address" placeholder="Address" value=" ">

                <input type="text" class="form-control" id="edit_district" placeholder="District" >
            </div>
            <div class="form-group">
                <label for="edit_zone">Zone</label>
                <input type="text" class="form-control" id="edit_zone" placeholder="Zone" >
            </div>
            <div class="form-group">
                <label for="edit_address">Address</label>
                <input type="text" class="form-control" id="edit_address" placeholder="Address" >

            </div>
            <div class="form-group">
                <label for="edit_total_bed">Bed Room</label>
                <input type="number" class="form-control" id="edit_total_bed" placeholder="Total bed" value=" ">
            </div>
            <div class="form-group">
                <label for="edit_total_bath">Bath Room</label>
                <input type="number" class="form-control" id="edit_total_bath" placeholder="Total bath" value=" ">
            </div>
            <div class="form-group">

                <label for="edit_apartment_size">Property Size</label>
                <input type="text" class="form-control" id="edit_apartment_size" placeholder="apartment size" value=" ">

                <label for="edit_apartment_size">Apartment size</label>
                <input type="text" class="form-control" id="edit_apartment_size" placeholder="apartment size" >

            </div>
            <div class="form-group">
                <label for="edit_feature_image">Property Feature Image</label>
                <input type="file" id="edit_feature_image">
                <input type="hidden" id="edit_feature_image_value">
            </div>
            <div class="form-group">
                <label for="edit_apartment_rent">Rent</label>
                <input type="text" class="form-control" id="edit_apartment_rent" placeholder="apartment rent" value=" ">
            </div>
            <div class="form-group">
                <label for="edit_apartment_description">Property Description</label>
                <textarea  type="text" class="form-control" id="edit_apartment_description" placeholder="apartment description"> </textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="updateApertmentDetails()">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="detailImagesModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateExampleModalScrollableTitle">Managing Images</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="apartment-hidden-id">
                <div class="row" id="detailImages"></div>
            </div>
            <div class="modal-footer">
                <input type="file" class="form-control" id="new-apartment-image" multiple>
                <button type="button" class="btn btn-primary" id="UpdateApartmentImage">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js')
{{-- <script src="{{asset('assets/melody')}}/js/data-table.js"></script> --}}
<script src="{{ asset('assets')}}/owner/apartment-details.js? {{ time() }}" ></script>
@endsection
