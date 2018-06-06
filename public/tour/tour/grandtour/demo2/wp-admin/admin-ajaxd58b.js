jQuery('#s').on('input', function() {
	jQuery.ajax({
		url: 'http://themes.themegoods.com/grandtour/demo2/wp-admin/admin-ajax.php',
		type:'POST',
		data:'action=grandtour_ajax_search_result&'+jQuery('#menu_search_form').serialize(),
		success:function(results) {
			jQuery("#menu_search_autocomplete").html(results);
			
			if(results != '')
			{
				jQuery("#menu_search_autocomplete").addClass('visible');
				jQuery("#menu_search_autocomplete").show();
				
				jQuery('#menu_search_autocomplete ul li a').mousedown(function() {
					jQuery("#menu_search_autocomplete").attr('data-mousedown', true);
				});
			}
			else
			{
				jQuery("#menu_search_autocomplete").hide();
			}
		}
	})
});

jQuery('#s').bind('focus', function () {
    jQuery("#menu_search_autocomplete").addClass('visible');
});

jQuery('#s').bind('blur', function () {
	if(jQuery("#menu_search_autocomplete").attr('data-mousedown') != 'true')
    {
    	jQuery("#menu_search_autocomplete").removeClass('visible');
    }
});
