/**
 * @author The Smiths
 * @since  0.0.5
 * @type   jQuery Effects
 */
$(function(){
	$("input").focus(function () {
		$('.error-login').fadeOut(2800);
	});
	
	$('.message').fadeOut(4000);
})