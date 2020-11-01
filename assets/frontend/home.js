$(function() {
    // alert("hi");
})

$("#search").click(function() {
    alert("hi");
    $('html, body').animate({
        scrollTop: $(".popular_property").offset().top
    }, 2000);
})
