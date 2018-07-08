$( document ).ready(function() {
	$(".card-btn-plus").on("click", function() {
 		var pValue= $(this).siblings("#id-product-quantity").val();
 		pValue = ( (Number(pValue) + 1));
 		
 		if (pValue <= "09") {
 			pValue = "0" + pValue
 			$(this).siblings("#id-product-quantity").val(pValue);
 		}else {
 			$(this).siblings("#id-product-quantity").val(pValue);
 		}
	})

	$(".card-btn-minus").on("click", function() {
 		var pValue= $(this).siblings("#id-product-quantity").val();
 		pValue = ( (Number(pValue) - 1));
 		
 		if (pValue == 0) {
 			$(this).siblings("#id-product-quantity").val("01");
 			pValue = 0;
 		}else if (pValue <= 9) {
 			pValue = "0" + pValue
 			$(this).siblings("#id-product-quantity").val(pValue);
 		}else {
 			$(this).siblings("#id-product-quantity").val(pValue);
 		}
	})

});

var cardData = cardPaymentForm.paymentCarddata;
for (var i in ['input', 'change', 'blur', 'keyup']) {
    cardData.addEventListener('input', formatCardData, false);
}
function formatCardData() {
    var cardCode = this.value.replace(/[^\d]/g, '').substring(0,4);
    cardCode = cardCode != '' ? cardCode.match(/.{1,2}/g).join('/') : '';
    this.value = cardCode;
}


var cardNum = cardPaymentForm.paymentCardnum;
for (var i in ['input', 'change', 'blur', 'keyup']) {
    cardNum.addEventListener('input', formatCardCode, false);
}
function formatCardCode() {
    var cardCode = this.value.replace(/[^\d]/g, '').substring(0,16);
    cardCode = cardCode != '' ? cardCode.match(/.{1,4}/g).join(' ') : '';
    this.value = cardCode;
}

var cardCvv = cardPaymentForm.paymentCardcvv;
for (var i in ['input', 'change', 'blur', 'keyup']) {
    cardCvv.addEventListener('input', formatCardCvv, false);
}
function formatCardCvv() {
    var cardCode = this.value.replace(/[^\d]/g, '').substring(0,3);
    this.value = cardCode;
}


