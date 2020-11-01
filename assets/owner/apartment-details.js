$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    readData();
})

function editApertment(id) {
    $.ajax({
        processData: false,
        contentType: false,
        url: "edit-apartment-details/" + id,
        type: "get",
        success: function (data) {
            // $("#detailImages").html(data);
            alert(data)
        }
    })
}

function manageDetailImages(id) {
    $("#apartment-hidden-id").val(id);
    $("#detailImagesModal").modal('show');
    images_modal()
}

function images_modal() {
    $.ajax({
        processData: false,
        contentType: false,
        url: "manage-apartment-details-images/" + $("#apartment-hidden-id").val(),
        type: "get",
        success: function (data) {
            $("#detailImages").html(data);
        }
    })
}

function delete_single_image(id, image) {
    $.ajax({
        processData: false,
        contentType: false,
        url: "delete-apartment-details-single-image/" + id + "/" + image,
        type: "get",
        success: function (data) {
            images_modal();
        }
    })
}

$("#UpdateApartmentImage").click(function () {
    if ($("#new-apartment-image").val().length !== 0) {
        formData = new FormData()
        formData.append("apartment_id", $("#apartment-hidden-id").val());
        for (var i = 0; i < $("#new-apartment-image").get(0).files.length; i++) {
            formData.append("detail_images[]", document.getElementById('new-apartment-image').files[i]);
        }
        $.ajax({
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            url: 'create-apartment-details-images',
            success: function (data) {
                images_modal();
                $("#new-apartment-image").val('');
            }
        })
    }
    else{
        alert("Select a file");
    }
})


function addApertmentDetails() {
    if (
        $("#floor_no").val().length !== 0 &&
        $("#flat_name").val().length !== 0 &&
        $("#district").val().length !== 0 &&
        $("#zone").val().length !== 0 &&
        $("#address").val().length !== 0 &&
        $("#total_bed").val().length !== 0 &&
        $("#total_bath").val().length !== 0 &&
        $("#apartment_size").val().length !== 0 &&
        $("#apartment_description").val().length !== 0 &&
        $("#apartment_rent").val().length !== 0 &&
        $("#feature_image").val().length !== 0 &&
        $("#detail_image").val().length !== 0
    ) {
        formData = new FormData()
        formData.append('floor_no', $("#floor_no").val())
        formData.append('flat_name', $("#flat_name").val())
        formData.append('district', $("#district").val())
        formData.append('zone', $("#zone").val())
        formData.append('address', $("#address").val())
        formData.append('total_bed', $("#total_bed").val())
        formData.append('total_bath', $("#total_bath").val())
        formData.append('apartment_size', $("#apartment_size").val())
        formData.append('apartment_description', $("#apartment_description").val())
        formData.append('apartment_rent', $("#apartment_rent").val())
        formData.append('feature_image', $("#feature_image")[0].files[0])
        // var totalfiles = document.getElementById('new-room-image').files.length;
        for (var i = 0; i < $("#detail_image").get(0).files.length; i++) {
            formData.append("detail_image[]", document.getElementById('detail_image').files[i]);
        }
        $.ajax({
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            url: 'create-apartment-details',
            success: function (data) {
                if (data) {
                    readData()
                    $("#add-apertment-detail-modal").modal('hide')
                    alert(data)
                    console.log(data);
                }
            }
        })
    } else {
        alert('Fill up all inputs with valid informations')
    }
}

function readData() {
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'read-apartment-details',
        success: function (data) {
            $("#apartment-details").html(data)
        }
    })
}

function deleteApertment(id) {
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'delete-apartment-details/' + id,
        success: function (data) {
            readData()
            alert(data)
        }
    })
}
