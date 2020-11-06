$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    read_renter_info();
})

function read_renter_info() {
    $.ajax({
        processData: false,
        contentType: false,
        url: "read-renter-info",
        type: "get",
        success: function (data) {
            $("#data").html(data);
            console.log(data);
        }
    })
}


function deleteRenterInfo(id) {
    $.ajax({
        processData: false,
        contentType: false,
        url: "delete-renter-info/"+id,
        type: "get",
        success: function (data) {
            read_renter_info();
            console.log(data);
        }
    })
}
