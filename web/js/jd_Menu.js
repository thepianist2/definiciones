/**
 * @author	Jonathan Sharp <jdsharp _AT__ gmail _DOT__ com>
 */

var JD_MN_CLASS 			= 'jd_menu';
var JD_MN_CLASS_ACTIVE		= 'jd_menu_active';
var JD_MN_CLASS_HOVER		= 'jd_menu_hover';
var JD_MN_CLASS_SELECTED	= 'jd_menu_selected';
var JD_MN_CLASS_INLINE		= 'jd_menu_inline';
var JD_MN_CLASS_INLINE_HOVER= 'jd_menu_inline_hover';
var JD_MN_CLASS_TITLE		= 'jd_menu_title';

var JD_MN_TIMEOUT			= 500;

// Plug in to methods to enable and disable select
var JD_MN_DISABLE_SELECT	= function() { return false; };
var JD_MN_ENABLE_SELECT		= function() { return false; };

var JD_MN_OFFSET_HORZ		= 8;
var JD_MN_OFFSET_VERT		= 3;

// Fixes for IE's failures
var JD_MN_IFRAME			= (document.all ? true : false);
var JD_MN_IFRAME_COUNTER	= 0;


function jd_Menu_init(element)
{
	if (typeof(element) == 'undefined') {
		element = '.' + JD_MN_CLASS;
	}

	$(element).each(
		function() {
			if (this.$initialized) {
				return true;
			}
			this.$initialized = true;
			
			// ---- SETUP A REFERENCE TO OUR PARENT ELEMENT ---- //
			// Test if we have an element to attach to
			var at = this.getAttribute('attachto');
			if (at && at != '') {
				if (at != 'none') {
					this.attachedTo = $('#' + at).get(0);
				}
			} else {
				this.attachedTo = this.parentNode;
			}

			if (this.attachedTo) {
				var om = this.attachedTo.getAttribute('onmenu');
				if (om && om != '') {
					eval('this.attachedTo.onMenu = ' + om);
				}
			}

			// ---- SETUP MENU POSITION ---- //
			var mp = this.getAttribute('menuposition');
			if (typeof(mp) != 'undefined' && mp) {
				this.menuPosition = mp;
				// Cascade this mp down
				$('.' + JD_MN_CLASS, this).each(
					function() {
						var t = this.getAttribute('menuposition');
						if (typeof(t) == 'undefined' || !t) {
							this.menuPosition = mp;
						}
					});
			} else {
				if (!this.menuPosition) {
					this.menuPosition = 'relative top right';
				}
			}

			// ---- SETUP DISABLE SELECTION HANDLERS ---- //
			$(this).mousedown(
				function() {
					JD_MN_DISABLE_SELECT();
				});
			$(this).mouseup(
				function() {
					JD_MN_ENABLE_SELECT();
				});



			this.show = function() {
				$(this).addClass(JD_MN_CLASS_ACTIVE);

				// Our blessed IE
				// Needed so IE does not call hide() on our menu more than once
				this.visible = true; 
				if (JD_MN_IFRAME && !this.iframe) {
					// Now also hack the width of this menu for each li
					width = this.offsetWidth;
					$('> li', this).each(
						function() {
							this.style.width = width + 'px';
						});


					// Create a new IFRAME element
					var i 	= document.createElement('IFRAME');
					var is 	= i.style;
						is.position			= 'absolute';
						is.width			= this.offsetWidth + 'px';
						is.height			= this.offsetHeight + 'px';
						is.zIndex			= '1999';
						this.style.zIndex	= '2000';
					this.iframe = i;
					// Attach this frame to our parent node so that the z-index works in IE
					this.parentNode.appendChild(this.iframe);

				}

				if (this.attachedTo) {
					this.moveByObject(this.attachedTo);

					if (this.attachedTo.onMenu) {
						this.attachedTo.onMenu(this, true);
					}
				}

				// If we have an iframe we need to position it
				if (JD_MN_IFRAME) {
					$(this.iframe).show();
					this.iframe.style.left	= this.offsetLeft + 'px';
					this.iframe.style.top	= this.offsetTop + 'px';
				}
			};

			this.hide = function() {
				this.visible = false;

				if (this.attachedTo && this.attachedTo.onMenu) {
					this.attachedTo.onMenu(this, false);
				}

				if (JD_MN_IFRAME) {
					if (--JD_MN_IFRAME_COUNTER < 0) {
						JD_MN_IFRAME_COUNTER = 0;
					}
					$(this.iframe).hide();
				}
				$(this).removeClass(JD_MN_CLASS_ACTIVE);
			};


			// Find each list item
			$('> li', this).each(
				function() {
					this.hasMenu = function() {
						return ($('> .' + JD_MN_CLASS, this).size() == 1);
					};
					this.getMenu = function() {
						return $('> .' + JD_MN_CLASS, this).get(0);
					};
					
					
					// Add hover highlight
					$(this).hover(
						function() {
							$(this).addClass(JD_MN_CLASS_HOVER);
							if (this.active) {
								this.getMenu().mouseInBoundaries = true;
							}
						},
						function() {
							$(this).removeClass(JD_MN_CLASS_HOVER);
							if (this.active) {
								this.getMenu().hideMenuOnTimeout();
							}
						});

					$(this).click(
						function() {
							if (this.hasMenu()) {
								if (this.active) {
									this.getMenu().hide();
									//$('> ul', this).get(0).hide();
								} else {
									//var menu = $('> ul', this).get(0);
									var menu = this.getMenu();

									menu.mouseInBoundaries = false;
									menu.show();
								}
							} else {
								// Hide the menu that we are a part of
								this.parentNode.hide();
							}
						});

					// Attach sub-menues to their li parent
					var parent = this;
					//$('> ul', this).each(
					$('> .' + JD_MN_CLASS, this).each(
						function() {
							this.attachedTo = parent;
						});


					// Add an onMenu callback for each li
					this.onMenu = function(menu, isActive) {
						this.isActive(isActive);
					};

					// Define isActive method
					this.active = false;
					this.isActive = function(state) {
						if (typeof(state) != 'undefined') {
							this.active = (state ? true : false);
						}

						return this.active;
					};

				});


			// Method to calculate our menu position when show() is called
			this.moveByObject = function(obj) {
				var l = 0;
				var t = 0;

				if (this.menuPosition) {
					var mp = this.menuPosition;
					if (mp == 'none') {
						return;
					}

					// Setup our parent coordinates
					if (mp.indexOf('relative') != -1) {
						l = obj.offsetLeft;
						t = obj.offsetTop;
					} else {
						l = VV.util.findX(obj);
						t = VV.util.findY(obj);
					}

					// Determine OUR position relative to the object
					if (mp.indexOf('mt') != -1) {
						t += (this.offsetHeight * -1);
					} else { 
						// mb (default) Menu Bottom
					}

					if (mp.indexOf('ml') != -1) {
						l += (this.offsetWidth * -1);
					} else { 
						// ml (default) Menu Right
					}

					if (mp.indexOf('bottom') != -1) {
						t += obj.offsetHeight - JD_MN_OFFSET_VERT;
					} else { 
						t += JD_MN_OFFSET_VERT;
						//top
					}

					if (mp.indexOf('left') != -1) {
						l += JD_MN_OFFSET_HORZ;
					} else {
						// right
						l += obj.offsetWidth - JD_MN_OFFSET_HORZ;
					}
				} else {
					l += JD_MN_OFFSET_HORZ;
					t += JD_MN_OFFSET_VERT;
				}

				$(this).css('left', l + 'px');
				$(this).css('top', 	t + 'px');
			};


			// Delayed close of menus
			this.mouseInBoundaries = false;
			$(this).hover(
				function() {
					this.mouseInBoundaries = true;
				},
				function() {
					this.hideMenuOnTimeout();
				});

			this.hideMenuOnTimeout = function() {
				this.mouseInBoundaries = false;
				var tmp = this;
				setTimeout(	function() {
								if (!tmp.mouseInBoundaries && tmp.visible == true) {
									tmp.hide();
								}
							}, JD_MN_TIMEOUT);
			};


			// Disable mousedown bubbling
			$(this).mousedown(
				function() {
					return false;
				});

			// Disable click bubbling for menus
			$(this).click(
				function() {
					return false;
				});
		});

		$('.' + JD_MN_CLASS_INLINE + ' li').hover(
			function() {
				$(this).addClass(JD_MN_CLASS_INLINE_HOVER);
			},
			function() {
				$(this).removeClass(JD_MN_CLASS_INLINE_HOVER);
			});
}

// Userspace function to easily show/hide menus
function jd_Menu_show(menu, isActive)
{
	var obj = $(menu).get(0);

	if (isActive) {
		obj.show();
	} else {
		obj.hide();
	}
}

function jd_Menu_timeout(menu)
{
	var obj = $(menu).get(0)
	obj.hideMenuOnTimeout();
}

