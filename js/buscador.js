// JavaScript Document
var $ss = jQuery.noConflict();
$ss(document).ready(function() {

	$ss('.popup').css({ opacity: 0 });

	$ss('.form-container').submit(function() {
		if(!$ss('.form-container .search-field').val() || $ss('.form-container .search-field').val() == "Ingrese el codigo del cuarto...") {
			$ss('.popup').css({ opacity: 0 });
			$ss('.popup').animate(
				{ opacity: 1 },
				{
					duration: 'slow',
					easing: 'easeOutBounce'
				});
			return false;
		}
	});

	$ss('.form-container .search-field').focus(function() {
		if($ss(this).val() == "Ingrese el codigo del cuarto...") {
			this.value = "";
		}
	});

	$ss('.form-container .search-field').keydown(function() {
		$ss('.popup').css({ opacity: 0 });
	});

});

