class FavoriteEvent {
    constructor($elementHidden, $chevronUp, $buttonOne, $buttonTwo, $chevronDown, $htmlAndBody) {
        $elementHidden.hide();
        $chevronUp.hide();

        FavoriteEvent.showFavoriteTrips($elementHidden, $chevronUp, $buttonOne, $chevronDown, $htmlAndBody);
        FavoriteEvent.hideFavoriteTrips($elementHidden, $chevronUp, $buttonTwo, $chevronDown, $htmlAndBody);
    }

    static showFavoriteTrips($element, $chevronUp, $buttonOne, $chevronDown, $htmlAndBody) {
        $buttonOne.on('click', function () {
            $element.fadeIn(700);
            $chevronDown.hide();
            $chevronUp.fadeIn();
            $htmlAndBody.animate({scrollTop: $element.offset().top}, 'slow');
        });
    }

    static hideFavoriteTrips($element, $chevronUp, $buttonTwo, $chevronDown, $htmlAndBody) {
        $buttonTwo.on('click', function () {
            $element.fadeOut(1000);
            $chevronDown.fadeIn();
            $chevronUp.hide();
            $htmlAndBody.animate({scrollTop: 0}, 'slow');
        });
    }
}
