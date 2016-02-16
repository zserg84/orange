(function () {
        var $window = $(window).flexslider();
        function getWindowSize() {
            var winX = document.documentElement.clientWidth;
            return winX;
        }
        function getGridSize() {
            var winX = getWindowSize();
            return (winX < 500) ? 1 : (winX < 780) ? 3 : (winX < 1280) ? 5 : 7;
        }
        function getGridSizePV() {
            return 1;
        }
        $window.load(function () {
            $('.gallery-display').flexslider({
                randomize: false,
                animation: "slide",
                animationSpeed: 600,
                slideshowSpeed: 4000,
                animationLoop: true,
                itemWidth: 126,
                itemMargin: 0,
                directionNav: true,
                controlNav: false,
                move: 1,
                minItems: getGridSize(),
                maxItems: getGridSize(),
                start: function (slider) {
                    $('body').removeClass('loading');
                    flexsliderComment = slider;
                }
            });
        });
        $window.load(function () {
            $('.pv-photo').flexslider({
                randomize: false,
                animation: "slide",
                animationSpeed: 600,
                slideshowSpeed: 4000,
                slideshow: false,
                animationLoop: true,
                smoothHeight: true,
                itemMargin: 0,
                directionNav: true,
                controlNav: false,
                move: 1,
                minItems: getGridSizePV(),
                maxItems: getGridSizePV(),
                start: function (slider) {
                    $('body').removeClass('loading');
                    flexsliderPV = slider;
                }
            });
        });
        $window.resize(function () {
            var gridSize = getGridSize();
            flexsliderComment.vars.minItems = gridSize;
            flexsliderComment.vars.maxItems = gridSize;
            flexsliderComment.update();
            flexsliderComment.slides.width(flexsliderComment.computedW);
            if(flexsliderComment.last < flexsliderComment.slides.length - 1){
                flexsliderComment.flexAnimate(0);
            }
            var gridSizePV = getGridSizePV();
            flexsliderPV.vars.minItems = gridSizePV;
            flexsliderPV.vars.maxItems = gridSizePV;
            flexsliderPV.update();
            flexsliderPV.slides.width(flexsliderPV.computedW);
            if(flexsliderPV.last < flexsliderPV.slides.length - 1){
                flexsliderPV.flexAnimate(0);
            }
        });
}());
