var sliderLength = $(".n-slider-img").length;
$(".n-slide-to").text("0" + sliderLength);

$(".new-slider-right").on("click", function() {
	var activeSlider = $(".n-active").index();
	var nextSlide = activeSlider + 1;
	if (sliderLength <= nextSlide) {
		$(".n-slider-img").eq(activeSlider).hide();
		$(".n-slider-img").eq(0).show();
		$(".n-slider-img").eq(activeSlider).removeClass("n-active");
		$(".n-slider-img").eq(0).addClass("n-active");
	}else {
		$(".n-slider-img").eq(activeSlider).hide();
		$(".n-slider-img").eq(nextSlide).show();
		$(".n-slider-img").eq(activeSlider).removeClass("n-active");
		$(".n-slider-img").eq(nextSlide).addClass("n-active");
	}

	activeSlider = $(".n-active").index();
	$(".news-content-num").text("0" + (activeSlider + 1));
})

$(".new-slider-left").on("click", function() {
	var activeSlider = $(".n-active").index();
	var nextSlide = activeSlider - 1;
	if (0 >= activeSlider) {
		$(".n-slider-img").eq(activeSlider).hide();
		$(".n-slider-img").eq(sliderLength - 1).show();
		$(".n-slider-img").eq(activeSlider).removeClass("n-active");
		$(".n-slider-img").eq(sliderLength - 1).addClass("n-active");
	}else {
		$(".n-slider-img").eq(activeSlider).hide();
		$(".n-slider-img").eq(nextSlide).show();
		$(".n-slider-img").eq(activeSlider).removeClass("n-active");
		$(".n-slider-img").eq(nextSlide).addClass("n-active");
	}

	activeSlider = $(".n-active").index();
	$(".news-content-num").text("0" + (activeSlider + 1));
})

$(".news-content-more").on("click", function() {
	$(".news-slider-hidden-text").slideDown(200);
})