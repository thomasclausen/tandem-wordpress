(function($) {
	$(document).ready(function(){
		$('nav.bbp-login-navigation ul li').click(function (e) {
			$(this).addClass('current').siblings().removeClass('current');
			$(this).parent().parent().siblings($('a', this).attr('href')).addClass('current').siblings().removeClass('current');
			e.preventDefault();
		});
	});
})(jQuery);

jQuery.noConflict();