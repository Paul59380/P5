class ShowCity {
    constructor() {
        $('#city').hide();
        $('#hideAddCity').hide();

        ShowCity.showCity();
        ShowCity.hideCity();
    }

    static showCity() {
        $('#showAddCity').on('click', function () {
            $('#showAddCity').hide();
            $('#hideAddCity').fadeIn();
            $('#city').fadeIn(700);
            $('html,body').animate({scrollTop: 0}, 'slow');
        });
    }

    static hideCity() {
        $('#hideAddCity').on('click', function () {
            $('#hideAddCity').hide();
            $('#showAddCity').fadeIn(700);
            $('#city').hide(700);
            $('html,body').animate({scrollTop: 0}, 'slow');
        });
    }
}
