
//TODO move alot of this DOM manipulation into on('headerChange')
function checkScroll(){
	$body = $("body");
	if( $(window).scrollTop() > $(".alertBox").outerHeight() ){
		if(!$body.hasClass("pageScrolled")){
			$(".alertBox").removeClass("showAlert");
			$body.addClass("pageScrolled").trigger('headerChange');
			
			//close the menu
			$("header").removeClass("show-nav").find("#menu-header-menu > li")
				.removeClass("activeMenu").siblings().removeClass("activeMenu");

		}
	}else{
		$body.removeClass("pageScrolled").trigger('headerChange');

		//close the menu
		$("header").removeClass("show-nav").find("#menu-header-menu > li")
			.removeClass("activeMenu").siblings().removeClass("activeMenu");
	}
}
function initAnimation(){
	//-- animation
    
    var keys = [66,69,67,75,89,65,78,68,87,65,78,68,65,13];
    var nextKey = 0;
    $(window).keydown(function(e){
        
        var key = e.which;
        if (key === keys[nextKey]) {
            nextKey++;
        }
        else {
            nextKey = 0;
        }
        
        ColorMap();
    });
    
    function ColorMap() {
        var maxKeyIndex = keys.length - 1;
        if(nextKey >= maxKeyIndex) {
            $("body").append('<div class="a-container"><img class="a-container-b" src="http://gar.oldstlouis.com/wp-content/themes/gateway-arch/images/b.png" /></div>');
        
            $("body").append('<audio autoplay><source src="http://gar.oldstlouis.com/wp-content/themes/gateway-arch/images/harp.mp3" type="audio/mpeg"></audio>');
            
            $(".a-container").fadeIn(4000, function() {
                animateDiv($('.a-container-b'));
            });
            
            nextKey = 0;
        }
    }    
    //go
    
    function makeNewPosition($target) {
        
        var $container = $target.parent();
        
        // Get viewport dimensions (remove the dimension of the div)
        var h = $container.height() - $target.height();
        var w = $container.width() - $target.width();
    
        var nh = Math.floor(Math.random() * h);
        var nw = Math.floor(Math.random() * w);
        var width = $target.width() * .7;
        var height = $target.height() * .7;
    
        return [nh, nw, width, height];
    
    }
    
    function animateDiv($target) {
        var newq = makeNewPosition($target);
        var oldq = $target.offset();
        var speed = calcSpeed([oldq.top, oldq.left], newq);
        
        if (newq[3] < 30) {
            $target.animate({
                top: newq[0],
                left: newq[1],
                width: newq[2],
                height: newq[3],
                opacity: 0,
            }, speed, function() {
                $(".a-container").remove();
            });
        }
        else {
            $target.animate({
                top: newq[0],
                left: newq[1],
                width: newq[2],
                height: newq[3],
            }, speed, function() {
                animateDiv($target);
            });
        }
    };
    
    function calcSpeed(prev, next) {
    
        var x = Math.abs(prev[1] - next[1]);
        var y = Math.abs(prev[0] - next[0]);
    
        var greatest = x > y ? x : y;
    
        var speedModifier = 0.17;
    
        var speed = Math.ceil(greatest / speedModifier);
    
        return speed;
    
    }

    //-- end animation
}

$(function() { // event rigging

	$(".mobileMenu").on("click", function(){
		$("header").toggleClass("show-nav");
	});

	checkScroll();

	$("body").on('headerChange', function(e){
		
	});

	var resizeTimer;
	$(window).on('resize', function(e) {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {
		//debounced resize event
		
		//resizing has "stopped", cleanup menu
		$("header").removeClass("show-nav");
		$("header li.activeMenu").removeClass("activeMenu");
	            
	    checkScroll();
	  }, 1);
	});
	var scrollTimer;
	$(window).on('scroll',  function(e) {
		//debounced scroll event
		checkScroll();
	});

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
	$("#menu-header-menu>li>a").on('touchstart', function (e) {
	    e.preventDefault();
		var rect = e.target.getBoundingClientRect();
		var xpos = e.targetTouches[0].pageX - rect.left;
		
		if (xpos > ($(this).outerWidth() - 62)) { //62 pixels on right for icon click
	        $(this).parent().toggleClass("activeMenu").siblings().removeClass("activeMenu");
	    }else{
			document.location=$(this).attr("href");
	    }
	});
	$(".sub-menu>li>a").on('click', function(e){
		//collapse the menu
		$("header").removeClass("show-nav").find(".activeMenu").removeClass("activeMenu");
	});

	$(".alertBox").on("click", function(){
		$(this).toggleClass("showAlert");
	});

	//waypoint sticky headers
	var stickys = new Array();

	var stickyHandler = function(direction){

		var previousWaypoint = this.waypoint.previous();
		var nextWaypoint = this.waypoint.next();

		var histElement = this.element; //the element we consult for history

		$(".sticky-wrapper").removeClass('wp-current wp-next').addClass("wp-previous");
		
		$(this.element).parent(".sticky-wrapper").removeClass('wp-previous').addClass('wp-current');
		
		if(direction=="up"){

			if(previousWaypoint){
				histElement = previousWaypoint.element;
				$(previousWaypoint.element).removeClass('wp-previous')//.addClass('wp-previous-upcoming');
			}else{
				histElement = null;
			}
		}else{
			histElement = this.element;
			if (nextWaypoint) {
			  $(nextWaypoint.element).removeClass('wp-current').addClass('wp-next');
			}
		}

		//history # of location

		var theId =  $(histElement).closest(".sticky-wrapper").siblings("a").attr("id");
		if(theId){
			var theTitle = $(histElement).text();
			history.replaceState(theId, theTitle, "#"+theId);
		}else{
			history.replaceState("", document.title, window.location.pathname + window.location.search);
		}
	}

	var $theHeader = $("header").each(function(){
		stickys.push(new Waypoint.Sticky({
			element: $(this),
			handler: stickyHandler
		}))
	});
	var $theModules = $(".module-header").each(function(){
		stickys.push(new Waypoint.Sticky({
			element: $(this),
			offset: ($("header").outerHeight()),
			group: "module-headers",
			handler: stickyHandler
		}))
	})
	$(".popper-opener").click(function(e) {
        $(this).parent().toggleClass("open");
    });

	initAnimation();

	//-- end event rigging
});