$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log("Jquery running!");
})

$("#zone-search").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
    $.ajax({
        url: "zone-searching",
        method: "post",
        data: {
            zoneSearching: searchText,
        },
        success: function (response) {
        $("#showing-zone").html(response);
        },
    });
    } else {
    $("#showing-zone").html("");
    }
});
// Set searched text in input field on click of search button
$(document).on("click", "a", function () {
    $("#zone-search").val($(this).text());
    $("#showing-zone").html("");
});

$("#search").click(function() {
    if ($("#zone-search").val().length !==0) {
        var total_values =  $("#slider").slider('values');
        var min_value = total_values[0];
        var max_value = total_values[1];
        data = new FormData();
        data.append('zone',$("#zone-search").val())
        data.append('price_min',min_value)
        data.append('price_max',max_value)
        data.append('zone',$("#zone-search").val())
        data.append('bed',$("#bed-search").val())
        data.append('bath',$("#bath-search").val())
        $.ajax({
            processData:false,
            contentType:false,
            url: "apartment-searching",
            method: "post",
            data:data,
            success: function (response) {
                $("#zone-search").val('')
                $("#search_apartment_div").show()
                $("#search_apartment").html(response);
                $('html, body').animate({
                    scrollTop: $("#search_apartment_div").offset().top
                }, 100);
            },
        });
    }else{

        alert("Give a location");
        $("#zone-search").text("");

    }
})
