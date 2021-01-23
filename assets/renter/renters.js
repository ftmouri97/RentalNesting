$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    readRenters();
})

function rent_accepting(id) {
    $.ajax({
        processData: false,
        contentType: false,
        url: "rent-accepting/"+id,
        type: "get",
        success: function (data) {
            readRenters();
        }
    })
}

function service_charge_accepting(id) {
    $.ajax({
        processData: false,
        contentType: false,
        url: "service-charge-accepting/"+id,
        type: "get",
        success: function (data) {
            readRenters();
        }
    })
}

function gasbill_accepting(id) {
    $.ajax({
        processData: false,
        contentType: false,
        url: "gas-bill-accepting/"+id,
        type: "get",
        success: function (data) {
            readRenters();
        }
    })
}

function readRenters() {
    $.ajax({
        processData: false,
        contentType: false,
        url: "read-renter-details/",
        type: "get",
        success: function (data) {
            $("#data").html(data)
        }
    })
}
