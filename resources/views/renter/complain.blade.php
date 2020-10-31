@extends('renter.layout.app')

@section('main-panel')
<div class="page-header">
    <h3 class="page-title">
        Complain Box
    </h3>
</div>
<div class="card">
<div class="card-body">
                  <h4 class="card-title">Write your complain here</h4>
        
                  <form class="forms-sample">
                    

                    <div class="form-group">
                      <textarea class="form-control" id="complain_text" rows="4"></textarea>
                    </div>
                    <button type="button" onclick="complain_box()" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
</div>
@endsection

@section('page-js')
<!-- <script src="{{asset('assets/melody')}}/js/data-table.js"></script> -->
<script src="{{asset('assets/melody')}}/js/custom/renter.js?{{time()}}"></script>
<script>
  

    
</script>
@endsection
