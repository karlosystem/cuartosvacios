; (function ($) {
    "use strict"

    //Close buttton 
    $("#btn-close").on("click", function () {
        $('.float-banner').addClass('hidethis');
    });

    $.fn.floatbanner = function (options) {

        //Default options
        var settings = $.extend({
            socialName: ['instagram'],
            userName: ['sorayarooms'],
            socialUrl: ['https://www.instagram.com/sorayarooms/?hl=es-la', 'http://fb.com/sorayarooms'],
        }, options);

        var name = settings.socialName;
        var user = settings.userName;
        var link = settings.socialUrl;

        this.each(function () {

            var i = 0;
            for (i; i < name.length; i++) {
                var typ, titulo;
                switch (name[i]) {
                    case "instagram":
                        typ = "VIDEOS HERE",
                            titulo = "Videos de Cuartos Vacios en Instagram"
                        break;
                    // case "facebook":
                    //     typ = "LIKE",
                    //         titulo = "Dale ME GUSTA y obten descuentos"
                    //     break;

                }


                $('.floar-banner-wrap').prepend(
                    `<div class="${name[i]}-wrap social-wrap">
                        <div class="social-logo">
                            <img src="https://cuartosvacios.com/img/${name[i]}.png" alt="">
                        </div>
                        <div class="social-details">
                            <h6>${titulo}</h6>
                            <h4>
                                <span><a class="btn btn-primary btn-sm rounded-pill" target="_blank" href="${link[i]}">${typ}</a>
                            </h4>
                        </div>
                    </div>`
                );
            }



            var state = true;
            $(window).scroll(function () {
                if ($(window).scrollTop() >= 200) {
                    $('.float-banner').removeClass('nav-down').addClass('nav-up');
                    if (state) {
                        var random = Math.floor(Math.random() * name.length);
                        var theCls = name[random];
                        $('.float-banner').addClass(theCls);
                        state = false;
                    }

                } else {
                    $('.float-banner').removeClass('nav-up').addClass('nav-down');
                    $('.float-banner').removeClass('facebook twitter instagram');
                    state = true;
                }
            });




        });
        return this;
    };

})(jQuery)