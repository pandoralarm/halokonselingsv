/**
 * Theme functions file.
 *
 * Contains handlers for navigation.
 */

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
   	});
});

function expert_plumber_open() {
	jQuery(".sidenav").addClass('show');
}
function expert_plumber_close() {
	jQuery(".sidenav").removeClass('show');
    jQuery( '.mobile-menu' ).focus();
}

function expert_plumber_menuAccessibility() {
	var links, i, len,
	    expert_plumber_menu = document.querySelector( '.nav-menu' ),
	    expert_plumber_iconToggle = document.querySelector( '.nav-menu ul li:first-child a' );
    
	let expert_plumber_focusableElements = 'button, a, input';
	let expert_plumber_firstFocusableElement = expert_plumber_iconToggle; // get first element to be focused inside menu
	let expert_plumber_focusableContent = expert_plumber_menu.querySelectorAll(expert_plumber_focusableElements);
	let expert_plumber_lastFocusableElement = expert_plumber_focusableContent[expert_plumber_focusableContent.length - 1]; // get last element to be focused inside menu

	if ( ! expert_plumber_menu ) {
    	return false;
	}

	links = expert_plumber_menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
	    links[i].addEventListener( 'focus', toggleFocus, true );
	    links[i].addEventListener( 'blur', toggleFocus, true );
	}

	// Sets or removes the .focus class on an element.
	function toggleFocus() {
      	var self = this;

      	// Move up through the ancestors of the current link until we hit .mobile-menu.
      	while (-1 === self.className.indexOf( 'nav-menu' ) ) {
	      	// On li elements toggle the class .focus.
	      	if ( 'li' === self.tagName.toLowerCase() ) {
	          	if ( -1 !== self.className.indexOf( 'focus' ) ) {
	          		self.className = self.className.replace( ' focus', '' );
	          	} else {
	          		self.className += ' focus';
	          	}
	      	}
	      	self = self.parentElement;
      	}
	}
    
	// Trap focus inside modal to make it ADA compliant
	document.addEventListener('keydown', function (e) {
	    let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

	    if ( ! isTabPressed ) {
	    	return;
	    }

	    if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
	      	if (document.activeElement === expert_plumber_firstFocusableElement) {
		        expert_plumber_lastFocusableElement.focus(); // add focus for the last focusable element
		        e.preventDefault();
	      	}
	    } else { // if tab key is pressed
	    	if (document.activeElement === expert_plumber_lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
		      	expert_plumber_firstFocusableElement.focus(); // add focus for the first focusable element
		      	e.preventDefault();
	    	}
	    }
	});   
}

jQuery(function($){
	$('.mobile-menu').click(function () {
	    expert_plumber_menuAccessibility();
  	});
	$('.search-toggle').click(function () {
	    expert_plumber_search_focus();
  	});
});

function expert_plumber_search_open() {
	jQuery(".search-outer").addClass('show');
}
function expert_plumber_search_close() {
	jQuery(".search-outer").removeClass('show');
}

function expert_plumber_search_focus() {
	var links, i, len,
	    expert_plumber_search = document.querySelector( '.search-outer' ),
	    expert_plumber_iconToggle = document.querySelector( '.search-outer input[type="search"]' );
	    
	let expert_plumber_focusableElements = 'button, a, input';
	let expert_plumber_firstFocusableElement = expert_plumber_iconToggle; // get first element to be focused inside menu
	let expert_plumber_focusableContent = expert_plumber_search.querySelectorAll(expert_plumber_focusableElements);
	let expert_plumber_lastFocusableElement = expert_plumber_focusableContent[expert_plumber_focusableContent.length - 1]; // get last element to be focused inside menu

	if ( ! expert_plumber_search ) {
    	return false;
	}

	links = expert_plumber_search.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
	    links[i].addEventListener( 'focus', toggleFocus, true );
	    links[i].addEventListener( 'blur', toggleFocus, true );
	}

	// Sets or removes the .focus class on an element.
	function toggleFocus() {
      	var self = this;

      	// Move up through the ancestors of the current link until we hit .mobile-menu.
      	while (-1 === self.className.indexOf( 'nav-menu' ) ) {
	      	// On li elements toggle the class .focus.
	      	if ( 'li' === self.tagName.toLowerCase() ) {
	          	if ( -1 !== self.className.indexOf( 'focus' ) ) {
	          		self.className = self.className.replace( ' focus', '' );
	          	} else {
	          		self.className += ' focus';
	          	}
	      	}
	      	self = self.parentElement;
      	}
	}
    
	// Trap focus inside modal to make it ADA compliant
	document.addEventListener('keydown', function (e) {
	    let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

	    if ( ! isTabPressed ) {
	    	return;
	    }

	    if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
	      	if (document.activeElement === expert_plumber_firstFocusableElement) {
		        expert_plumber_lastFocusableElement.focus(); // add focus for the last focusable element
		        e.preventDefault();
	      	}
	    } else { // if tab key is pressed
	    	if (document.activeElement === expert_plumber_lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
		      	expert_plumber_firstFocusableElement.focus(); // add focus for the first focusable element
		      	e.preventDefault();
	    	}
	    }
	});   
}