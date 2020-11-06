@extends('renter.layout.app')

@section('main-panel')
<div class="page-header">
    <h3 class="page-title">
        Apartments
    </h3>
</div>
<div class="card">
    <div class="card-body">
    <div class="modal fade" id="booking_list_details_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body" id="appartment_details">



                        </div>

                      </div>
                    </div>
                  </div>
        <div class="table-responsive">
            <table id="order-listing" class="table table-bordered">
              <thead>
                <tr>
                    <th>Sl NO</th>
                    <th>Address</th>
                    <th>Zone</th>
                    <th>Active tatus</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody id="booking_list_table">

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
