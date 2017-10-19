$(document).ready(function() {
    // définition des variables
    var nav = $("#navbar-vertical");
    var onglets = $("#navbar-vertical ul li");
    var buttonReduce = $("#reduce");
    var plus = $("#reduce .fa-plus");
    var minus = $("#reduce .fa-minus");
    var main = $(".main");
    var open = true;
    var speed = 500;

    console.log(main);
    // au clique on reduit ou agrandi la nav et agrandi le reste de la page
    $(buttonReduce).click(function() {
        if (open == true) {
            nav.animate({
                width: "-=150"
            }, speed, function() {});

            onglets.each(function() {
                $(this).animate({
                    left: "-=150",
                    width: "+=150"
                }, speed, function() {});
            });

            minus.animate({
                opacity: 0
            }, speed, function() {});

            plus.animate({
                opacity: 1
            }, speed, function() {});

            main.animate({
                marginLeft: "-=150",
                width: "+=150"
            }, speed, function() {});

            return open = false;
        }

        else {
            nav.animate({
                width: "+=150"
            }, speed, function() {});

            onglets.each(function() {
                $(this).animate({
                    left: "+=150",
                    width: "-=150"
                }, speed, function() {});
            });

            minus.animate({
                opacity: 1
            }, speed, function() {});

            plus.animate({
                opacity: 0
            }, speed, function() {});

            main.animate({
                marginLeft: "+=150px",
                width: "-=150"
            }, speed, function() {});

            return open = true;
        }
    });
});
