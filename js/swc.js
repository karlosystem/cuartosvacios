var $jq = jQuery.noConflict();
$jq(document).ready(function () {

	var id = '#dialog';

	//Get the screen height and width
	var maskHeight = $jq(document).height();
	var maskWidth = $jq(window).width();

	//Set heigth and width to mask to fill up the whole screen
	$jq('#mask').css({ 'width': maskWidth, 'height': maskHeight });

	//transition effect		
	$jq('#mask').fadeIn(500);
	$jq('#mask').fadeTo("slow", 0.9);

	//Get the window height and width
	var winH = $jq(window).height();
	var winW = $jq(window).width();

	//Set the popup window to center
	$jq(id).css('top', winH / 2 - $jq(id).height() / 2);
	$jq(id).css('left', winW / 2 - $jq(id).width() / 2);

	//transition effect
	$jq(id).fadeIn(2000);

	//if close button is clicked
	$jq('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();

		$jq('#mask').hide();
		$jq('.window').hide();
	});

	//if mask is clicked
	$jq('#mask').click(function () {
		$jq(this).hide();
		$jq('.window').hide();
	});

});