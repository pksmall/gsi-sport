(function() {

    var percent = 0,
        bar = $('.transition-timer-carousel-progress-bar'),
        crsl = $('#carousel-front');
    var control = $('a.carousel-control');

    function progressBarCarousel() {
        bar.css({ height: percent + '%' });
        percent = percent + 0.25;
        if (percent > 100) {
            percent = 0;
            crsl.carousel('next');
        }
    }
    crsl.carousel({
        interval: false,
        pause: false
    }).on('slid.bs.carousel', function() {});
    var barInterval = setInterval(progressBarCarousel, 30);
    control.hover(
        /**/
        function() {
            clearInterval(barInterval);
        },
        /**/
        function() {
            barInterval = setInterval(progressBarCarousel, 30);
        });
    control.on('click', function() {
        percent = 0;
    });
})();

(function() {
    $('#carousel-product-card').carousel({
        interval: false
    });
})();
/**/




//Карусель Technology текстовая



(function() {

    var $technologyMiddleSlider = $('#technology-middle-slider');
    $technologyMiddleSlider.carousel({
        interval: false
    });


    var $carouselFirstItem = $('div.first-item', '.technology-middle-slider');
    var $carouselLastItem = $('div.last-item', '.technology-middle-slider');
    var $carouselBeforeLink = $('a.carousel-control-prev', '.technology-middle-slider');
    var $carouselNextLink = $('a.carousel-control-next', '.technology-middle-slider');

    //Устанавливаем начальные заначения ссылок
    /**/
    $carouselBeforeLink.html(function() {
        return $carouselLastItem.data('name');
    });

    $carouselNextLink.html(function() {
        return $carouselFirstItem.next().data('name');
    });

    //Устанавливаем заначения ссылок динамически

    $technologyMiddleSlider.on('slid.bs.carousel', function() {
        var $carouselActiveItem = $('div.active', '.technology-middle-slider');

        if ($carouselActiveItem.prev().data('name') !== undefined) {
            $carouselBeforeLink.html(function() {
                return $carouselActiveItem.prev().data('name');
            });
        } else {
            $carouselBeforeLink.html(function() {
                return $carouselLastItem.data('name');
            });
        }

        if ($carouselActiveItem.next().data('name') !== undefined) {
            $carouselNextLink.html(function() {
                return $carouselActiveItem.next().data('name');
            });
        } else {
            $carouselNextLink.html(function() {
                return $carouselFirstItem.data('name');
            });
        }

    });
})();

// cкрол то топ
(function() {
    // This will select everything with the class smoothScroll
    // This should prevent problems with carousel, scrollspy, etc...
    $('.smooth-scroll').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 800); // The number here represents the speed of the scroll in milliseconds
                return false;
            }
        }
    });
})();

// видимость иконки UP
(function() {
    var partWindowHeight = ($(window).height() / 2);
    var scrollToTopLink = $('a.scroll-to-top', 'footer');
    $(window).scroll(function() {
        if ($(window).scrollTop() > partWindowHeight) {
            if (!scrollToTopLink.hasClass('show-up')) {
                scrollToTopLink.addClass('show-up');
                scrollToTopLink.fadeIn('slow');
            }
        }
        if ($(window).scrollTop() < partWindowHeight) {
            if (scrollToTopLink.hasClass('show-up')) {
                scrollToTopLink.removeClass('show-up');
                scrollToTopLink.fadeOut('slow');
            }
        }
    });
})();
// Change the speed to whatever you want
// Personally i think 1000 is too much
// Try 800 or below, it seems not too much but it will make a difference
// 
// 
// 


// right side nav
(function() {
    var $rightNav = $('.right-nav');

    var $rightNavModalScreen = $('.right-nav-modal-screen');

    $('.close-right-nav').on("click", function() {
        $rightNav.toggleClass('show-right-nav');
        $rightNavModalScreen.toggleClass('show-right-nav-modal-screen');

    });
    /**/
    $(document).mouseup(function(e) {
        var container = $('div.show-right-nav');
        if (($(e.target).hasClass('right-nav-btn') && (!$rightNav.hasClass('show-right-nav'))) || (container.has(e.target).length === 0) && ($rightNav.hasClass('show-right-nav'))) {

            $rightNav.toggleClass('show-right-nav');
            $rightNavModalScreen.toggleClass('show-right-nav-modal-screen');
        }
    });
    $('button.right-nav-btn').hover(function() {
        if (!$rightNav.hasClass('show-right-nav')) {
            $rightNav.toggleClass('show-right-nav');
            $rightNavModalScreen.toggleClass('show-right-nav-modal-screen');
        }
    });
})();

// кликабельность аккардеона
(function() {
    $('a.accordion-parent-link').on('click', function() {
        console.log($(this));
        if (!$(this).hasClass('collapsed')) {
            console.log($(this));
            $(this).removeAttr('data-toggle');
        }

    });
})();

//category nav


/*(function(){
    $(".dropdown").hover(
        function() { $('.dropdown-menu', this).fadeIn("fast");
        },
        function() { $('.dropdown-menu', this).fadeOut("fast");
    });
})();

*/


(function(){
  $(".dropdown").hover(

      function() {
        var $thisDrop = $('.dropdown-menu', this)
        $('.dropdown-menu', this).fadeIn("fast");

        var $freeH = $( window ).height() - $( 'header' ).height() / 2;

        var $dh = $thisDrop.height();

        if($dh >$freeH){
          $thisDrop.height($freeH);
          $thisDrop.css("overflow-y", 'auto');
        }
      },
      function() { $('.dropdown-menu', this).fadeOut("fast");
      });
})();


// forms-custom

(function($) {
    $(function() {

        $('select.custom-style').styler({
            //selectPlaceholder: 'Цвет'
        });


    });
})(jQuery);


(function() {
  $('#language').on('change', function (e) {
      e.preventDefault();
      console.log($(this).val());
      window.location.href = $(this).val();
    //$('#locale-switch').submit();
  });
})();




