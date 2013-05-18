var PayPalShop = function() {

	var init = function() {
		PAYPAL.apps.MiniCart.render();
	};

	return {
		init: init
	};

}();

(function($) { PayPalShop.init() })(jQuery);