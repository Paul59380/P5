class FavoriteEvent {
    constructor() {
        $('.Trs').hide();
        $('.chevronUp').hide();

        FavoriteEvent.showFavoriteTrips();
        FavoriteEvent.hideFavoriteTrips();
    }

    static showFavoriteTrips() {
        $('.show').on('click', function () {
            $('.Trs').show(700);
            $('.chevron').hide();
            $('.chevronUp').fadeIn();
            $('html,body').animate({scrollTop: $('.Trs').offset().top}, 'slow');
        });
    }

    static hideFavoriteTrips() {
        $('.show2').on('click', function () {
            $('.Trs').hide(1000);
            $('.chevron').fadeIn();
            $('.chevronUp').hide();
            $('html,body').animate({scrollTop: 0}, 'slow');
        });
    }
}
