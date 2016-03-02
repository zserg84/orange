
$(document).ready(function(){

    //

});

function welcomeVisible() {

    if ( $(".or-wrapper").hasClass("internal-page") ) {

        setTimeout(function() { $(".start-welcome").addClass("animate-active") }, 200);
        setTimeout(function() { $(".or-wrapper").addClass("wr-activate") }, 200);
        setTimeout(function() {
            $(".start-welcome").removeClass("animate-active");
            $(".start-welcome").addClass("welcome-none");
        }, 1000);

    } else {

        setTimeout(function() { $(".start-welcome").addClass("animate-active") }, 200);
        setTimeout(function() { $(".or-wrapper").addClass("wr-activate") }, 200);
        setTimeout(function() {
            $(".start-welcome").removeClass("animate-active");
            $(".start-welcome").addClass("welcome-none");
        }, 1000);

        screenCalculate();

    }

}
welcomeVisible();

function screenCalculate() {
    var winX = document.documentElement.clientWidth;
    var winY = document.documentElement.clientHeight;
    var startSection = winY - 40 - 88 - 62;
    if ( winX < 1400 ) { $(".or-section").addClass("os-mobile"); } else { $(".or-section").removeClass("os-mobile"); }
    if ( winX < 1050 ) { startSection = startSection + 40; }
    $(".or-wrapper").css("height", winY + "px");
    $(".or-great-block").css("height", startSection + "px");

    if ( winX < 1400 ) {
        if ( winX < 1050 ) {

            if ( winY < 850 ) {
                $(".carousel-start-page").css("height", (startSection-122) + "px");
            } else {
                $(".carousel-start-page").css("height", (startSection-146) + "px");
            }

        } else {

            if ( winY < 850 ) {
                $(".carousel-start-page").css("height", (startSection-122) + "px");
            } else {
                $(".carousel-start-page").css("height", (startSection-146) + "px");
            }
        }
    } else {
        $(".carousel-start-page").css("height", (startSection-200) + "px");
    }

    if ( $(".or-section").hasClass("os-mobile") ) {
        if ( winX < 1050 ) {
            $(".or-section").css("height", startSection + 18 + "px");

            if ( winY < 850 ) {
                $(".or-great-block").css("height", startSection + 22 + 18 + "px");
            } else {
                $(".or-great-block").css("height", startSection + 18 + "px");
            }

        } else {
            $(".or-section").css("height", startSection + 20 + "px");

            if ( winY < 850 ) {
                $(".or-great-block").css("height", startSection + 42 + "px");
            } else {
                $(".or-great-block").css("height", startSection + 20 + "px");
            }

        }
    } else {
        $(".or-section").css("height", startSection + "px");
    }

    if ( winY < 850 ) {
        if ( $(".footer-container").hasClass("fc-min-height") ) { return false; } else {
            $(".footer-container").addClass("fc-min-height");
        }
        if ( $(".or-menu").hasClass("menu-fs-12") ) { return false; } else {
            $(".or-menu").addClass("menu-fs-12");
        }
    } else {
        if ( $(".footer-container").hasClass("fc-min-height") ) {
            $(".footer-container").removeClass("fc-min-height");
        } else { return false; }
        if ( $(".or-menu").hasClass("menu-fs-12") ) {
            $(".or-menu").removeClass("menu-fs-12");
        } else { return false; }

        $(".or-great-block").css("height", startSection + "px");

    }

}


function mapModule() {
    var winX = document.documentElement.clientWidth;
    if ( winX < 1000 ) {
        if ( winX < 750 ) {
            var moduleMap = winX - 40;
        } else {
            var moduleMap = winX - 70;
        }
        $(".module-map-floor").each(function() {
            $(this).css("width", moduleMap + "px");
        });
    } else {
        if (winX < 1200 ) {

            if (winX < 1050) {

                $(".module-map-floor").each(function() {
                    $(this).css("width", "100%");
                });

            } else {

                var moduleMapFW = winX - 250;
                $(".module-map-floor").each(function () {
                    $(this).css("width", moduleMapFW + "px");
                });

            }

        } else {

            $(".module-map-floor").each(function () {
                $(this).css("width", "100%");
            });

        }

    }
}
mapModule();


function activeBox(itemBox, space, e) {
    if(!space)
        return;
    var iBox = $("."+itemBox);
    var iTooltip = $(".map-tooltip");
    var winX = document.documentElement.clientWidth;
    allDieActive();
    iBox.addClass("box-active");

    var target = e.target;
    var thisObj = $(target).offset();
    var curX = (e.pageX - thisObj.left) - 147;
    var curY = (e.pageY - thisObj.top) - 10;
    $.ajax({
        url: '/tenant/info',
        type: 'GET',
        data: {spaceId: space},
        error: function (xhr, status, error) {
            alert('error');
        },
        success: function (result, status, xhr) {
            $(iTooltip).find(".tooltip-content").html(result);
            if ( winX < 1080 ) {
                $(".mobile-tooltip").addClass("mt-visible");
                $(".mt-content-block").replaceWith(iTooltip.html());
            } else {
                iTooltip.addClass("tt-active");

                $(iTooltip).css({ left : curX + "px", top : curY + "px" });

            }
        }
    });
}
function inHoverBox(itemBox) {
    var hBox = $("."+itemBox);
    $(".map-box").each(function() { $(this).removeClass("hover-box-active"); });
    hBox.addClass("hover-box-active");
}
function outHoverBox() {
    $(".map-box").each(function() { $(this).removeClass("hover-box-active"); });
}
function allDieActive() {
    $(".map-box").each(function() { $(this).removeClass("box-active"); });
    $(".map-tooltip").each(function() { $(this).removeClass("tt-active"); });
}
$(document).mousedown(function (e){
    var mapBox = $(".map-tooltips-boxes");
    if (!mapBox.is(e.target) && mapBox.has(e.target).length === 0) { allDieActive(); }
});

$(document).on("click", ".close-mt-tooltip", function() {
    $(".mt-content").children(".tooltip-container").remove();
    $(".mt-content").append("<div class='mt-content-block'>mobile popup</div>");
    $(".mobile-tooltip").removeClass("mt-visible");
});

$(document).on("click", ".ts-advertising", function() {
    $(".pop-leave-demand .pop-description img").prop("src", $(this).data("image"));
    $(".pop-leave-demand").addClass("pop-show");
});
$(document).on("click", ".pop-close", function() {
    $(".pop-leave-demand").removeClass("pop-show");
});

$(document).on("mouseover", "#mapCoordinateCur area", function(){
    $block = $(this).data("block");
    inHoverBox($block);
});
$(document).on("mouseout", "#mapCoordinateCur area", function(){
    outHoverBox($block);
});
$(document).on("click", "#mapCoordinateCur area", function(e){
    $block = $(this).data("block");
    $space = $(this).data("space");
    activeBox($block, $space,e);
});


$(window).resize(function(){

    mapModule();

    if ( $(".or-wrapper").hasClass("internal-page") ) { return false; } else { screenCalculate(); }

});

$(".loader-img").addClass("loader-none");