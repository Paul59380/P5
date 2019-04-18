class ShowCity {
    showCity()
    {
        $('#showAddCity').on('click', function () {
            $('#showAddCity').hide();
            $('#hideAddCity').fadeIn();
            $('#city').show(700);
            $('html,body').animate({scrollTop: 0}, 'slow');
        });
    }

    hideCity()
    {
        $('#hideAddCity').on('click', function () {
            $('#hideAddCity').hide();
            $('#showAddCity').fadeIn(700);
            $('#city').hide(700);
            $('html,body').animate({scrollTop: 0}, 'slow');
        });
    }
}
