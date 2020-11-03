$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log("Jquery running!");
    ownerLoginRequests();
})

function ownerLoginRequests() {
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'owner-login-requests',
        success: function (data) {
            $("#owner-login").html(data)
        }
    })
}

function öwnerApprovel(id) {
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'owner-approval/'+id,
        success: function (data) {
            ownerLoginRequests();
            alert(data)
        }
    })
}
