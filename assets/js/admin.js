jQuery(window).load(function(){

	if( jQuery('#dkwl_admin_branding_css').length ) {

		// ref: http://jsfiddle.net/deepumohanp/tGF6y/

		var textarea = jQuery('#dkwl_admin_branding_css');
		jQuery('#dkwl_admin_branding_css').hide();

		
		var editor = ace.edit("editor");

		editor.setTheme("ace/theme/twilight");

		editor.getSession().setMode("ace/mode/css");
		
		editor.getSession().on('change', function () {
		    textarea.val(editor.getSession().getValue());
		});

		textarea.val(editor.getSession().getValue());
		

	}
	
});