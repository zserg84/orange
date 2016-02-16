
function mobileMenuVisible() {
    var winX = document.documentElement.clientWidth;
    var winY = document.documentElement.clientHeight;
    if ( winX < 1050 ) {
        $(".wt-mobile-menu").addClass("wmm-show");
        $(".wt-mobile-content").addClass("wmc-show");
    } else {
        $(".wt-mobile-menu").removeClass("wmm-show");
        $(".wt-mobile-content").removeClass("wmc-show");
        $(".wt-mobile-menu").removeClass("wt-mm-active");
        $(".wt-mobile-content").removeClass("wt-mm-cont-active");
        $(".background-inner-content").fadeOut("1000");
    }
    if ( winY < 500 ) {
        if ( $(".wt-info-block").hasClass("wt-min-rel") ) { return false; } else { $(".wt-info-block").addClass("wt-min-rel"); }
    } else {
        if ( $(".wt-info-block").hasClass("wt-min-rel") ) { $(".wt-info-block").removeClass("wt-min-rel"); } else { return false; }
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

$(window).resize(function() {

    mobileMenuVisible();

});