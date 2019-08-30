/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
	window.getComputedStyle = function(el, pseudo) {
		this.el = el;
		this.getPropertyValue = function(prop) {
			var re = /(\-([a-z]){1})/g;
			if (prop == 'float') prop = 'styleFloat';
			if (re.test(prop)) {
				prop = prop.replace(re, function () {
					return arguments[2].toUpperCase();
				});
			}
			return el.currentStyle[prop] ? el.currentStyle[prop] : null;
		}
		return this;
	}
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {
	/*
	Responsive jQuery is a tricky thing.
	There's a bunch of different ways to handle
	it, so be sure to research and find the one
	that works for you best.
	*/
	
	/* getting viewport width */
	var responsive_viewport = $(window).width();
	
	  $(window).resize(function(){
		  repositionSidebar();
		  equalHeightCols();
		  if ($(window).width() < 768) {
			$('.sidebar-nav').css('top','0em');
			$('.sidebar-nav').css('bottom','auto');
			resetCols();
		  }
	  });
	
	/* if is below 481px */
	if (responsive_viewport < 481) {

	} /* end smallest screen */
	
	/* if is larger than 481px */
	if (responsive_viewport > 481) {

	} /* end larger than 481px */
	
	/* if is above or equal to 768px */
	if (responsive_viewport >= 768) {
		/* load gravatars */
		$('.comment img[data-gravatar]').each(function(){
			$(this).attr('src',$(this).attr('data-gravatar'));
		});
		
		equalHeightCols();
        repositionSidebar();

		$(window).scroll(function() {
			repositionSidebar();
		});	
	}
	
	/* off the bat large screen actions */
	if (responsive_viewport > 1030) {
	
	}
	
	
	function equalHeightCols() {
		if ($(".large-column")){
			resetCols();
			var colHeight = $(".large-column").outerHeight();
			if ($(".small-column").outerHeight() > colHeight){
				colHeight = $(".small-column").outerHeight();
			}
			$(".small-column").outerHeight(colHeight);
			$(".large-column").outerHeight(colHeight);
		}
		if ($(".large-column-left")){
			resetCols();
			if($('.ninja-forms-cont').length = 0){
				var colHeight = $(".large-column-left").outerHeight();
				if ($(".small-column-right").outerHeight() > colHeight){
					colHeight = $(".small-column-right").outerHeight();
				}
				$(".small-column-right").outerHeight(colHeight);
				$(".large-column-left").outerHeight(colHeight);
			}

		}
}
	
	function resetCols(){
		if ($(".large-column")){
		  $(".small-column").outerHeight('auto');
		  $(".large-column").outerHeight('auto');
		}
		if ($(".large-column-left")){
		  $(".small-column-right").outerHeight('auto');
		  $(".large-column-left").outerHeight('auto');
		}
}
	
	function repositionSidebar() {
		var width = $(window).width();
        var $main = $('#inner-content');
        var $sidebar = $('.sidebar-nav.primary');
        var $sidebarSecondary = $('.sidebar-nav.secondary');
		if (width >= 768){
			if ($(window).scrollTop() > 250){
                if ($sidebar.length) {
				    $sidebar.css('top',$(window).scrollTop() - $main.offset().top + 60);
				    $sidebar.css('bottom','auto');
                    $sidebarSecondary.css('top',($(window).scrollTop() + $sidebar.outerHeight() + 80));
                    $sidebarSecondary.css('bottom','auto');
                    if (($sidebar.offset().top + $sidebar.outerHeight()) > ($main.offset().top + $main.outerHeight())){
                        $sidebar.css('bottom',$sidebarSecondary.outerHeight() + 80);
                        $sidebar.css('top','auto');
                        $sidebarSecondary.css('bottom','1em');
                        $sidebarSecondary.css('top','auto');
                    }
                }
                else {
                    $sidebarSecondary.css('top',($(window).scrollTop() + 80));
                    $sidebarSecondary.css('bottom','auto');
                    if (($sidebarSecondary.offset().top + $sidebarSecondary.outerHeight()) > ($main.offset().top + $main.outerHeight())){
                        $sidebarSecondary.css('bottom','1em');
                        $sidebarSecondary.css('top','auto');
                    } 
                }
                
			}
			else {
                if ($sidebar.length) {
                    $sidebar.css('top','2.5em');
                    $sidebar.css('bottom','auto');
                    $sidebarSecondary.css('top',($main.offset().top + $sidebar.outerHeight() + 80));
                    $sidebarSecondary.css('bottom','auto');
                }
                else {
                    $sidebarSecondary.css('top',($main.offset().top - 10));
                    $sidebarSecondary.css('bottom','auto');
                }
			}
		}
	}
	// add all your scripts here
	
 
}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
	var doc = w.document;
	if( !doc.querySelector ){ return; }
	var meta = doc.querySelector( "meta[name=viewport]" ),
		initialContent = meta && meta.getAttribute( "content" ),
		disabledZoom = initialContent + ",maximum-scale=1",
		enabledZoom = initialContent + ",maximum-scale=10",
		enabled = true,
		x, y, z, aig;
	if( !meta ){ return; }
	function restoreZoom(){
		meta.setAttribute( "content", enabledZoom );
		enabled = true; }
	function disableZoom(){
		meta.setAttribute( "content", disabledZoom );
		enabled = false; }
	function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
		if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );