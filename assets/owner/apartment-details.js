$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    readData();
})
$("#holding_error").hide();
var holding_address_found;
$("#holding_address").focusout(function(){



                var formData= new FormData();


          formData.append("holding_address",$("#holding_address").val());





                      $.ajax({
             processData: false,
             contentType: false,
             url:"check_holding_address",
             type:"POST",
             data:formData,
             success:function(data){
                var msg = $.trim(data);
                if(msg =="ok")
                {
                    holding_address_found =1;
                   $("#holding_error").hide();
                }
                else
                {
                    holding_address_found =0;
                   $("#holding_error").show();
                   $("#holding_error").html('Holding Address not found');
                }


             },

          });



    })




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
    else {
        alert("Select a file");
    }
})

function editApertment(id) {
    $.ajax({
        processData: false,
        contentType: false,
        url: "edit-apartment-details/" + id,
        type: "get",
        success: function (data) {
            $("#apartment_edit_category").val(data.apartment_category);
            $("#edit_apartment_id").val(data.id)
            $("#edit_floor_no").val(data.floor_no)
            $("#edit_flat_name").val(data.flat_name)
            $("#edit_district").val(data.district)
            $("#edit_zone").val(data.zone)
            $("#edit_address").val(data.address)
            $("#edit_total_bed").val(data.total_bed)
            $("#edit_total_bath").val(data.total_bath)
            $("#edit_apartment_size").val(data.apartment_size)
            $("#edit_apartment_description").val(data.apartment_description)
            $("#edit_apartment_rent").val(data.apartment_rent)
            if (data.feature_image) {
                $("#edit_feature_image_value").val(data.feature_image.image)
            }
            $("#edit-apertment-detail-modal").modal('show')

        }
    })
}

function updateApertmentDetails() {
    var formdata = new FormData();
    formdata.append('id',$("#edit_apartment_id").val())
    formdata.append('apartment_category',$("#apartment_edit_category").val())
    formdata.append('floor_no',$("#edit_floor_no").val())
    formdata.append('flat_name',$("#edit_flat_name").val())
    formdata.append('district',$("#edit_district").val())
    formdata.append('zone',$("#edit_zone").val())
    formdata.append('address',$("#edit_address").val())
    formdata.append('total_bed',$("#edit_total_bed").val())
    formdata.append('total_bath',$("#edit_total_bath").val())
    formdata.append('apartment_size',$("#edit_apartment_size").val())
    formdata.append('apartment_description',$("#edit_apartment_description").val())
    formdata.append('apartment_rent',$("#edit_apartment_rent").val())
    formdata.append('feature_image',$("#edit_feature_image")[0].files[0])
    formdata.append('feature_image_value',$("#edit_feature_image_value").val())
    $.ajax({
        processData: false,
        contentType: false,
        data: formdata,
        type: 'POST',
        url: 'update-apartment-details',
        success: function (data) {
            if (data) {
                readData()
                $("#edit_feature_image_value").val('');
                $("#edit-apertment-detail-modal").modal('hide')
                alert(data)
            }
        }
    })
}

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
        $("#detail_image").val().length !== 0 &&
        $("#apartment_category").val().length !== 0 &&
        holding_address_found == 1
    ) {
        formData = new FormData()
        formData.append('holding_address',$("#holding_address").val())
        formData.append('floor_no', $("#floor_no").val())
        formData.append('flat_name', $("#flat_name").val())
        formData.append('apartment_category', $("#apartment_category").val())
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
