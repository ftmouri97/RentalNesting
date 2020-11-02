$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    readBookingRequests();
})

function SubmitAdvanceRent() {
    formdata = new FormData();
    formdata.append('rent_request_id',$("#rent_request_id").val());
    formdata.append('advance_rent',$("#advance_rent").val());
    $.ajax({
        processData: false,
        contentType: false,
        data:formdata,
        url: "accept-booking-request",
        type: "post",
        success: function (data) {
            $("#advanceRentModal").modal('hide')
            $("#advance_rent").val('')
            readBookingRequests();
        }
    })
}

function accept_booking_request(id) {
    $("#rent_request_id").val(id)
    $("#advanceRentModal").modal('show')
}

function delete_booking_request(id) {
    $.ajax({
        processData: false,
        contentType: false,
        url: "delete-booking-request/"+id,
        type: "get",
        success: function (data) {
            readBookingRequests();
        }
    })
}

function readBookingRequests() {
    $.ajax({
        processData: false,
        contentType: false,
        url: "read-bookings-requests/",
        type: "get",
        success: function (data) {
            $("#data").html(data)
        }
    })
}
