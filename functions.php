<?php
add_action( 'admin_menu', 'wpaot_add_admin_menu' );
add_action( 'admin_init', 'wpaot_settings_init' );


function wpaot_add_admin_menu(  ) { 

	add_options_page( 'Wordpress Admin Only Theme', 'Wordpress Admin Only Theme', 'manage_options', 'wordpress_admin_only_theme', 'wordpress_admin_only_theme_options_page' );

}


function wpaot_settings_exist(  ) { 

	if( false == get_option( 'wordpress_admin_only_theme_settings' ) ) { 

		add_option( 'wordpress_admin_only_theme_settings' );

	}

}


function wpaot_settings_init(  ) { 

	register_setting( 'pluginPage', 'wpaot_settings' );

	add_settings_section(
		'wpaot_pluginPage_section', 
		__( 'Settings for homepage', 'wordpress' ), 
		'wpaot_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'wpaot_page_title', 
		__( 'Title to show on holding page', 'wordpress' ), 
		'wpaot_page_title_render', 
		'pluginPage', 
		'wpaot_pluginPage_section' 
	);

	add_settings_field( 
		'wpaot_intro_text', 
		__( 'Page intro text', 'wordpress' ), 
		'wpaot_intro_text_render', 
		'pluginPage', 
		'wpaot_pluginPage_section' 
	);

	add_settings_field( 
		'wpaot_redirect_site', 
		__( 'Redirect to another location', 'wordpress' ), 
		'wpaot_redirect_site_render', 
		'pluginPage', 
		'wpaot_pluginPage_section' 
	);

	add_settings_field( 
		'wpaot_redirect_url', 
		__( 'Settings field description', 'wordpress' ), 
		'wpaot_redirect_url_render', 
		'pluginPage', 
		'wpaot_pluginPage_section' 
	);


}


function wpaot_wpaot_page_title_render(  ) { 

	$options = get_option( 'wpaot_settings' );
	?>
	<input type='text' name='wpaot_settings[wpaot_wpaot_page_title]' value='<?php echo $options['wpaot_wpaot_page_title']; ?>'>
	<?php

}


function wpaot_intro_text_render(  ) { 

	$options = get_option( 'wpaot_settings' );
	?>
	<textarea cols='40' rows='5' name='wpaot_settings[wpaot_intro_text]'> 
		<?php echo $options['wpaot_intro_text']; ?>
	</textarea>
	<?php

}


function wpaot_redirect_site_render(  ) { 

	$options = get_option( 'wpaot_settings' );
	?>
	<input type='checkbox' name='wpaot_settings[wpaot_redirect_site]' <?php checked( $options['wpaot_redirect_site'], 1 ); ?> value='1'>
	<?php

}


function wpaot_redirect_url_render(  ) { 

	$options = get_option( 'wpaot_settings' );
	?>
	<input type='text' name='wpaot_settings[wpaot_redirect_url]' value='<?php echo $options['wpaot_redirect_url']; ?>'>
	<?php

}


function wpaot_settings_section_callback(  ) { 

	echo __( 'This section description', 'wordpress' );

}


function wordpress_admin_only_theme_options_page(  ) { 

	?>
	<form action='options.php' method='post'>
		
		<h2>Wordpress Admin Only Theme</h2>
		
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>
		
	</form>
	<?php

}

?>