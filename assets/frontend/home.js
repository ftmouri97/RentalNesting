$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log("Jquery running!");
})

$("#zone-serch").keyup(function () {
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
    $("#zone-serch").val($(this).text());
    $("#showing-zone").html("");
});

$("#search").click(function() {
    alert("hi");
    $('html, body').animate({
        scrollTop: $(".popular_property").offset().top
    }, 2000);
})
