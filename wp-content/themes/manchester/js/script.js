// Floating div
jQuery(document).ready(function($) {
//this is the floating content
  var $floatingbox = $('#floating-box');

  if($('body').length > 0){

    var bodyY = parseInt($('body').offset().top) + 300;
    var originalX = $floatingbox.css('margin-left');

    $(window).scroll(function () { 

      var scrollY = $(window).scrollTop();
      var isfixed = $floatingbox.css('position') == 'fixed';

      if($floatingbox.length > 0){

        // $floatingbox.html("scrollY : " + scrollY + ", bodyY : " + bodyY + ", isfixed : " + isfixed);

        if ( (parseInt(scrollY) - 150) > bodyY && !isfixed ) {
  		    $floatingbox.stop().css({
  		      position: 'fixed',
            top: 50
  		    });
  	    } else if ( (parseInt(scrollY) - 150) < bodyY && isfixed ) {

  	 	    $floatingbox.css({
    		    position: 'relative',
    		    top: 0,
    		    marginLeft: originalX
  	      });
        }
      }
    });
  }
});