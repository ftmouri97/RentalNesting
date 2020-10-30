$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    readData();
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
        formData.append('detail_image', $("#detail_image")[0].files[0])
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
    }else{
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
