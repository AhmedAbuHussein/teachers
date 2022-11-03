new WOW().init();
wow = new WOW({
    boxClass: 'wow', // default
    animateClass: 'animated', // default
    offset: 0, // default
    mobile: true, // default
    live: true // default
})
wow.init();


// All Sliader
$(document).ready(function() {
    "use strict";

    /// Top Slider
    $(".home-slider").owlCarousel({
        nav: false,
        loop: true,
        navText: ["<i class='la la-angle-up'></i>", "<i class='la la-angle-down'></i>"],
        dots: false,
        autoplay: false,
        autoplayTimeout: 4000,
        items: 1,
        // animateOut: 'animate__fadeIn',
        // animateIn: 'animate__fadeIn',
        autoplayHoverPause: true,
        responsiveClass: true
    });


    // Best Slider 
    $(".best-slider").owlCarousel({
        nav: false,
        loop: true,
        navText: ["<i class='la la-angle-double-left'></i>", "<i class='la la-angle-double-right'></i>"],
        dots: false,
        dotsData: false,
        autoplay: 4000,
        items: 1,
        autoplayHoverPause: true,
        center: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            767: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

    // Clients Slider 
    $(".clients-slider").owlCarousel({
        nav: false,
        loop: false,
        navText: ["<i class='la la-angle-double-left'></i>", "<i class='la la-angle-double-right'></i>"],
        dots: true,
        dotsData: false,
        autoplay: 4000,
        items: 1,
        autoplayHoverPause: true,
        center: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                dots: false,
            },
            480: {
                items: 3,
                dots: false,
            },
            767: {
                items: 3,
                dots: false,
            },
            1000: {
                items: 6
            }
        }
    });

    // Test Slider 
    $(".test-slider").owlCarousel({
        nav: true,
        loop: false,
        navText: ["<i class='la la-angle-left'></i>", "<i class='la la-angle-right'></i>"],
        dots: false,
        dotsData: false,
        autoplay: 4000,
        items: 1,
        autoplayHoverPause: true,
        center: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            1000: {
                items: 3
            }
        }
    });

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        dots: false,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        vertical: true,
        asNavFor: '.slider-for',
        dots: false,
        focusOnSelect: true,
        verticalSwiping: true,
        responsive: [{
                breakpoint: 992,
                settings: {
                    vertical: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    vertical: false,
                }
            },
            {
                breakpoint: 580,
                settings: {
                    vertical: false,
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 380,
                settings: {
                    vertical: false,
                    slidesToShow: 3,
                }
            }
        ]
    });


    //Nav
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 50) {
            $(".sticky").addClass("active");
        } else {
            $(".sticky").removeClass("active");
        }
    });

    // Mobile Menu
    if ($('.mobile-menu').length) {

        $('.mobile-menu .menu-box');

        var mobileMenuContent = $('.main-header .nav-outer .main-menu').html();
        $('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);
        $('.sticky-header .main-menu').append(mobileMenuContent);

        //Menu Toggle Btn
        $('.mobile-nav-toggler').on('click', function() {
            $('body').addClass('mobile-menu-visible');
        });

        //Menu Toggle Btn
        $('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function() {
            $('body').removeClass('mobile-menu-visible');
        });
        $('.mobile-menu .navigation li a').on('click', function() {
            $('body').removeClass('mobile-menu-visible');
        });
        $('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function() {
            $('body').removeClass('mobile-menu-visible');
        });

    }

    (function($) {

        // Reverse
        // =============================================
        $.fn.reverse = [].reverse;

        // jQuery Extended Family Selectors
        // =============================================
        $.fn.cousins = function(filter) {
            return $(this).parent().siblings().children(filter);
        };

        $.fn.piblings = function(filter) {
            return $(this).parent().siblings(filter);
        };

        $.fn.niblings = function(filter) {
            return $(this).siblings().children(filter);
        };

        // Update
        // =============================================
        $.fn.update = function() {
            return $(this);
        };

        // Dropdown
        // =============================================
        $.fn.dropdown = function(options) {

            // Store object
            var $this = $(this);

            // Settings
            var settings = $.extend({
                className: 'toggled',
            }, options);

            // Simplify variable names
            var className = settings.className;

            // List selectors
            var $ul = $this.find('ul'),
                $li = $this.find('li'),
                $a = $this.find('a');

            // Menu selectors
            var $drawers = $a.next($ul), // All unordered lists after anchors are drawers
                $buttons = $drawers.prev($a), // All anchors previous to drawers are buttons
                $links = $a.not($buttons); // All anchors that are not buttons are links

            // Toggle menu on-click
            $buttons.on('click', function() {
                var $button = $(this),
                    $drawer = $button.next($drawers),
                    $piblingDrawers = $button.piblings($drawers);

                // Toggle button and drawer
                $button.toggleClass(className);
                $drawer.toggleClass(className).css('height', '');

                // Reset children
                $drawer.find($buttons).removeClass(className);
                $drawer.find($drawers).removeClass(className).css('height', '');

                // Reset cousins
                $piblingDrawers.find($buttons).removeClass(className);
                $piblingDrawers.find($drawers).removeClass(className).css('height', '');

                // Animate height auto
                $drawers.update().reverse().each(function() {
                    var $drawer = $(this);
                    if ($drawer.hasClass(className)) {
                        var $clone = $drawer.clone().css('display', 'none').appendTo($drawer.parent()),
                            height = $clone.css('height', 'auto').height() + 'px';
                        $clone.remove();
                        $drawer.css('height', '').css('height', height);
                    } else {
                        $drawer.css('height', '');
                    }
                });
            });

            // Close menu
            function closeMenu() {
                $buttons.removeClass(className);
                $drawers.removeClass(className).css('height', '');
            }

            // Close menu after link is clicked
            $links.click(function() {
                closeMenu();
            });

            // Close menu when off-click and focus-in
            $(document).on('click focusin', function(event) {
                if (!$(event.target).closest($buttons.parent()).length) {
                    closeMenu();
                }
            });
        };
    })(jQuery);

    $('.mobile-menu').dropdown();

    // FancyBox
    $('[data-fancybox="gallaryPhoto"]').fancybox();
    $('[data-fancybox="gallaryVideo"]').fancybox();
    $('[data-fancybox]').fancybox();
    /* --------------------------------------------
         Select
        --------------------------------------------- */
    $('select').niceSelect();


    $(".datepicker").datepicker();

    $(function() {
        $('.tab-heading .list-block').click(function() {
            $(".all-serv").addClass('list');
        });
        $('.tab-heading .grid-block').click(function() {
            $(".all-serv").removeClass('list');
        });

    });

    $(document).ready(function() {
        $('.option-serv a').on('click', function() {
            $(this).addClass('active');
            $(this).closest('.tab-heading').find('a').not(this).removeClass('active');
        });
    });


    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

});

$(document).ready(function() {
    $('.radioshow').on('change', function() {
        var val = $(this).attr('data-class');
        $('.allshow').hide();
        $('.' + val).show();
    });
});

// File
'use strict';
(function(document, window, index) {
    var inputs = document.querySelectorAll('.inputfile');
    Array.prototype.forEach.call(inputs, function(input) {
        var label = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener('change', function(e) {
            var fileName = '';
            if (this.files && this.files.length > 1)
                fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
            else
                fileName = e.target.value.split('\\').pop();

            if (fileName)
                label.querySelector('span').innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });

        // Firefox bug fix
        input.addEventListener('focus', function() { input.classList.add('has-focus'); });
        input.addEventListener('blur', function() { input.classList.remove('has-focus'); });
    });
}(document, window, 0));

var loadFile = function(event) {
    var image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
};

try{
    var minus = document.querySelector(".minus");
    var plus = document.querySelector(".plus");
    var input = document.querySelector(".input");

    var quantity = 1;

    input.value = quantity;

    minus.addEventListener('click', function(event) {
        if (quantity > 1) {
            quantity--;
            input.value = quantity;
        }
    });

    plus.addEventListener('click', function(event) {
        quantity++;
        input.value = quantity;
    });
}catch(err){}