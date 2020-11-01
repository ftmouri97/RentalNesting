$(function() {
    readBookingRequests();
})

function readBookingRequests() {
    function images_modal() {
        $.ajax({
            processData: false,
            contentType: false,
            url: "read-bookings-requests/",
            type: "get",
            success: function (data) {
                console.log(data);
            }
        })
    }
}
