
function mobileMenuVisible() {
    var winX = document.documentElement.clientWidth;
    if ( winX < 1100 ) {
        $(".wt-mobile-menu").addClass("wmm-show");
        $(".wt-mobile-content").addClass("wmc-show");
    } else {
        $(".wt-mobile-menu").removeClass("wmm-show");
        $(".wt-mobile-content").removeClass("wmc-show");
        $(".wt-mobile-menu").removeClass("wt-mm-active");
        $(".wt-mobile-content").removeClass("wt-mm-cont-active");
        $(".background-inner-content").fadeOut("1000");
    }
}
mobileMenuVisible();

$(".wt-mobile-menu").click(function() {
    if ( $(this).hasClass("wt-mm-active") ) {
        $(this).removeClass("wt-mm-active");
        $(".wt-mobile-content").removeClass("wt-mm-cont-active");
        $(".background-inner-content").fadeOut("1000");
    } else {
        $(this).addClass("wt-mm-active");
        $(".wt-mobile-content").addClass("wt-mm-cont-active");
        $(".background-inner-content").fadeIn("1000");
    }
});
$(".wt-lang-title").click(function() {
    if ($(this).hasClass("wt-lang-active")) {
        $(this).removeClass("wt-lang-active");
        $(".iwt-lang-arrow").removeClass("active-rotate");
    } else {
        $(this).addClass("wt-lang-active");
        $(".iwt-lang-arrow").addClass("active-rotate");
    }
    $(this).next(".wt-lang-list").toggle("normal");
});

$("a[href^='#']").click( function(){
    var modulePosition = $(this).attr("href");
    var yTop = 60;
    $("html, body").animate({ scrollTop: $(modulePosition).offset().top - yTop }, 800);
    return false;
});

$(window).resize(function() {

    mobileMenuVisible();

});