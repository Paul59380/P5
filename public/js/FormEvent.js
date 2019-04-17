class FormEvent {
    helpInput() {
        $('.pass').on('input', function () {
            const mdp = $('.pass').val();
            let passMessage = "insuffisant";
            let colorMessage = "red";
            if (mdp.length >= 10) {
                passMessage = "Correct";
                colorMessage = "green";
                $('#help').html(passMessage).css('color', colorMessage);
            }
            if (mdp.length === 6) {
                passMessage = "Moyennne";
                colorMessage = "orange";
                $('#help').html(passMessage).css('color', colorMessage);
            } else if (mdp.length < 3) {
                passMessage = "Insuffisant";
                colorMessage = "red";
                $('#help').html(passMessage).css('color', colorMessage);
            }
        });
    }
}
