$( function() {
    $( "#irs" ).slider({
      range: true,
      min: 299,
      max: 15000,
      values: [ 299, 10999 ],
      slide: function( event, ui ) {
        $( "#price-from" ).val(ui.values[ 0 ]);
        $( "#price-to" ).val(ui.values[ 1 ] );
      }
    });
    $( "#price-from" ).val( $( "#irs" ).slider( "values", 0 ));
    $( "#price-to" ).val( $( "#irs" ).slider( "values", 1 ));
  
    // Изменение местоположения ползунка при вводиде данных в первый элемент input
	  $("input#price-from").change(function(){
	  	var value1=$("input#price-from").val();
	  	var value2=$("input#price-to").val();
	      if(parseInt(value1) > parseInt(value2)){
	  		value1 = value2;
	  		$("input#price-from").val(value1);
	  	}
	  	$("#irs").slider("values",0,value1);	
	  });
	      
	  // Изменение местоположения ползунка при вводиде данных в второй элемент input 	
	  $("input#price-to").change(function(){
	  	var value1=$("input#price-from").val();
	  	var value2=$("input#price-to").val();

	  	if(parseInt(value1) > parseInt(value2)){
	  		value2 = value1;
	  		$("input#price-to").val(value2);
	  	}
	  	$("#irs").slider("values",1,value2);
	  });

	  // фильтрация ввода в поля
		jQuery('#price-from, #price-to').keypress(function(event){
			var key, keyChar;
			if(!event) var event = window.event;
			
			if (event.keyCode) key = event.keyCode;
			else if(event.which) key = event.which;
		
			if(key==null || key==0 || key==8 || key==13 || key==9 || key==46 || key==37 || key==39 ) return true;
			keyChar=String.fromCharCode(key);
			
			if(!/\d/.test(keyChar))	return false;
		
		});

  });

$(".catalog-categories-list").hover(function() {
		$(this).children(".catalog-child-items").slideDown(200);
	},
	function() {
		$(this).children(".catalog-child-items").slideUp(200);
	}
)


$(".manufacturer-list").on("click", function() {
	var listUl = $(".manufacturer-list-ul").is(":visible");
	if (listUl) {
		$(".manufacturer-list-ul").slideUp(200);
		$(this).children(".manufacturer-angle").css("transform", "rotate(0deg)");
	}else {
		$(".manufacturer-list-ul").slideDown(200);
		$(this).children(".manufacturer-angle").css("transform", "rotate(180deg)");
	}
})

$(".price-filter").on("click", function() {
	var listUl = $(".price-filter-act").is(":visible");
	if (listUl) {
		$(".price-filter-act").slideUp(200);
		$(this).children(".price-angle").css("transform", "rotate(0deg)");
	}else {
		$(".price-filter-act").slideDown(200);
		$(this).children(".price-angle").css("transform", "rotate(180deg)");
	}
})

$(".wf-add-cart").on("click", function() {
	$(this).parent().parent().find(".c-product-checked").css("display", "block");
})

$(document).ready(function() {
	$('.email-input').blur(function() {
		if($(this).val() != '') {
			var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
			if(pattern.test($(this).val())){
				$(this).css({'border-bottom' : '1px solid rgba(54,54,54,0.3)'});
		} else {
			$(this).css({'border-bottom' : '1px solid #ff0000'});
		}
		} else {
			$(this).css({'border-bottom' : '1px solid #ff0000'});
		}
	});
});

