@extends('owner.layout.app')

@section('main-panel')
<div class="page-header">
    <h3 class="page-title">
        Complains
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
<script>
    $(function() {
        readData();
    })

    function readData() {
        $.ajax({
            processData: false,
            contentType: false,
            url: "complain-showing",
            type: "get",
            success: function (data) {
                $("#data").html(data)
                console.log(data);

            }
        })
    }
    </script>
@endsection
