$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    readRenters();
})

// function SubmitAdvanceRent() {
//     formdata = new FormData();
//     formdata.append('rent_request_id',$("#rent_request_id").val());
//     formdata.append('advance_rent',$("#advance_rent").val());
//     $.ajax({
//         processData: false,
//         contentType: false,
//         data:formdata,
//         url: "accept-booking-request",
//         type: "post",
//         success: function (data) {
//             $("#advanceRentModal").modal('hide')
//             $("#advance_rent").val('')
//             readRenters();
//         }
//     })
// }

// function accept_booking_request(id) {
//     $("#rent_request_id").val(id)
//     $("#advanceRentModal").modal('show')
// }

function rent_accepting(id) {
    alert(id);
    // $.ajax({
    //     processData: false,
    //     contentType: false,
    //     url: "delete-booking-request/"+id,
    //     type: "get",
    //     success: function (data) {
    //         readRenters();
    //     }
    // })
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
