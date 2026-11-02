var $pp = jQuery.noConflict();
$pp(function() {
	$pp('.field, textarea').focus(function() {
        if(this.title==this.value) {
            this.value = '';
        }
    }).blur(function(){
        if(this.value=='') {
            this.value = this.title;
        }
    });

    $pp('#sort-nav ul li').hover( function(){
        $pp(this).find('.dd').show();
    }, function() {
        $pp(this).find('.dd').hide();
    });

    $pp('.search-expand').click( function(){
       $pp(this).slideToggle();
       $pp('#search').slideToggle(); 
    });

    $pp('.retract-button').click( function() {
       $pp('#search').slideToggle();
       $pp('.search-expand').slideToggle(); 
    });

    $pp("#slider").jcarousel({
        scroll: 1,
        auto: 2,
        wrap: 'both',
        initCallback: mycarousel_initCallback,
        // This tells jCarousel NOT to autobuild prev/next buttons
        buttonNextHTML: null,
        buttonPrevHTML: null,
        itemVisibleInCallback: {
            onAfterAnimation: function(c, o, i, s) {
                $pp('.jcarousel-control a').removeClass('active');
                $pp('.jcarousel-control a:eq('+ (i-1) +')').addClass('active');
            }
        }
    }); 

    $pp('.product').hover( function() {
    	$pp(this).css('background-position', '0 -300px');       
    }, function() {
    	$pp(this).css('background-position', '0 0');    	
    });

    $pp(".product").click(function(){
        window.location=$pp(this).find("a").attr("href");
     return false;
    });

    $pp('.scroll-pane').jScrollPane({
        showArrows: true,
        horizontalDragMinWidth: 28,
        horizontalDragMaxWidth: 28       
    });
    


    var width =  24 * $pp('.jcarousel-control a').length;    
    $pp('.jcarousel-control').width(width+24);
    var left_pos = ((994 - width)/2 ) + 1;
    $pp('.jcarousel-control').css('left' , left_pos );                
});

 function mycarousel_initCallback(carousel) {
    $pp('.jcarousel-control a').bind('click', function() {
        $pp('.jcarousel-control a').removeClass('active');
        $pp(this).addClass('active');
        carousel.scroll(jQuery.jcarousel.intval(jQuery(this).text()));
        return false;
    });
};    