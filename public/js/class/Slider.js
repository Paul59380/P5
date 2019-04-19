class Slider {
    constructor() {
        $(function () {
            //setInterval
            let width = 1000;
            let animationSpeed = 2000;
            let pause = 5000;
            let currentSlide = 1;

            let $slider = $('#slider');
            let $slideContainer = $slider.find('.slides');
            let $slides = $slideContainer.find('.slide');

            let interval;

            function startSlider()
            {
                interval = setInterval(function () {
                    $slideContainer.animate({"margin-left" : '-='+width}, animationSpeed, function () {
                        currentSlide++;
                        if(currentSlide === $slides.length) {
                            currentSlide = 1;
                            $slideContainer.css('margin-left', 0);
                        }
                    });
                },pause);
            }

            function stopSlider()
            {
                clearInterval(interval);
            }

            $slider.on('mouseenter', stopSlider).on('mouseleave', startSlider);
            startSlider();
        });
    }
}
