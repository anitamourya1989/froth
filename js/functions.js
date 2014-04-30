$(document).ready(function() {

	$('.price-table-toggle').click(function () {
	
		var thisparent = $(this).parents('.pricing-table');
		//$('.price-table-features', thisparent).fadeToggle('slow');
		$('.price-table-features', thisparent).slideToggle('slow');
		
		if($(this).html()=='+ Show features')
			$(this).html('- Hide features');
		else {	
			$(this).html('+ Show features');	
		}
		
		$( ".bullet-item span" ).show( "fast" );
	});
	
}); 


