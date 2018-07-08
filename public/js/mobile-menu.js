$(document).ready(function() {
	$(".menu-burger").on("click", function() {
		var firstLine = $(".bl1").width();
		var secondLine = $(".bl2").width();
		if (firstLine > 0) {
			$(this).find(".bl1").animate({
				"width": 0,
			}, 400);
			$(this).find(".bl2").animate({
				"width": "100%",
			}, 400);
			$("body").css("overflow","hidden");
		}else {
			$(this).find(".bl1").animate({
				"width": "100%",
			}, 400);
			$(this).find(".bl2").animate({
				"width": "55%",
			}, 400);
			$("body").css("overflow","auto");
		}

		if ($(".mobile-nav-menu").is(':hidden') && $(".login-mobile").is(':hidden')) {
			$(".mobile-nav-menu").slideDown(300);
		}else {
			$(".mobile-nav-menu").slideUp(300);
			$(".login-mobile").slideUp(300);
		}
	})

		$(".menu-user").on("click", function() {
		var firstLine = $(".bl1").width();
		var secondLine = $(".bl2").width();
		if (firstLine > 0) {
			$(".menu-burger").find(".bl1").animate({
				"width": 0,
			}, 400);
			$(".menu-burger").find(".bl2").animate({
				"width": "100%",
			}, 400);
			$("body").css("overflow","hidden");
		}else {
			$(".menu-burger").find(".bl1").animate({
				"width": "100%",
			}, 400);
			$(".menu-burger").find(".bl2").animate({
				"width": "55%",
			}, 400);
			$("body").css("overflow","auto");
		}
		$(".login-mobile").slideToggle(300);
	})


	$(".news-mobile-categories").on("click", function() {
		$(".news-categories").slideToggle();
	})
})


