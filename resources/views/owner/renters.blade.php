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
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Apertment</th>
                    <th>Rent status</th>
                    <th>Service charge status</th>
                    <th>Gas bill status</th>
                    <th>Water bill status</th>
                </tr>
              </thead>
              <tbody>
                {{-- <tr>
                    <td>1</td>
                    <td>2012/08/03</td>
                    <td>Edinburgh</td>
                    <td>New York</td>
                    <td>$1500</td>
                    <td>$3200</td>
                    <td>
                      <label class="badge badge-info">On hold</label>
                    </td>
                    <td>
                      <button class="btn btn-outline-primary">View</button>
                    </td>
                </tr> --}}
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('page-js')
<script src="{{asset('assets/melody')}}/js/data-table.js"></script>
@endsection
