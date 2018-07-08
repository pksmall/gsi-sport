jQuery(document).ready(function($) {
  var $wr_elm = $('#camo-wrap');
  var $gt_elm = $('#camo-gallery-thumbnails');
  var $pi_elm = $('#camo-product-image');
  var $ua_elm = $('.camo-up-arrow');
  var $da_elm = $('.camo-down-arrow');
  var mi = 3;
  var plugin_url = 'https://camo-tec.com/';
  var plugin_images_url = plugin_url + 'assets/images/';
  var mode = 1;
  var nf = 0;
  var lastX;
  var lastY;

  var ex = $wr_elm.length ? true : false;
  var ph = [
    '',
    '<div class="camopl-rotating-plane"><\/div>',
    '<div class="camopl-double-bounce"><div class="camopl-child camopl-double-bounce1"><\/div><div class="camopl-child camopl-double-bounce2"><\/div><\/div>',
    '<div class="camopl-wave"><div class="camopl-rect camopl-rect1"><\/div><div class="camopl-rect camopl-rect2"><\/div><div class="camopl-rect camopl-rect3"><\/div><div class="camopl-rect camopl-rect4"><\/div><div class="camopl-rect camopl-rect5"><\/div><\/div>',
    '<div class="camopl-wandering-cubes"><div class="camopl-cube camopl-cube1"><\/div><div class="camopl-cube camopl-cube2"><\/div><\/div>',
    '<div class="camopl-spinner camopl-spinner-pulse"><\/div>',
    '<div class="camopl-chasing-dots"><div class="camopl-child camopl-dot1"><\/div><div class="camopl-child camopl-dot2"><\/div><\/div>',
    '<div class="camopl-three-bounce"><div class="camopl-child camopl-bounce1"><\/div><div class="camopl-child camopl-bounce2"><\/div><div class="camopl-child camopl-bounce3"><\/div><\/div>',
    '<div class="camopl-circle"><div class="camopl-circle1 camopl-child"><\/div><div class="camopl-circle2 camopl-child"><\/div><div class="camopl-circle3 camopl-child"><\/div><div class="camopl-circle4 camopl-child"><\/div><div class="camopl-circle5 camopl-child"><\/div><div class="camopl-circle6 camopl-child"><\/div><div class="camopl-circle7 camopl-child"><\/div><div class="camopl-circle8 camopl-child"><\/div><div class="camopl-circle9 camopl-child"><\/div><div class="camopl-circle10 camopl-child"><\/div><div class="camopl-circle11 camopl-child"><\/div><div class="camopl-circle12 camopl-child"><\/div><\/div>',
    '<div class="camopl-cube-grid"><div class="camopl-cube camopl-cube1"><\/div><div class="camopl-cube camopl-cube2"><\/div><div class="camopl-cube camopl-cube3"><\/div><div class="camopl-cube camopl-cube4"><\/div><div class="camopl-cube camopl-cube5"><\/div><div class="camopl-cube camopl-cube6"><\/div><div class="camopl-cube camopl-cube7"><\/div><div class="camopl-cube camopl-cube8"><\/div><div class="camopl-cube camopl-cube9"><\/div><\/div>',
    '<div class="camopl-fading-circle"><div class="camopl-circle1 camopl-circle"><\/div><div class="camopl-circle2 camopl-circle"><\/div><div class="camopl-circle3 camopl-circle"><\/div><div class="camopl-circle4 camopl-circle"><\/div><div class="camopl-circle5 camopl-circle"><\/div><div class="camopl-circle6 camopl-circle"><\/div><div class="camopl-circle7 camopl-circle"><\/div><div class="camopl-circle8 camopl-circle"><\/div><div class="camopl-circle9 camopl-circle"><\/div><div class="camopl-circle10 camopl-circle"><\/div><div class="camopl-circle11 camopl-circle"><\/div><div class="camopl-circle12 camopl-circle"><\/div><\/div>',
    '<div class="camopl-folding-cube"><div class="camopl-cube1 camopl-cube"><\/div><div class="camopl-cube2 camopl-cube"><\/div><div class="camopl-cube4 camopl-cube"><\/div><div class="camopl-cube3 camopl-cube"><\/div><\/div>',
  ];



  /**/
  (function() {
    if(ex == false) {
      return;
    }

    var i = $gt_elm.find('img');
    var s = i.size();

    if(s > 0) {
      i.slice(nf, nf + mi).show();
    }

    if(s > mi) {
      $ua_elm.fadeIn();
      $da_elm.fadeIn();
    }
  })();

  /**/
  $gt_elm.on('click', 'img', function() {
    var i = $(this).data('img');
    var s = $(this).data('src');
    var index = $(this).data('index');

    $pi_elm.fadeTo(200, 0.3, function() {
      $pi_elm.attr('src', i);
      $pi_elm.one('load', function() {
        $pi_elm.attr('data-img', s);
        $pi_elm.attr('data-index', index);
        $pi_elm.fadeTo(200, 1);
      });
    });

    $gt_elm.find('img').removeClass('active');
    $(this).addClass('active');
  });

  /**/
  $(document).on('click', '.camo-up-arrow', function() {
    var t = $(this).parent().find('img');
    var s = t.size();

    if( nf > 0 ) {
      nf--;
      t.hide().slice(nf, nf + mi).show();
    }
  });

  /**/
  $(document).on('click', '.camo-down-arrow', function() {
    var t = $(this).parent().find('img');
    var s = t.size();

    if( ( nf + mi ) < s ) {
      nf++;
      t.hide().slice(nf, nf + mi).show();
    }
  });

  /**/
  $(document).on('click', '#camo-product-image', function() {
    var i = $(this).attr('data-img');
    var index = $(this).attr('data-index');

    var h = $gt_elm.html();

    if( mode == 1 ) {



      if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        //$('.pinch-modal').fadeIn(300);

        // $('body').append('<div class="zzz" style="position: absolute; top: 0; left: 0; width: 100%; z-index: 99999; background-color: rgba(21, 21, 21, 1); overflow-x: hidden;"><div id="camo-lightbox" class="camo-mode1 zoom" style="background-color: rgba(21, 21, 21, 1); width: 100%; position: relative !important;"></div></div>');
        // $('.zzz').append('<div class="mob-hide" style="position:absolute; text-align: center; top:0; left:0; width: 100%; background-color: rgba(21, 21, 21, 1); color: #fff; z-index: 99999; font-size: 1.5rem; padding-top: 5px;">' + $('.product-card-content h2').text() + '</div>');
        // $('.zzz').append('<div id="close-camo-slider" style="position: absolute !important;\n' +
        //     '    background: url(../images/cross.svg) !important;\n' +
        //     '    background-size: cover !important;\n' +
        //     '    top: ' + $('.mob-hide').outerHeight() + 'px !important;\n' +
        //     '    right: 35px !important;\n' +
        //     '    z-index: 99999 !important;\n' +
        //     '    height: 45px !important;\n' +
        //     '    width: 45px !important; display: block;"></div>');
        //$('.pinch-zoom-container').append('<img src="' + i + '" class="camo-lightbox-image mbt" style="width: 100% !important; margin-left: 0 !important; left: 0 !important;">');
      } else {
        $('body').css('overflow', 'hidden');
        $('body').append('<div class="zzz"><div id="camo-lightbox" class="camo-mode1 zoom" style="width: 70%; margin-right: 30%;"></div></div>');
        $('#camo-lightbox').append('<div class="mob-hide" style="position:fixed; text-align: center; top:0; left:0; width: 100%; background-color: rgba(21, 21, 21, 1); color: #fff; z-index: 99999; font-size: 1.5rem; padding-top: 5px;">' + $('.product-card-content h2').text() + '</div>');
        $('#camo-lightbox').append('<div id="close-camo-slider" style="position: fixed !important;\n' +
            '    background: url(../images/cross.svg) !important;\n' +
            '    background-size: cover !important;\n' +
            '    top: 45px !important;\n' +
            '    right: 35px !important;\n' +
            '    z-index: 99999 !important;\n' +
            '    height: 35px !important;\n' +
            '    width: 35px !important; display: block;"></div>');
        $('#camo-lightbox').append('<img src="' + i + '" class="camo-lightbox-image mbt">');
        $('#camo-lightbox').append('<div class="camo-preloader"><ul class="camo-preloader-flex-container"><li>' + ph[7] + '<\/li><\/ul><\/div>');

      }




      if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        //$('.zzz').append('<figcaption id="camo-lightbox-thumbnails" style="top:65% !important;">' + h + '</figcaption>');
       ///////////// $('.zzz').append('<div class="zzz-images">' + h + '</div>');
        //$('.zoom').zoom({'magnify' : 1.5});
      } else {
        $('#camo-lightbox').append('<figcaption id="camo-lightbox-thumbnails">' + h + '</figcaption>');
      }

    } else if( mode == 2 ) {
      $('body').append('<div id="camo-lightbox" class="camo-mode2"></div>');

      $('#camo-lightbox').append('<div id="camo-image-gallery">');
      $('#camo-lightbox #camo-image-gallery').append('<div class="camo-gallery-image-container"></div>');
      $('#camo-lightbox #camo-image-gallery').append('<img src="' + plugin_images_url + 'left.svg" class="camo-gallery-prev"/>');
      $('#camo-lightbox #camo-image-gallery').append('<img src="' + plugin_images_url + 'right.svg"  class="camo-gallery-next"/>');
      $('#camo-lightbox #camo-image-gallery').append('<div class="camo-gallery-footer-info"><span class="current"></span>/<span class="camo-image-gallery-total"></span></div>');

      var images = [];
      $("#camo-gallery-thumbnails img").each(function() {
        images.push({
          small: $(this).attr('src'),
          big:  $(this).data('src')
        });
      });

      var curImageIdx = index, total = images.length;
      var wrapper = $('#camo-image-gallery'), curSpan = wrapper.find('.current');
      var viewer = ImageViewer(wrapper.find('.camo-gallery-image-container'));

      wrapper.find('.camo-image-gallery-total').html(total);

      function camo_showImage() {
        var imgObj = images[curImageIdx - 1];
        viewer.load(imgObj.small, imgObj.big);
        curSpan.html(curImageIdx);
      }

      wrapper.find('.camo-gallery-next').click(function() {
        curImageIdx++;
        if(curImageIdx > total) curImageIdx = 1;
        camo_showImage();
      });

      wrapper.find('.camo-gallery-prev').click(function(){
        curImageIdx--;
        if(curImageIdx < 0) curImageIdx = total;
        camo_showImage();
      });

      camo_showImage();
      $('#camo-lightbox').append('<div class="camo-close-container"><div class="camo-close"><\/div><\/div>');
    }

    $('body').css('overflow', 'hidden');

    $('.camo-lightbox-image').fadeOut(500, function () {
      $('.camo-lightbox-image').attr('src', i).one('load', function() {
        $('.camo-preloader').fadeOut(100);
        $('.camo-lightbox-image').fadeIn(500);
      });
    });
  });

  // $(document).on('click', '#close-camo-slider', function() {
  //   if( mode == 1 ) {
  //     if(!$(event.target).closest('#camo-lightbox-thumbnails').length) {
  //       $(this).remove();
  //       $('body').css('overflow', 'auto');
  //     }
  //   }
  // });

  /**/
  $(document).on('click', '#camo-lightbox-thumbnails img', function() {
    var s = $(this).data('src');

    if(!$(this).hasClass('active')) {

      if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

        $('.zoomImg').remove();

      }
      $('.camo-preloader').fadeIn(100);

      $('.camo-lightbox-image').fadeOut(500, function () {
        $('.camo-lightbox-image').attr('src', s).one('load', function () {

          if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

            $('.camo-lightbox-image').append('<img class="zoomImg" src=' + s + '">');
            $('.zoom').zoom({'magnify': 1.5});

          }

          $('.camo-preloader').fadeOut(100);
          $('.camo-lightbox-image').fadeIn(500);
        });
      });

      $('#camo-lightbox-thumbnails').find('img').removeClass('active');
      $(this).addClass('active');
    }
  });


  $(document).on('click', '#close-camo-slider', function(event) {
    $('#camo-lightbox').remove();
    $('body').css('overflow', 'auto');
    $('.mob-hide').fadeOut(50);
    $('#close-camo-slider').fadeOut(50);
    $('#camo-lightbox-thumbnails').fadeOut(50);
  });

  $(document).on('touchstart', '#close-camo-slider', function(event) {

    $('#close-camo-slider').fadeOut(50);
    $('#camo-lightbox-thumbnails').fadeOut(50);
    $('.zoom').trigger('zoom.destroy');
    $('.camo-lightbox-image').fadeOut(50);
    $('.camo-preloader').fadeOut(50);
    $('.mob-hide').fadeOut(50);
    $('#camo-lightbox').remove();
    $('body').css('overflow', 'auto');
    $('.zzz').remove();
  });

  /**/
  // $(document).on('click', '.camo-close', function(event) {
  //   $('#camo-lightbox').remove();
  //   $('body').css('overflow', 'auto');
  // });

  // $(document).on("click", ".camo-lightbox-image", function() {
  //   if($(this).hasClass('mbt') ){
  //     $('.zoom').zoom({'magnify' : 2, onZoomOut: function () {
  //         setTimeout(function () {
  //           $('.zoom').trigger('zoom.destroy');
  //         }, 300);
  //     }});
  //   }
  // });

  // $(document).on("touchend", ".camo-lightbox-image", function() {
  //   //alert(123);
  //   $('.zoom').trigger('zoom.destroy');
  // });
  //
  // $(document).on("touchend", "img[role='presentation']", function() {
  //   //alert(123);
  //   $('.zoom').trigger('zoom.destroy');
  // });


  /**/
  $(document).on('mousemove', '#camo-lightbox.camo-mode1', function(event) {
    var offset = $(this).offset();
    var xPos = event.pageX - offset.left;
    var yPos = event.pageY - offset.top;

    var mouseXPercent = Math.round(xPos / $(this).width() * 100);
    var mouseYPercent = Math.round(yPos / $(this).height() * 100);

    $(this).children('img').each(
        function() {
          var diffX = $('#camo-lightbox').width() - $(this).width();
          var diffY = $('#camo-lightbox').height() - $(this).height();

          var myX = diffX * (mouseXPercent / 75);
          var myY = diffY * (mouseYPercent / 75);

          //$(this).animate({left: myX, top: myY},{duration: 50, queue: false, easing: 'linear'});
          $(this).animate({top: myY},{duration: 50, queue: false, easing: 'linear'});
        }
    );
  });

  // $(document).on('touchmove', '#camo-lightbox.camo-mode1 img', function(event) {
  //   alert('TOUCH1');
  // });

  // $(document).on("touchmove", "#camo-lightbox.camo-mode1 img", function() {
  //   $('.zoom').zoom();
  // });

  /**/
  $(document).on('keydown', function(event) {
    if(event.keyCode == 27) {
      $('#camo-lightbox').remove();
      $('body').css('overflow', 'auto');
    }
  });

  /**/
  // $(document).on("touchstart", "#camo-lightbox.camo-mode1", function() {
  //   lastX = undefined;
  //   lastY = undefined;
  // });

  /**/
  // $(document).on("touchmove", "#camo-lightbox.camo-mode1", function(jQueryEvent) {
  //   // var event = window.event;
  //   // var currentX = event.touches[0].clientX;
  //   // var currentY = event.touches[0].clientY;
  //   // var top = $('.camo-lightbox-image').css('top')
  //   // var left = $('.camo-lightbox-image').css('left')
  //   //
  //   // if(currentX > lastX) {
  //   //   var toleft = parseInt(left) - (lastX - currentX);
  //   //   if (toleft <= 0) {
  //   //     $('.camo-lightbox-image').css('left', toleft);
  //   //   }
  //   // } else if(currentX < lastX) {
  //   //   var toleft = parseInt(left) - (lastX - currentX);
  //   //   if(parseInt(left) - $(window).width() + $('.camo-lightbox-image').width() > 0) {
  //   //     $('.camo-lightbox-image').css('left', toleft);
  //   //   }
  //   // }
  //   //
  //   // if(currentY > lastY) {
  //   //   var totop = parseInt(top) - (lastY - currentY);
  //   //   if (totop <= 0) {
  //   //     $('.camo-lightbox-image').css('top', totop);
  //   //   }
  //   // } else if(currentY < lastY) {
  //   //   var totop = parseInt(top) - (lastY - currentY);
  //   //   if (parseInt(top) - $(window).height() + $('.camo-lightbox-image').height() > 0) {
  //   //     $('.camo-lightbox-image').css('top', totop);
  //   //   }
  //   // }
  //   //
  //   // lastX = currentX;
  //   // lastY = currentY;
  // });
});
