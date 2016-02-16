$(function () {
    var $window = $(window);
    function getWindowSize() {
        var winX = document.documentElement.clientWidth;
        return winX;
    }
    function getGridSizeStart() {
        var winX = getWindowSize();
        return (winX < 1000) ? 1 : 1;
    }
    $window.load(function () {
        $('.carousel-start-page').flexslider({
            randomize: false,
            animation: "fade",
            animationSpeed: 1000,
            slideshowSpeed: 10000,
            animationLoop: true,
            itemMargin: 0,
            controlNav: true,
            directionNav: false,
            move: 1,
            minItems: getGridSizeStart(),
            maxItems: getGridSizeStart(),
            start: function (slider) {
                $('body').removeClass('loading');
                flexsliderFirst = slider;
            }
        });
    });

    $window.resize(function () {
        setTimeout(function() {
            var gridSizeFirstSlide = getGridSizeStart();
            flexsliderFirst.vars.minItems = gridSizeFirstSlide;
            flexsliderFirst.vars.maxItems = gridSizeFirstSlide;
            flexsliderFirst.update();
            flexsliderFirst.slides.width(flexsliderFirst.computedW);
            if(flexsliderFirst.last < flexsliderFirst.slides.length - 1){
                flexsliderFirst.flexAnimate(0);
            }
        }, 1300);
    });
}());
