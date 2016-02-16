
function startScreen() {
    var winY = document.documentElement.clientHeight;
    var screenTitleHeight = $(".start-screen-title-container").innerHeight() / 2;
    var screenTitlePosit = ((winY / 2) - screenTitleHeight) - 40;
    $(".start-screen").css("height", winY+"px");
    $(".wrap-container").css("margin-top", winY+"px");
    $(".start-screen-title-container").css("top", screenTitlePosit + "px");
}
startScreen();

function startScreenAnimate() {
    if ( document.documentElement.clientWidth > 1100 ) {
        setTimeout(function() { $(".start-screen").addClass("start-bg-animate"); }, 400);
    }
}
startScreenAnimate();

/* Plan content */
$(".pnl-left-icon").click(function() {
    $(".plan-num-active").each(function() {
        if ( $(this).attr("data-floor-num") > 1 ) {
            $(".plan-num-item").each(function() {
                $(this).removeClass("plan-num-active");
            });
            $(this).prev().addClass("plan-num-active");
            var floorN = $(this).prev().attr("data-floor-num");
            $(".data-floor-"+floorN).click();
        }
    });
});
$(".pnl-right-icon").click(function() {
    $(".plan-num-active").each(function() {
        if ( $(this).attr("data-floor-num") < 14 ) {
            $(".plan-num-item").each(function() {
                $(this).removeClass("plan-num-active");
            });
            $(this).next().addClass("plan-num-active");
            var floorN = $(this).next().attr("data-floor-num");
            $(".data-floor-"+floorN).click();
        }
    });
});

$(".floor-num").click(function() {
    var floorNum = $(this).parent().parent().attr("data-floor");
    var subscribeNum = $(".map-item-"+floorNum);
    var headNum = $(".data-floor-num-"+floorNum);
    $(".subscribe-office").each(function() {
        $(this).removeClass("office-showing");
    });
    $(".plan-map-item").each(function() {
        $(this).removeClass("map-item-active");
    });
    subscribeNum.addClass("map-item-active");
    $(".plan-num-item").each(function() {
        $(this).removeClass("plan-num-active");
    });
    headNum.addClass("plan-num-active");
});

$(".plan-header-btn").click(function() {
    $(".plan-header-btn").each(function() {
        $(this).removeClass("plan-btn-active");
    });
    $(this).addClass("plan-btn-active");
});

function officeOver(num, obj) {
    if ( $(obj).hasClass("data-floor-first") ) {
        $(obj).parent().children(".subscribe-posit-" + num + "-first-floor").addClass("so-hover");
    } else {
        var officeSubscribe = $(obj).parent().children(".subscribe-posit-" + num);
        officeSubscribe.addClass("so-hover");
    }
}
function officeOut(num, obj) {
    if ( $(obj).hasClass("data-floor-first") ) {
        $(obj).parent().children(".subscribe-posit-" + num + "-first-floor").removeClass("so-hover");
    } else {
        var officeSubscribe = $(obj).parent().children(".subscribe-posit-" + num);
        officeSubscribe.removeClass("so-hover");
    }
}

$(".upper-office").click(function() {
    var officeNum = $(this).attr("data-up");
    $(this).parent().children(".subscribe-office").each(function() {
        $(this).removeClass("office-showing");
    });
    if ( $(this).hasClass("data-floor-first") ) {
        $(this).parent().children(".subscribe-posit-"+officeNum+"-first-floor").addClass("office-showing");
    } else {
        $(this).parent().children(".subscribe-posit-"+officeNum).addClass("office-showing");
    }
});

$(".pdk-item-photo").click(function() {
    var photoPath = $(this).attr("data-path");
    $(".photo-office").attr("src", photoPath);
    $(".window-office-gallery").addClass("office-gallery-show");
});
$(".wog-close").click(function() { $(".window-office-gallery").removeClass("office-gallery-show"); });
/*/Plan content/*/

/* Photo View Container */
$(".item-gallery").click(function() {
    var indx = $(this).attr("data-index")*1;
    $(".pv-photo").flexslider(indx);
    $("body").css("overflow", "hidden");
    $(".photo-view-container").addClass("pv-show");
    $(".photo-view-container").focus();
});
$(".pv-close").click(function() {
    $("body").css("overflow", "normal");
    $(".photo-view-container").removeClass("pv-show");
    $("body").focus();
});
/*/Photo View Container/*/

$("a[href^='#']").click( function(){
    var modulePosition = $(this).attr("href");
    var yTop = 70;
    $("html, body").animate({ scrollTop: $(modulePosition).offset().top - yTop }, 800);
    return false;
});

$(".nav-link").click( function(){
    var containerPosition = "#" + $(this).attr("data-link");
    var yTop = 70;
    $("html, body").animate({ scrollTop: $(containerPosition).offset().top - yTop }, 800);
    return false;
});

/* Map buttons navigation */
$(".stop-transport").click(function() {
    $(".marker-other-object").each(function() { $(this).removeClass("marker-active"); });
    $(".marker-outcome").each(function() { $(this).removeClass("marker-active"); });
    $(".marker-transport").each(function() {
        $(this).addClass("marker-active");
    });
});
$(".other-objects").click(function() {
    $(".marker-transport").each(function() { $(this).removeClass("marker-active"); });
    $(".marker-outcome").each(function() { $(this).removeClass("marker-active"); });
    $(".marker-other-object").each(function() {
        $(this).addClass("marker-active");
    });
});
$(".outcome-transport").click(function() {
    $(".marker-other-object").each(function() { $(this).removeClass("marker-active"); });
    $(".marker-transport").each(function() { $(this).removeClass("marker-active"); });
    $(".marker-outcome").each(function() {
        $(this).addClass("marker-active");
    });
});
/*/Map buttons navigation/*/

function mapBuild() {
    var winY = document.documentElement.clientHeight;
    var mapCont = document.getElementById("map-container").getBoundingClientRect().top + ( winY/2 );
    if ( mapCont < winY ) {
        $(".marker-object").addClass("marker-active");
    } else {
        $(".marker-object").removeClass("marker-active");
    }
}

$(window).scroll(function() {

    var winX = document.documentElement.clientWidth;
    var winY = document.documentElement.clientHeight;
    var scrollPosit = $(window).scrollTop();

    var wrapBar = document.getElementById("wrap-container").getBoundingClientRect().top;
    var topBarHeight = $(".top-bar").innerHeight();

    var benefitCont = document.getElementById("benefit-container").getBoundingClientRect().top + ( winY/2 );

    $(".start-screen").css("top", -(scrollPosit/2) + "px");

    if ( winX > 1100 ) {
        if (wrapBar < topBarHeight) {
            $(".top-bar").addClass("top-position");
        } else {
            $(".top-bar").removeClass("top-position");
        }
    }

    if ( benefitCont < winY ) {
        $(".benefit-container").addClass("tiles-animated");
    } else {
        $(".benefit-container").removeClass("tiles-animated");
    }

    mapBuild();

});

$(window).resize(function(){
    startScreen();
});

$(".loader-img").addClass("loader-none");