$(document).ready(function () {
    if ($(window).width() > 575) {
        $(".show-register").click(function () {
            $(".form-container").css('transition', 'all 0.5s linear');
            $(".form-container").toggleClass("show-register");
            $("#login-form").fadeOut();
            $("#register-form").delay(500).fadeIn();
        });

        $(".show-login").click(function () {
            $(".form-container").css('transition', 'all 0.5s linear');
            $(".form-container").toggleClass("show-register");
            $("#register-form").fadeOut();
            $("#login-form").delay(500).fadeIn();
        });

        if ($(".register-input").hasClass("is-invalid")) {
            $(".form-container").css('transition', 'none');
            $(".form-container").addClass("show-register");
            $("#login-form").hide();
            $("#register-form").removeClass('display-none');
        }
    }
});