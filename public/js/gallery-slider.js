$( document ).ready(function() {
	$("#p-num-count").val("01");
	$("#p-quantity-btn-plus").on("click", function() {
 		var pValue= $("#p-num-count").val();
 		pValue = ( (Number(pValue) + 1));
 		
 		if (pValue <= "09") {
 			pValue = "0" + pValue
 			$("#p-num-count").val(pValue);
 		}else {
 			$("#p-num-count").val(pValue);
 		}
	})

	$("#p-quantity-btn-minus").on("click", function() {
 		var pValue= $("#p-num-count").val();
 		pValue = ( (Number(pValue) - 1));
 		
 		if (pValue == 0) {
 			$("#p-num-count").val("01");
 			pValue = 0;
 		}else if (pValue <= 9) {
 			pValue = "0" + pValue
 			$("#p-num-count").val(pValue);
 		}else {
 			$("#p-num-count").val(pValue);
 		}
	})

	/*Gallery Slider*/

	$(".gallery-slider-image").eq(0).fadeIn(600);
	$("#gallery-down").on("click", function() {
		var activeIcon = $(".gal-icon-active").index() - 1;
		var lastIcon = $(".gallery-nav-icon:last").index() - 1;
		var nextIcon = activeIcon + 1;
		var activeSlide = $(".gal-slide-active").index();
		var lastSlide = $(".gallery-slider-image:last").index();
		var nextSlide = activeSlide + 1;
		if (lastIcon < nextIcon) {
			$(".gallery-nav-icon").eq(activeIcon).removeClass("gal-icon-active");
			$(".gallery-nav-icon").eq(0).addClass("gal-icon-active");
			$(".gallery-slider-image").eq(activeSlide).removeClass("gal-slide-active");
			$(".gallery-slider-image").eq(0).addClass("gal-slide-active");
			$(".gallery-slider-image").eq(activeSlide).fadeOut(300, function() {
				$(".gallery-slider-image").eq(0).fadeIn(300);
			});
		}else {
			$(".gallery-nav-icon").eq(activeIcon).removeClass("gal-icon-active");
			$(".gallery-nav-icon").eq(nextIcon).addClass("gal-icon-active");
			$(".gallery-slider-image").eq(activeSlide).fadeOut(300);
			$(".gallery-slider-image").eq(nextSlide).fadeIn(300);
			$(".gallery-slider-image").eq(activeSlide).removeClass("gal-slide-active");
			$(".gallery-slider-image").eq(nextSlide).addClass("gal-slide-active");
		}
		
	})

		$("#gallery-up").on("click", function() {
		var activeIcon = $(".gal-icon-active").index() - 1;
		var lastIcon = $(".gallery-nav-icon:last").index() - 1;
		var nextIcon = activeIcon - 1;
		var activeSlide = $(".gal-slide-active").index();
		var lastSlide = $(".gallery-slider-image:last").index();
		var nextSlide = activeSlide - 1;
		if (lastIcon < nextIcon) {
			$(".gallery-nav-icon").eq(activeIcon).removeClass("gal-icon-active");
			$(".gallery-nav-icon").eq(lastIcon).addClass("gal-icon-active");
			$(".gallery-slider-image").eq(activeSlide).removeClass("gal-slide-active");
			$(".gallery-slider-image").eq(lastSlide).addClass("gal-slide-active");
			$(".gallery-slider-image").eq(activeSlide).fadeOut(300, function() {
				$(".gallery-slider-image").eq(lastSlide).fadeIn(300);
			});
		}else {
			$(".gallery-nav-icon").eq(activeIcon).removeClass("gal-icon-active");
			$(".gallery-nav-icon").eq(nextIcon).addClass("gal-icon-active");
			$(".gallery-slider-image").eq(activeSlide).fadeOut(300, function() {
				$(".gallery-slider-image").eq(nextSlide).fadeIn(300);
			});
			$(".gallery-slider-image").eq(activeSlide).removeClass("gal-slide-active");
			$(".gallery-slider-image").eq(nextSlide).addClass("gal-slide-active");
		}
		
	})


	$("#gallery-nav-icon1").on("click", function() {
		var activeSlide = $(".gal-slide-active").index();
		$(".gal-icon-active").removeClass("gal-icon-active");
		$(this).addClass("gal-icon-active");
		$(".gallery-slider-image").eq(activeSlide).fadeOut(300, function() {
			$(".gallery-slider-image").eq(0).fadeIn(300);
		});
		$(".gallery-slider-image").eq(activeSlide).removeClass("gal-slide-active");
		$(".gallery-slider-image").eq(0).addClass("gal-slide-active");
	})

	$("#gallery-nav-icon2").on("click", function() {
		var activeSlide = $(".gal-slide-active").index();
		$(".gal-icon-active").removeClass("gal-icon-active");
		$(this).addClass("gal-icon-active");
		$(".gallery-slider-image").eq(activeSlide).fadeOut(300, function() {
			$(".gallery-slider-image").eq(1).fadeIn(300);
		});
		$(".gallery-slider-image").eq(activeSlide).removeClass("gal-slide-active");
		$(".gallery-slider-image").eq(1).addClass("gal-slide-active");
	})

	$("#gallery-nav-icon3").on("click", function() {
		var activeSlide = $(".gal-slide-active").index();
		$(".gal-icon-active").removeClass("gal-icon-active");
		$(this).addClass("gal-icon-active");
		$(".gallery-slider-image").eq(activeSlide).fadeOut(300, function() {
			$(".gallery-slider-image").eq(2).fadeIn(300);
		});
		$(".gallery-slider-image").eq(activeSlide).removeClass("gal-slide-active");
		$(".gallery-slider-image").eq(2).addClass("gal-slide-active");
	})

	$("#gallery-nav-icon4").on("click", function() {
		var activeSlide = $(".gal-slide-active").index();
		$(".gal-icon-active").removeClass("gal-icon-active");
		$(this).addClass("gal-icon-active");
		$(".gallery-slider-image").eq(activeSlide).fadeOut(300, function() {
			$(".gallery-slider-image").eq(3).fadeIn(300);
		});
		$(".gallery-slider-image").eq(activeSlide).removeClass("gal-slide-active");
		$(".gallery-slider-image").eq(3).addClass("gal-slide-active");
	})

	$(".single-add-to-card-btn").on("click", function() {
		$(".single-add-to-card-btn").find("img").addClass("wiggle-css");
		setTimeout(function() {
			$(".single-add-to-card-btn").find("img").removeClass("wiggle-css");
		}, 3000)
	})
});