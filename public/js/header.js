$(function() {

    $(".link").click(function() {
        $(".dropdown").toggle("fast", "swing");
    })

    $(".link2").click(function() {
        $(".dropdown2").toggle("fast", "swing");
    })

    $(".link3").click(function() {
        $(".dropdown3").toggle("fast", "swing");
    })

    $(".fa-bars").click(function() {
        $("nav").toggle("fast", "swing");
        $(this).toggleClass("reduce-icon")
    })
})