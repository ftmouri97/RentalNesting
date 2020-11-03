@extends('owner.layout.app')

@section('main-panel')
<div class="card">
    <div class="card-body">
        <div class="page-header">
            <h3 class="page-title">
                Service charges
            </h3>
        </div>
        <div class="table-responsive" id="data">

        </div>
    </div>
</div>
@endsection

@section('page-js')
<script src="{{asset('assets/melody')}}/js/data-table.js"></script>
<script>
    $(function() {
                readData();
            })

            function readData() {
                $.ajax({
                    processData: false,
                    contentType: false,
                    url: "gas-bill-showing",
                    type: "get",
                    success: function (data) {
                        $("#data").html(data)
                    }
                })
            }
</script>
@endsection
