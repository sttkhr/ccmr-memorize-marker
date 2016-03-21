(function($) { 
	$(".ccmr-marker").click(function () {
		var check = $(this).children('.ccmr-hide').hasClass('active');
		if(check){
			$(this).children('.ccmr-hide').removeClass('active');
		}else{
			$(this).children('.ccmr-hide').addClass('active');
		}
	});
})(jQuery);