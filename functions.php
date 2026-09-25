<?php 

	require get_template_directory() . '/inc/page-default.php';
	require get_template_directory() . '/inc/imagenes.php';
	require get_template_directory() . '/inc/custom-post-type.php';
	require get_template_directory() . '/inc/default-settings.php';
	require get_template_directory() . '/api/projects-home.php';
	require get_template_directory() . '/api/get-correlative-book.php';
	require get_template_directory() . '/api/get-map-district.php';
	
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => __('Configuración Web', 'swiss'),
            'menu_title' => __('Configuración Web', 'swiss'),
            'menu_slug' => 'settings-web',
            'capability' => 'publish_posts',
            'redirect' => false,
            'position' => 8
        ));
    }


	define('STATIC_URL', get_template_directory_uri() . '/static/');
	function load_scripts(){
	    wp_enqueue_script('jquery'); # Loading the WordPress bundled jQuery version.
	    //may add more scripts to load like jquery-ui
	}
	add_action('wp_enqueue_scripts', 'load_scripts');
	// estilos y scripts
	function staff_styles(){
		//bxslider
		wp_register_style('ow-slider', get_template_directory_uri() . '/static/js/owl-carousel/owl.carousel.css', array(), '1.0' );
		wp_register_style('validate', get_template_directory_uri() . '/static/js/validationform/validationEngine.jquery.css', array(), '1.0' );
		// registrando estilo principal
		wp_register_style('styles', get_template_directory_uri() . '/static/css/styles.css', array(), '1.0.2' );
		wp_register_style('block_styles', get_template_directory_uri() . '/static/css/blocks_styl.css', array(), '1.0.6' );
		wp_register_style('custom_styles', get_template_directory_uri() . '/static/css/custom.css', array('block_styles'), '1.0.0' );
		//llamando estilo registrado
		wp_enqueue_style('ow-slider');
		wp_enqueue_style('validate');
		wp_enqueue_style('styles');
		wp_enqueue_style('block_styles');
		wp_enqueue_style('custom_styles');
		//registrar librerias js
		//jquery 1.8.3
		// wp_register_script('jquery3-2-1', get_template_directory_uri() . '/static/js/jquery-3.2.1.min.js', array(), '3.2.1');

		wp_register_script('alert-js', 'https://cdn.jsdelivr.net/npm/sweetalert2@10', array(), '2.0.0');
		wp_register_script('owcarrucel-js', get_template_directory_uri() . '/static/js/owl-carousel/owl.carousel.js', array(), '2.3');
		wp_register_script('validatejs', get_template_directory_uri() . '/static/js/validationform/jquery.validationEngine.js', array(), '1.0');
		wp_register_script('main', get_template_directory_uri() . '/static/js/main.js', array(), '1.0');

		//main
		// llamando los js
		// wp_enqueue_script('jquery3-2-1');
		wp_enqueue_script('owcarrucel-js');
		wp_enqueue_script('validatejs');
		wp_enqueue_script('alert-js');
		wp_enqueue_script('main');


		// para que no recargue los comentarios
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}		
		// para que no recargue los comentarios	
		
	}
	add_action('wp_enqueue_scripts','staff_styles' );

	function my_add_filepath_to_flamingo($result){

		$form_book = $result['contact_form_id'];
		// $value_order_status = 'prueba - flamingo' .json_encode( $result ).'--'.json_encode($form_book);
		if ($form_book === 477) {
			$nro_comprobante = get_field('nro_correlative_libro',473);

			$field_correlative_book = "field_62483b5ce992a";
			$value_correlative_book = $nro_comprobante + 1;
			update_field($field_correlative_book, $value_correlative_book, 473);
		}


	}
	add_action('wpcf7_after_flamingo', 'my_add_filepath_to_flamingo');

	//removiendo emojis
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');		
	//removiendo emojis

?>