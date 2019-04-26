class FormEvent {
    helpInput() {
        $('.pass').on('input', function () {
            const mdp = $('.pass').val();
            let passMessage = "insuffisant";
            let colorMessage = "red";
            if (mdp.length >= 10) {
                passMessage = "Correct <i class=\"far fa-smile-wink\"></i>";
                colorMessage = "green";
                $('#help').html(passMessage).css('color', colorMessage).css('font-size','20px');
            }
            if (mdp.length === 6) {
                passMessage = "Moyennne";
                colorMessage = "orange";
                $('#help').html(passMessage).css('color', colorMessage).css('font-size','20px');
            } else if (mdp.length < 3) {
                passMessage = "Insuffisant <i class=\"far fa-angry\"></i>";
                colorMessage = "red";
                $('#help').html(passMessage).css('color', colorMessage).css('font-size','20px');
            }
        });
    }

    helpMail()
    {
        $('.mail').on('input', function(e) {
            const mail = $('.mail').val();
            let message = "Adresse mail non valide";
            let colorMessage = "red";

            if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(mail)) {
                message = "Adresse valide <i class=\"far fa-smile-wink\"></i></i>";
                colorMessage = "green";
                $('.helpMail').html(message).css('color', colorMessage).css('font-size','20px');
            } else {
                message = "Adresse non valide <i class=\"far fa-angry\"></i>";
                colorMessage = "red";
                $('.helpMail').html(message).css('color', colorMessage).css('font-size','20px');
                e.preventDefault();
            }
        })
    }
}
