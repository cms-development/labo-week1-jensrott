jQuery(document).ready(function() {

	/* If there are required actions, add an icon with the number of required actions in the About content page -> Actions required tab */
    var content_nr_actions_required = contentLiteWelcomeScreenObject.nr_actions_required;

    if ( (typeof content_nr_actions_required !== 'undefined') && (content_nr_actions_required != '0') ) {
        jQuery('li.content-w-red-tab a').append('<span class="content-actions-count">' + content_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".content-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'content_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : contentLiteWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.content-tab-pane h1').append('<div id="temp_load" style="text-align:center"><img src="' + contentLiteWelcomeScreenObject.template_directory + '/inc/content-info/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var content_lite_actions_count = jQuery('.content-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof content_lite_actions_count !== 'undefined' ) {
                    if( content_lite_actions_count == '1' ) {
                        jQuery('.content-actions-count').remove();
                        jQuery('.content-tab-pane').append('<p>' + contentLiteWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.content-actions-count').text(parseInt(content_lite_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

	/* Tabs in welcome page */
	function content_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".content-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var content_actions_anchor = location.hash;

	if( (typeof content_actions_anchor !== 'undefined') && (content_actions_anchor != '') ) {
		content_welcome_page_tabs('a[href="'+ content_actions_anchor +'"]');
	}

    jQuery(".content-nav-tabs a").click(function(event) {
        event.preventDefault();
		content_welcome_page_tabs(this);
    });

		/* Tab Content height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.content-tab-content > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 180;
		 $tab.css('min-height',$newheight);
	 }

});
