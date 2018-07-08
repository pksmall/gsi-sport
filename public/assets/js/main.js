$(document).ready(function() {

  var defaultOptions = {
    vertical: true,
    arrows: false,
    dots: true,
    draggable: false,
    speed: 0
  };

  var newsTitles = ['акционный розыгрыш', 'антидемпинговой политики', 'международный кубок', '1-й открытый кубок'];

  var aboutTitles = ['О Нас', 'Условия сотрудничества', 'Доставка и оплата'];

  $('#main-carousel').slick({
    ...defaultOptions,
    responsive: [{
      breakpoint: 1112,
      settings: {
        vertical: false,
      }
    }]
  });

  $('#conditions-carousel').slick({
    ...defaultOptions,
    initialSlide: 1,
    customPaging: function(slider, i) {
      return '<button class="tab">' + aboutTitles[i] + '</button>';
    }
  });

  $('#product-card-carousel').slick({
    ...defaultOptions,
    slidesToShow: 1,
    customPaging: function(slider, i) {
      return '<div class="img-wrap"><img src="'+$(slider.$slides[i]).find('.product-image img').attr('src')+'"></div>';
    }
  });

  $('.custom-scroll').mCustomScrollbar({
    autoDraggerLength: false
  });

  $('.tab-content:first-child').addClass('active');

  $('.tab > li').on('click', function() {
    var $this = $(this);
    $('.sub-tab > li').removeClass('active');
    $('.sub-tab-content').removeClass('active');
    $this.addClass('active').siblings().removeClass('active')
        .closest('.page-wrap').find('.tab-content').removeClass('active').eq($(this).index()).addClass('active');
  });

  $('.sub-tab > li').on('click', function() {
    var $this = $(this);
    $('.tab-content').removeClass('active');
    $this.addClass('active').siblings().removeClass('active')
        .closest('.page-wrap').find('.sub-tab-content').removeClass('active').eq($(this).index()).addClass('active');
  });

  $('.history-page .mCSB_scrollTools .mCSB_draggerRail').css('background-color', 'transparent');

});


$(".trigger").click(function(){
  $(".sidebar").toggleClass("active");
});
 $(document).mouseup(function (e){ 
        var div = $('.sidebar'); 
        if (!div.is(e.target) 
            && div.has(e.target).length === 0) { 
             $(".sidebar").removeClass("active")
        }
    });
$(".trigger-top").click(function(){
  $(".sidebar").removeClass("active");
});
	
var perem = 1;	
$(".bmob-menu").click(function(){
if(perem == 1){
$(".tab-mob").addClass("active");
perem = 0;
}else{
$(".tab-mob").removeClass("active");
perem = 1;
}
});

 $(document).mouseup(function (e){ 
        var div = $('.tab-mob'); 
        if (!div.is(e.target) 
            && div.has(e.target).length === 0) { 
             $(".tab-mob").removeClass("active")
        }
    });	
	

	
	
	