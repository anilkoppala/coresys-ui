/**
 * TextAreaExpander plugin for jQuery
 * v1.0
 * Expands or contracts a textarea height depending on the
 * quatity of content entered by the user in the box.
 *
 * By Craig Buckler, Optimalworks.net
 *
 * As featured on SitePoint.com:
 * http://www.sitepoint.com/blogs/2009/07/29/build-auto-expanding-textarea-1/
 *
 * Please use as you wish at your own risk.
 */

/**
 * Usage:
 *
 * From JavaScript, use:
 *	   $(<node>).TextAreaExpander(<minHeight>, <maxHeight>);
 *	   where:
 *		 <node> is the DOM node selector, e.g. "textarea"
 *		 <minHeight> is the minimum textarea height in pixels (optional)
 *		 <maxHeight> is the maximum textarea height in pixels (optional)
 *
 * Alternatively, in you HTML:
 *	   Assign a class of "expand" to any <textarea> tag.
 *	   e.g. <textarea name="textarea1" rows="3" cols="40" class="expand"></textarea>
 *
 *	   Or assign a class of "expandMIN-MAX" to set the <textarea> minimum and maximum height.
 *	   e.g. <textarea name="textarea1" rows="3" cols="40" class="expand50-200"></textarea>
 *	   The textarea will use an appropriate height between 50 and 200 pixels.
 */

/**
 * Upgrades by Jon Gibbins
 * 26 Nov 2009	Now accepts minHeight and maxHeight
 */

(function($) {

	// jQuery plugin definition
	$.fn.TextAreaExpander = function(minHeight, maxHeight) {

		var hCheck = !($.browser.msie || $.browser.opera),
			emPixels = getEmPixels();

		// if we have set units, calculate pixel equivalents
		if (typeof minHeight == 'string') {
			if (minHeight.substring(minHeight.length - 2) == 'em') {
				minHeight = minHeight.substring(0, minHeight.length - 2) * emPixels;
			}
		}
		if (typeof maxHeight == 'string') {
			if (maxHeight.substring(maxHeight.length - 2) == 'em') {
				maxHeight = maxHeight.substring(0, maxHeight.length - 2) * emPixels;
			}
		}

		// resize a textarea
		function ResizeTextarea(e) {

			// event or initialize element?
			e = e.target || e;

			// find content length and box width
			var vlen = e.value.length, ewidth = e.offsetWidth;
			if (vlen != e.valLength || ewidth != e.boxWidth) {

				if (hCheck && (vlen < e.valLength || ewidth != e.boxWidth)) e.style.height = "0px";
				var h = Math.max(e.expandMin, Math.min(e.scrollHeight, e.expandMax));

				e.style.overflow = (e.scrollHeight > h ? "auto" : "hidden");
				e.style.height = h + "px";

				e.valLength = vlen;
				e.boxWidth = ewidth;
			}

			return true;
		};

		function getEmPixels(elTarget){
			if (typeof elTarget == "undefined") {
				elTarget = document.getElementsByTagName('body')[0];
			}
			else if (typeof elTarget == "string") {
				elTarget = document.getElementById(elTarget);
			}

			if (elTarget == null) {
				return false;
			}

			var tempDiv = document.createElement("DIV");
			tempDiv.style.height = 1 + "em";
			tempDiv.style.position = "absolute";
			tempDiv.style.left = "-999px";
			elTarget.appendChild(tempDiv);

			emPixelHeight = tempDiv.offsetHeight;

			elTarget.removeChild(tempDiv);

			return emPixelHeight;
		}

		// initialize
		this.each(function() {

			// is a textarea?
			if (this.nodeName.toLowerCase() != "textarea") return;

			// set height restrictions
			var p = this.className.match(/expand(\d+)\-*(\d+)*/i);
			this.expandMin = minHeight || (p ? parseInt('0'+p[1], 10) : 0);
			this.expandMax = maxHeight || (p ? parseInt('0'+p[2], 10) : 99999);

			// initial resize
			ResizeTextarea(this);

			// zero vertical padding and add events
			if (!this.Initialized) {
				this.Initialized = true;
				$(this).css("padding-top", 0).css("padding-bottom", 0);
				$(this).bind("keyup", ResizeTextarea).bind("focus", ResizeTextarea);
			}
		});

		return this;
	};

})(jQuery);