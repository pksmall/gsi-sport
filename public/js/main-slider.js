$( document ).ready(function() {

	/*
	* Product Corusel
	*/

	var 
		scrollLeft = 0,
		marginRightItem = 50;
	$("#cor-scroll-right").on("click", function() {
		var 
			widthItems = $(".cor-text").width(),
			countItems = $(".cor-text").length,
			scrollStep = widthItems + marginRightItem,
			scrollMax = scrollStep * countItems;;
		scrollLeft += scrollStep;
		if (scrollLeft >= scrollMax) {
			$(".corusel-items").animate({
				"left": "0px"
			}, 200);
			scrollLeft = 0;
		}else {
			$(".corusel-items").animate({
				"left": -scrollLeft + "px"
			}, 200);
		}

		if (scrollLeft == 0) {
			$("#first-point").prop("checked", true);
		}else if (scrollLeft == scrollStep) {
			$("#second-point").prop("checked", true);
		}else {
			$("#third-point").prop("checked", true);
		}
	})

	$("#cor-scroll-left").on("click", function() {
		var 
			widthItems = $(".cor-text").width(),
			countItems = $(".cor-text").length - 1,
			scrollStep = widthItems + marginRightItem,
			scrollMax = scrollStep * countItems;
		scrollLeft -= scrollStep;
		if (scrollLeft < 0) {
			$(".corusel-items").animate({
				"left": -scrollMax + "px"
			}, 200);
			scrollLeft = scrollMax;
		}else {
			$(".corusel-items").animate({
				"left": -scrollLeft + "px"
			}, 200);
		}

		if (scrollLeft == 0) {
			$("#first-point").prop("checked", true);
		}else if (scrollLeft == scrollStep) {
			$("#second-point").prop("checked", true);
		}else {
			$("#third-point").prop("checked", true);
		}
	})

	$("#first-point").on("click", function() {
		$(".corusel-items").animate({
				"left": "0px"
		}, 200);
		scrollLeft = 0;
	})

	$("#second-point").on("click", function() {
		var 
			widthItems = $(".cor-text").width(),
			countItems = $(".cor-text").length,
			scrollStep = widthItems + marginRightItem,
			scrollMax = scrollStep * countItems;
		$(".corusel-items").animate({
				"left": -scrollStep * 1 + "px"
		}, 200);
		scrollLeft = 0;
	})

	$("#third-point").on("click", function() {
		var 
			widthItems = $(".cor-text").width(),
			countItems = $(".cor-text").length,
			scrollStep = widthItems + marginRightItem,
			scrollMax = scrollStep * countItems;
		$(".corusel-items").animate({
				"left": -scrollStep * 2 + "px"
		}, 200);
		scrollLeft = 0;
	})

	/*
	* Main Slider
	*/

	start();
	var countSlide = 1;
	var lengthSlide = $(".slideimg").length;
	$(".arrow-right").on("click", function () {
		var lastSlide = $(".slideimg:last").index();
		var activeSlide = $(".active").index();
		var nextSlider = activeSlide + 1;
		countSlide +=1;
		if (lastSlide == activeSlide) {
			$(".slideimg").eq(activeSlide).removeClass("active");
			$(".slideimg").eq(0).addClass("active");
			$(".slideimg").eq(activeSlide).hide("clip" ,500);
			$(".slideimg").eq(0).show("clip" ,500);
			countSlide = 1;
			$("#slider-count").text("01");
			clearTimeout(timeId);
			start();
		}else {
			$(".slideimg").eq(activeSlide).removeClass("active");
			$(".slideimg").eq(nextSlider).addClass("active");
			$(".slideimg").eq(activeSlide).hide("clip" ,500);
			$(".slideimg").eq(nextSlider).show("clip" ,500);
			$("#slider-count").text("0" + countSlide);
			$("#get-progress").css({"width": "0", "transition": "0s"});
			clearTimeout(timeId);
			start();
		}


	});

	$(".arrow-left").on("click", function() {
		var firstSlide = $(".slideimg:first").index();
		var lastSlide = $(".slideimg:last").index();
		var activeSlide = $(".active").index();
		var pervSlide = activeSlide - 1;
		countSlide -=1;
		$("#get-progress").css("width", "0%");
		if (firstSlide == activeSlide) {
			$(".slideimg").eq(activeSlide).removeClass("active");
			$(".slideimg").eq(lastSlide).addClass("active");
			$(".slideimg").eq(activeSlide).hide("clip" ,500);
			$(".slideimg").eq(lastSlide).show("clip" ,500);
			countSlide = 3;
			$("#slider-count").text("03");
			clearTimeout(timeId);
			start();
		}else {
			$(".slideimg").eq(activeSlide).removeClass("active");
			$(".slideimg").eq(pervSlide).addClass("active");
			$(".slideimg").eq(activeSlide).hide("clip" ,500);
			$(".slideimg").eq(pervSlide).show("clip" ,500);
			$("#slider-count").text("0" + countSlide);
			clearTimeout(timeId);
			start();
		}
	})
	

	function start() {
		$("#get-progress").css({"width": "0", "transition": "0s"});
		$("#get-progress").css({"width": "100%", "transition": "5s"});
		window.timeId = setTimeout( function() {
			var lastSlide = $(".slideimg:last").index();
			var activeSlide = $(".active").index();
			var nextSlider = activeSlide + 1;
			countSlide +=1;
			if (lastSlide == activeSlide) {
				$(".slideimg").eq(activeSlide).removeClass("active");
				$(".slideimg").eq(0).addClass("active");
				$(".slideimg").eq(activeSlide).hide("clip" ,500);
				$(".slideimg").eq(0).show("clip" ,500);
				$("#get-progress").css({"width": "0", "transition": "0s"});
				countSlide = 1;
				$("#slider-count").text("01");
			}else {
				$(".slideimg").eq(activeSlide).removeClass("active");
				$(".slideimg").eq(nextSlider).addClass("active");
				$(".slideimg").eq(activeSlide).hide("clip" ,500);
				$(".slideimg").eq(nextSlider).show("clip" ,500);
				$("#get-progress").css({"width": "0", "transition": "0s"});
				$("#slider-count").text("0" + countSlide);
			}
			start()
		}, 5000)
	}

	$("#play-btn").on("click", function() {
		$(".nav-video-frame").removeClass("hide");
	})
})