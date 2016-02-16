$(function () {
    var $window = $(window);
    function getWindowSize() {
        var winX = document.documentElement.clientWidth;
        return winX;
    }
    function getGridSize() {
        var winX = getWindowSize();
        return (winX < 480) ? 1 : (winX < 650) ? 2 : (winX < 830) ? 3 : (winX < 1000) ? 4 : (winX < 1300) ? 5 : 6;
    }
    $window.load(function () {
        $('.head-carousel').flexslider({
            randomize: false,
            animation: "slide",
            animationSpeed: 700,
            slideshowSpeed: 4000,
            animationLoop: true,
            itemWidth: 124,
            itemMargin: 0,
            controlNav: false,
            directionNav: true,
            move: 1,
            minItems: getGridSize(),
            maxItems: getGridSize(),
            start: function (slider) {
                $('body').removeClass('loading');
                flexsliderTopBar = slider;
            }
        });
    });
    $window.resize(function () {
        setTimeout(function() {
            var gridSizeTopBar = getGridSize();
            flexsliderTopBar.vars.minItems = gridSizeTopBar;
            flexsliderTopBar.vars.maxItems = gridSizeTopBar;
            flexsliderTopBar.update();
            flexsliderTopBar.slides.width(flexsliderTopBar.computedW);
            if(flexsliderTopBar.last < flexsliderTopBar.slides.length - 1){
                flexsliderTopBar.flexAnimate(0);
            }
        }, 1300);
    });
}());
