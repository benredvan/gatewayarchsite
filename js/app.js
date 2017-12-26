function checkScroll(){
	$body = $("body");
	if($(window).scrollTop() > 3){
		if(!$body.hasClass("pageScrolled")){
			$body.addClass("pageScrolled");
			$(".alertBox").removeClass("showAlert");

			$body.trigger('headerChange');
		}
	}else{
		$body.removeClass("pageScrolled");
		$body.trigger('headerChange');
	}
}

$(function() { // event rigging

	$(".mobileMenu").on("click", function(){
		$("header").toggleClass("show-nav");
	});

	checkScroll();


	$("body").on('headerChange', function(e){
		//retake sticky header measurements
		stickyHeaders.recalculateDimensions();
	});



	//debounced resize event
	var resizeTimer;
	$(window).on('resize', function(e) {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {
		
		//resizing has "stopped", cleanup menu
		$("header").removeClass("show-nav");
		$("header li.activeMenu").removeClass("activeMenu");
	            
	  }, 250);
	});
	//BEN TODO: debounce this scroll event too plz
	$(window).on('scroll', checkScroll);

	$(document).click(function(e) {
		if ($(e.target).closest('header').length === 0) {
			//close menu, cleanup
			$("header").removeClass("show-nav");
			$("header li.activeMenu").removeClass("activeMenu");
		}
		if ($(e.target).closest('.alertBox').length === 0) {
			//close alert
			$(".alertBox").removeClass("showAlert");
		}
	});

	/* level-2 menu toggle */
	$("#navigation>li>a").on('touchstart', function (e) {
	    e.preventDefault();
		var rect = e.target.getBoundingClientRect();
		var xpos = e.targetTouches[0].pageX - rect.left;
		
		if (xpos > ($(this).outerWidth() - 62)) { //62 pixels on right for icon click
	        $(this).parent().toggleClass("activeMenu").siblings().removeClass("activeMenu");
	    }else{
			document.location=$(this).attr("href");
	    }
	});

	var stickyHeaders = (function() {

	  var $window = $(window),
	      $stickies;


	  var load = function(stickies) {


	    if (typeof stickies === "object" && stickies.length > 0) {

	      $stickies = stickies.each(function() {

	        var $thisSticky = $(this).wrap('<div class="followWrap" />');
	  
	        $thisSticky
	            .data('originalPosition', $thisSticky.offset().top)
	            .data('originalHeight', $thisSticky.outerHeight())
	              .parent()
	              .height($thisSticky.outerHeight()); 			  
	      });

	      $window.off("scroll.stickies").on("scroll.stickies", function() {
			  _whenScrolling();		
	      });
	    }
	  };


	  var recalculateDimensions = function(){
	  	if($stickies){
		  		
		  	$stickies.each(function(i) {
				$(this)
		            .data('originalPosition', $(this).offset().top + $("header").outerHeight())
		            .data('originalHeight', $(this).outerHeight() )
		              .parent()
		              .height($(this).outerHeight());
			});
	  	}
	  };

	  var _whenScrolling = function() {

	    $stickies.each(function(i) {			

	      var $thisSticky = $(this),
	          $stickyPosition = $thisSticky.data('originalPosition');


	      if ($stickyPosition <= $window.scrollTop()) {        

	      	//we've hit top
	        var $nextSticky = $stickies.eq(i + 1),
	            $nextStickyPosition = $nextSticky.data('originalPosition') - $thisSticky.data('originalHeight');

	        $thisSticky.addClass("fixed");

	        if ($nextSticky.length > 0 && ($thisSticky.offset().top ) >= $nextStickyPosition) {

	          $thisSticky.addClass("absolute").css("top", $nextStickyPosition);
	        }

	      } else {
	        
	        var $prevSticky = $stickies.eq(i - 1);

	        $thisSticky.removeClass("fixed");

	        //overlapping sticky coming on!
	        if ($prevSticky.length > 0 && $window.scrollTop() <= $thisSticky.data('originalPosition') - $thisSticky.data('originalHeight')) {

	          $prevSticky.removeClass("absolute").removeAttr("style");
	        }
	      }
	    });
	  };

	  return {
	    load: load,
	    recalculateDimensions: recalculateDimensions
	  };
	})();

	$(function() {
	  stickyHeaders.load($(".module-header")); 
	});

	$(".alertBox").on("click", function(){
		$(this).toggleClass("showAlert");
	});

	//-- end event rigging
});