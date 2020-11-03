$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log("Jquery running!");
    ownerApprovalPosts();
})

function ownerApprovalPosts() {
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'owner-panding-posts',
        success: function (data) {
            $("#owner-posts").html(data)
        }
    })
}

function accept_apartment(id) {
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'accept-owner-panding-posts/'+id,
        success: function (data) {
            ownerApprovalPosts();
        }
    })
}

function delete_apartment(id) {
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'delete-owner-panding-posts/'+id,
        success: function (data) {
            ownerApprovalPosts();
        }
    })
}
