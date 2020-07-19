$(document).ready(function () {
    if (window.outerWidth < 992) {
        $('.navbar').addClass('navbar-dark');
        $('.navbar').addClass('bg-dark');
        $('.navbar').removeClass('navbar-default');
        $('.navbar').removeClass('bg-transparant');
    } else {
        $(document).ready(function () {
            $(window).scroll(function () {
                // checks if window is scrolled more than 100px, adds/removes solid class
                if ($(this).scrollTop() > 100) {
                    $('.navbar').addClass('navbar-dark');
                    $('.navbar').addClass('bg-dark');
                    $('.navbar').removeClass('navbar-default');
                } else {
                    $('.navbar').addClass('navbar-default');
                    $('.navbar').removeClass('navbar-dark');
                    $('.navbar').removeClass('bg-dark');
                }
            });
        });
    }
});





