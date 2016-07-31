/***************************************************************************************************************
 ||||||||||||||||||||||||||||         CUSTOM SCRIPT FOR CHARITY HOME            ||||||||||||||||||||||||||||||||||||
 ****************************************************************************************************************
 ||||||||||||||||||||||||||||              TABLE OF CONTENT                  ||||||||||||||||||||||||||||||||||||
 ****************************************************************************************************************
 ****************************************************************************************************************
 
 1 revolutionSliderActiver
 2 galleryMasonaryLayout
 3 LightBox / Fancybox
 4 Gallery Filters
 5 accrodion
 6 pieChart RoundCircle
 7 progressBarConfig
 8 teamCarosule
 9 testiCarosule
 10 clientsCarosule
 11 owlCarosule
 12 CounterNumberChanger
 13 stickyHeader
 14 contactFormValidation
 15 event slider
 16 Common CssJs
 17 selectInput
 18 datePicker
 19 gMap
 20 mobileMenu
 
 ****************************************************************************************************************
 ||||||||||||||||||||||||||||            End TABLE OF CONTENT                ||||||||||||||||||||||||||||||||||||
 ****************************************************************************************************************/


"use strict";

// 1 revolutionSliderActiver
function revolutionSliderActiver() {
    if ($('.rev_slider_wrapper #slider1').length) {
        $("#slider1").revolution({
            sliderType: "standard",
            sliderLayout: "auto",
            delay: 5000,
            navigation: {
                arrows: {enable: true}
            },
            gridwidth: 1170,
            gridheight: 770
        });
    }
    ;
}

// 2 galleryMasonaryLayout
function galleryMasonaryLayout() {
    if ($('.img-masonary').length) {
        $('.img-masonary').isotope({
            layoutMode: 'masonry'
        });
    }
}

// 3 LightBox / Fancybox
if ($('.lightbox-image').length) {
    $('.lightbox-image').fancybox({
        openEffect: 'elastic',
        closeEffect: 'elastic',
        helpers: {
            media: {}
        }
    });
}

// 4 Gallery Filters
if ($('.filter-list').length) {
    $('.filter-list').mixItUp({});
}

// 5 accrodion
function accrodion() {
    if ($('.accrodion-grp').length) {
        $('.accrodion-grp').each(function () {
            var accrodionName = $(this).data('grp-name');
            var Self = $(this);
            Self.addClass(accrodionName);
            Self.find('.accrodion .accrodion-content').hide();
            Self.find('.accrodion.active').find('.accrodion-content').show();
            Self.find('.accrodion').each(function () {
                $(this).find('.accrodion-title').on('click', function () {
                    if ($(this).parent().hasClass('active') === false) {
                        $('.accrodion-grp.' + accrodionName).find('.accrodion').removeClass('active');
                        $('.accrodion-grp.' + accrodionName).find('.accrodion').find('.accrodion-content').slideUp();
                        $(this).parent().addClass('active');
                        $(this).parent().find('.accrodion-content').slideDown();
                    }
                    ;
                });
            });
        });

    }
    ;
}

// 6 pieChart RoundCircle
function expertizeRoundCircle() {
    var rounderContainer = $('.piechart.style-one');
    if (rounderContainer.length) {
        rounderContainer.each(function () {
            var Self = $(this);
            var value = Self.data('value');
            var size = Self.parent().width();
            var color = Self.data('fg-color');

            Self.find('span').each(function () {
                var expertCount = $(this);
                expertCount.appear(function () {
                    expertCount.countTo({
                        from: 1,
                        to: value * 100,
                        speed: 3000
                    });
                });

            });
            Self.appear(function () {
                Self.circleProgress({
                    value: value,
                    size: 142,
                    thickness: 10,
                    emptyFill: 'rgba(149,149,149,1)',
                    animation: {
                        duration: 3000
                    },
                    fill: {
                        color: color
                    }
                });
            });
        });
    }
    ;
}

// 7 progressBarConfig
function progressBarConfig() {
    var progressBar = $('.progress');
    if (progressBar.length) {
        progressBar.each(function () {
            var Self = $(this);
            Self.appear(function () {
                var progressValue = Self.data('value');

                Self.find('.progress-bar').animate({
                    width: progressValue + '%'
                }, 100);

                Self.find('span.value').countTo({
                    from: 0,
                    to: progressValue,
                    speed: 100
                });
            });
        });
    }

}

// 8 teamCarosule
function teamCarosule() {
    if ($('.team-carousel').length) {
        $('.team-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>'
            ],
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
    }
}

// 9 testiCarosule
function testiCarosule() {
    if ($('.testimonaials-carousel').length) {
        $('.testimonaials-carousel').owlCarousel({
            loop: true,
            margin: 50,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
}

//Testimonial Slider
if ($('.testimonials').length) {
    $('.testimonials .slider').owlCarousel({
        items: 2,
        loop: true,
        autoplay: true,
        margin: 40,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            600: {
                items: 1
            },
            768: {
                items: 2
            },
            1024: {
                items: 2
            },
            1200: {
                items: 2
            },
            1600: {
                items: 3
            }

        }
    });
}
//Testimonial Slider
if ($('.testimonials').length) {
    $('.client-carsoule').owlCarousel({
        items: 5,
        loop: true,
        autoplay: true,
        margin: 10,
        autoWidth: true,
        autoHeight: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            600: {
                items: 2
            },
            768: {
                items: 3
            },
            1024: {
                items: 4
            },
            1200: {
                items: 5
            },
            1600: {
                items: 5
            }

        }
    });
}

// 10 clientsCarosule
function clientsCarosule() {
    if ($('.clients-carousel').length) {
        $('.clients-carousel').owlCarousel({
            loop: true,
            margin: 50,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                480: {
                    items: 3
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 5
                },
                1200: {
                    items: 6
                }
            }
        });
    }
}

// 11 owlCarosule
if ($('.owl-carousel-1col').length) {
    $('.owl-carousel-1col').each(function () {
        var data_dots = ($(this).data("dots") === undefined) ? false : $(this).data("dots");
        var data_nav = ($(this).data("nav") === undefined) ? false : $(this).data("nav");
        var data_duration = ($(this).data("duration") === undefined) ? 4000 : $(this).data("duration");
        $(this).owlCarousel({
            rtl: false,
            autoplay: true,
            autoplayTimeout: data_duration,
            loop: true,
            items: 1,
            dots: data_dots,
            nav: data_nav,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>'
            ]
        });
    });
}


if ($('.owl-carousel-2col').length) {
    $('.owl-carousel-2col').each(function () {
        var data_dots = ($(this).data("dots") === undefined) ? false : $(this).data("dots");
        var data_nav = ($(this).data("nav") === undefined) ? false : $(this).data("nav");
        var data_duration = ($(this).data("duration") === undefined) ? 4000 : $(this).data("duration");
        $(this).owlCarousel({
            rtl: true,
            autoplay: true,
            autoplayTimeout: data_duration,
            loop: true,
            items: 2,
            margin: 15,
            dots: data_dots,
            nav: data_nav,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                600: {
                    items: 1,
                    center: false
                },
                750: {
                    items: 2,
                    center: false
                },
                960: {
                    items: 2
                },
                1170: {
                    items: 2
                },
                1300: {
                    items: 2
                }
            }
        });
    });
}

if ($('.owl-carousel-3col').length) {
    $('.owl-carousel-3col').each(function () {
        var data_dots = ($(this).data("dots") === undefined) ? false : $(this).data("dots");
        var data_nav = ($(this).data("nav") === undefined) ? false : $(this).data("nav");
        var data_duration = ($(this).data("duration") === undefined) ? 4000 : $(this).data("duration");
        $(this).owlCarousel({
            rtl: false,
            autoplay: true,
            autoplayTimeout: data_duration,
            loop: true,
            items: 3,
            margin: 15,
            dots: data_dots,
            nav: data_nav,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                600: {
                    items: 1,
                    center: false
                },
                750: {
                    items: 2,
                    center: false
                },
                960: {
                    items: 2
                },
                1170: {
                    items: 3
                },
                1300: {
                    items: 3
                }
            }
        });
    });
}

if ($('.owl-carousel-4col').length) {
    $('.owl-carousel-4col').each(function () {
        var data_dots = ($(this).data("dots") === undefined) ? false : $(this).data("dots");
        var data_nav = ($(this).data("nav") === undefined) ? false : $(this).data("nav");
        var data_duration = ($(this).data("duration") === undefined) ? 4000 : $(this).data("duration");
        $(this).owlCarousel({
            rtl: false,
            autoplay: false,
            autoplayTimeout: data_duration,
            loop: true,
            items: 4,
            margin: 15,
            dots: data_dots,
            nav: data_nav,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                600: {
                    items: 1,
                    center: false
                },
                750: {
                    items: 2,
                    center: false
                },
                960: {
                    items: 3
                },
                1170: {
                    items: 4
                },
                1300: {
                    items: 4
                }
            }
        });
    });
}

// 12 CounterNumberChanger
function CounterNumberChanger() {
    var timer = $('.timer');
    if (timer.length) {
        timer.appear(function () {
            timer.countTo();
        });
    }
}

// 13 stickyHeader
function stickyHeader() {
    if ($('.stricky').length) {
        var strickyScrollPos = 100;
        if ($(window).scrollTop() > strickyScrollPos) {
            $('.stricky').removeClass('fadeIn animated');
            $('.stricky').addClass('stricky-fixed fadeInDown animated');
        } else if ($(this).scrollTop() <= strickyScrollPos) {
            $('.stricky').removeClass('stricky-fixed fadeInDown animated');
            $('.stricky').addClass('slideIn animated');
        }
    }
    ;
}

// 14 contactFormValidation
function contactFormValidation() {

    if ($('.contact-form').length) {
        $('.contact-form').each(function () {

            var cfName = $(this).attr('id');

            $('#' + cfName).validate({// initialize the plugin
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    message: {
                        required: true
                    },
                    date: {
                        required: true
                    },
                    category: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    dateOfBirth: {
                        required: true
                    },
                    subject: {
                        required: true
                    }
                },
                submitHandler: function (form) {
                    // sending value with ajax request
                    $.post($(form).attr('action'), $(form).serialize(), function (response) {
                        $(form).parent('div').append(response);
                        $(form).find('input[type="text"]').val('');
                        $(form).find('input[type="email"]').val('');
                        $(form).find('textarea').val('');
                    });
                    return false;
                }
            });
        });
    }
}

// 15 event slider
function bxgeventCarousel() {
    $('.bx-event-carousel').bxSlider({
        auto: false,
        speed: 300,
        mode: 'vertical',
        minSlides: 3,
        slideMargin: 20,
        pager: false,
        prevText: '<i class="fa fa-angle-left"></i>',
        nextText: '<i class="fa fa-angle-right"></i>'
    });
}

// 16 Common CssJs
$('[data-bg-color]').each(function () {
    $(this).css("cssText", "background: " + $(this).data("bg-color") + " !important;");
});
$('[data-bg-img]').each(function () {
    $(this).css('background-image', 'url(' + $(this).data("bg-img") + ')');
});
$('[data-text-color]').each(function () {
    $(this).css('color', $(this).data("text-color"));
});
$('[data-font-size]').each(function () {
    $(this).css('font-size', $(this).data("font-size"));
});
$('[data-height]').each(function () {
    $(this).css('height', $(this).data("height"));
});
$('[data-border]').each(function () {
    $(this).css('border', $(this).data("border"));
});
$('[data-margin-top]').each(function () {
    $(this).css('margin-top', $(this).data("margin-top"));
});
$('[data-margin-left]').each(function () {
    $(this).css('margin-left', $(this).data("margin-left"));
});
$('[data-margin-bottom]').each(function () {
    $(this).css('margin-bottom', $(this).data("margin-bottom"));
});

// 17 selectInput
function selectInput() {
    if ($('.select-input').length) {
        $('.select-input').selectmenu();
    }
    ;
}

// 18 datePicker
function datePicker() {
    if ($('.date-picker').length) {
        $('.date-picker').datepicker();
    }
    ;
}

// 19 gMap
function gMap() {
    if ($('.google-map').length) {
        $('.google-map').each(function () {
            // getting options from html 
            var mapName = $(this).attr('id');
            var mapLat = $(this).data('map-lat');
            var mapLng = $(this).data('map-lng');
            var iconPath = $(this).data('icon-path');
            var mapZoom = $(this).data('map-zoom');
            var mapTitle = $(this).data('map-title');

            // if zoom not defined the zoom value will be 15;
            if (!mapZoom) {
                var mapZoom = 15;
            }
            ;
            // init map
            var map;
            map = new GMaps({
                div: '#' + mapName,
                scrollwheel: false,
                lat: mapLat,
                lng: mapLng,
                zoom: mapZoom
            });
            // if icon path setted then show marker
            if (iconPath) {
                map.addMarker({
                    icon: iconPath,
                    lat: mapLat,
                    lng: mapLng,
                    title: mapTitle
                });
            }
        });
    }
    ;
}

// 20 mobileMenu
function mobileMenu() {
    if ($('.nav-footer button').length) {
        $('.nav-footer button').on('click', function () {
            $('.navigation .nav-header').slideToggle();
            $('.navigation .nav-header').find('.dropdown').children('a').append(function () {
                return '<button><i class="fa fa-bars"></i></button>';
            });
            $('.navigation .nav-header .dropdown a button').on('click', function () {
                $(this).parent().parent().children('ul.submenu').slideToggle();
                return false;
            });
        });
    }
}

function notifier() {
    console.log('Notifier start');
    
    $('*[data-notifier]').each(function (index) {
        
        if($(this).attr('data-notifier') === 'message') {
            $.growl({
                title: $(this).find('[data-notifier-title]').text(),
                message: $(this).find('[data-notifier-text]').html()
            });
        }
        if($(this).attr('data-notifier') === 'info') {
            $.growl.notice({
                message: $(this).find('[data-notifier-text]').html()
            });
        }
        if($(this).attr('data-notifier') === 'warning') {
            $.growl.warning({
                message: $(this).find('[data-notifier-text]').html()
            });
        }
        if($(this).attr('data-notifier') === 'error') {
            $.growl.error({
                message: $(this).find('[data-notifier-text]').html()
            });
        }
        
        console.log('Notifier #' + index, notifier);
    });

}
// Scroll to top
if ($('.scroll-to-top').length) {
    $(".scroll-to-top").on('click', function () {
        // animate
        $('html, body').animate({
            scrollTop: $('html, body').offset().top
        }, 1000);

    });
}

// Dom Ready Function
jQuery(document).on('ready', function () {
    (function ($) {
        // add your functions
        revolutionSliderActiver();
        galleryMasonaryLayout();
        accrodion();
        expertizeRoundCircle();
        progressBarConfig();
        teamCarosule();
        testiCarosule();
        clientsCarosule();
        CounterNumberChanger();
        contactFormValidation();
        bxgeventCarousel();
        selectInput();
        datePicker();
        gMap();
        mobileMenu();
        notifier();
    })(jQuery);
});

// window on load functino
jQuery(window).on('load', function () {
    (function ($) {
        // add your functions	
    })(jQuery);
});

// window on scroll functino
jQuery(window).on('scroll', function () {
    (function ($) {
        // add your functions
        stickyHeader();
    })(jQuery);
});
