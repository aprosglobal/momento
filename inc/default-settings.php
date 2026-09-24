<?php 
	
	/*** menus ***/
	function Web_menu(){
		register_nav_menus( array(
			'header-menu' => __('Header Menu' ,'donosti'),
			'footer-menu' => __('Footer Menu' ,'staff'),
			// 'social-menu' => __('Social Menu' ,'donosti')
		));
		function clean_custom_menus() {
			$menu_name = 'header-menu'; // specify custom menu slug
			if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
				$menu = wp_get_nav_menu_object($locations[$menu_name]);
				$menu_items = wp_get_nav_menu_items($menu->term_id);

				$menu_list = '' ."\n";
				$menu_list .= "\t\t\t\t". '<ul class="b16-menu">' ."\n";
				foreach ((array) $menu_items as $key => $menu_item) {
					$title = $menu_item->title;
					$url = $menu_item->url;
					$indice = $key + 1;
					$id_menu = $menu_item->ID;
					//$number = $indice <  10 ? '0'.$indice : $indice;
					$menu_list .= "\t\t\t\t\t". '<li id="b16-nav-item-'.$id_menu.'" class="b16-menu-item">'.'<span class="b16-number">'.$number.'</span><a class="b16-link-menu-'.$id_menu.' b16-link-menu" href="'. $url .'">'. $title .'</a></li>' ."\n";
				}
				$menu_list .= "\t\t\t\t". '</ul>' ."\n";
				$menu_list .= "\t\t\t". '' ."\n";
			} else {
				// $menu_list = '<!-- no list defined -->';
			}
			echo $menu_list;
		}
		function menu_footer() {
			$menu_footer_nosotros = 'footer-menu'; // specify custom menu slug
			if (($locations = get_nav_menu_locations()) && isset($locations[$menu_footer_nosotros])) {
				$menu = wp_get_nav_menu_object($locations[$menu_footer_nosotros]);
				$menu_items = wp_get_nav_menu_items($menu->term_id);

				$menu_list = '' ."\n";
				$menu_list .= "\t\t\t\t". '<ul class="f-left-down">' ."\n";
				foreach ((array) $menu_items as $key => $menu_item) {
					$title = $menu_item->title;
					$url = $menu_item->url;
					$id_menu = $menu_item->ID;
					$menu_list .= "\t\t\t\t\t". '<li id="f-menu-item-'.$id_menu.'" class="f-nav-item"><a class="f-item-down f-link-'.$id_menu.'" href="'. $url .'">'. $title .'</a></li>' ."\n";
				}
				$menu_list .= "\t\t\t\t". '</ul>' ."\n";
				$menu_list .= "\t\t\t". '' ."\n";
			} else {
				// $menu_list = '<!-- no list defined -->';
			}
			echo $menu_list;
		}

	}
	add_action('init', 'Web_menu' );


	//quitar etiquetas span del formtcontact 7
	add_filter('wpcf7_form_elements', function($content) {
	    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

	    return $content;
	});



	// add class to body with name page
	add_filter( 'body_class', 'class_for_page' );
	function class_for_page( $classes ) {

		if ( is_singular( 'page' ) ) {
			global $post;
			$classes[] = 'page-' . $post->post_name;
		}

		return $classes;

	}


	// para resolver el problema de imagenes muy grandes
	add_filter( 'wp_image_editors', 'change_graphic_lib' );
		function change_graphic_lib($array) {
		return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
	}



	// para que editor vea los mensajes de flamingo
	remove_filter( 'map_meta_cap', 'flamingo_map_meta_cap' );
	add_filter( 'map_meta_cap', 'mycustom_flamingo_map_meta_cap', 9, 4 );
	function mycustom_flamingo_map_meta_cap( $caps, $cap, $user_id, $args ) {
	    $meta_caps = array(
		
			'flamingo_edit_contact' => 'edit_posts',
			'flamingo_edit_contacts' => 'edit_posts',
			'flamingo_delete_contact' => 'edit_posts',
			'flamingo_edit_inbound_message' => 'publish_posts',
			'flamingo_edit_inbound_messages' => 'publish_posts',
			'flamingo_delete_inbound_message' => 'publish_posts',
			'flamingo_delete_inbound_messages' => 'publish_posts',
			'flamingo_spam_inbound_message' => 'publish_posts',
			'flamingo_unspam_inbound_message' => 'publish_posts',
			'flamingo_edit_outbound_message' => 'publish_posts',
			'flamingo_edit_outbound_messages' => 'publish_posts',
			'flamingo_delete_outbound_message' => 'publish_posts',
		);

	    $caps = array_diff( $caps, array_keys( $meta_caps ) );

	    if ( isset( $meta_caps[$cap] ) )
	        $caps[] = $meta_caps[$cap];

	    return $caps;
		}
	// para que editor vea los mensajes de flamingo



    // Add custom taxonomy terms to body class
	    // function section_taxonomy_in_body_class( $classes ){
	    //   if( is_singular() )
	    //   {
	    //     global $post;
	    //     $custom_terms = get_the_terms($post->ID, 'servicio');
	    //     if ($custom_terms) {
	    //       foreach ($custom_terms as $custom_term) {
	    //         $classes[] = 'servicio_' . $custom_term->slug;
	    //       }
	    //     }
	    //   }
	    //   return $classes;
	    // }
	    // add_filter( 'body_class', 'section_taxonomy_in_body_class' );



	// custom css al admin
	add_action( 'admin_enqueue_scripts', 'agregar_hoja_estilos_admin' );

	function agregar_hoja_estilos_admin() {
		wp_register_style('icon-awesome', get_template_directory_uri() . '/static/font-awesome-4.7.0/css/font-awesome.min.css', array(), '1.0' );
		wp_register_style('styles_admin', get_template_directory_uri() . '/static/css/admin.css', array(), '2.3' );
	    wp_enqueue_style('icon-awesome');
	    wp_enqueue_style('styles_admin');
	}

	//custom js al admin
	function custom_admin_js() {
	    $url = get_bloginfo('template_directory') . '/static/js/admin.js?vs=1.1';
	    echo '"<script type="text/javascript" src="'. $url . '"></script>"';
	}
	add_action('admin_footer', 'custom_admin_js');


	// Add role user as class to body
	function classuser(){
		$current_user = new WP_User(get_current_user_id());
		$user_role = array_shift($current_user->roles);
		$classadmin = ' user-tipo-'. $user_role;
		echo '<script type="text/javascript">var classbody = document.getElementsByTagName("BODY")[0];classbody.className += "' .$classadmin.'";</script>';

	}
	add_action('admin_footer', 'classuser');


	// agregando enlaces al admin
	    // add_action( 'admin_menu', 'linked_url' );
	    // function linked_url() {
	    // 	add_menu_page( 'linked_url', 'Ir a Blog', 'read', 'slug_ir_ablog', '', 'dashicons-welcome-write-blog', 28 );
	    // 	add_menu_page( 'linked_url', 'Informacion de Contacto', 'read', 'slug_info', '', 'dashicons-images-alt', 29 );
	    // }

	    // add_action( 'admin_menu' , 'linkedurl_function' );
	    // function linkedurl_function() {
	    // 	$site = get_site_url();
		   //  global $menu;
		   //  $menu[28][2] = "http://svcperu.com/blog/wp-admin/";
		   //  $menu[29][2] = $site . "/wp-admin/post.php?post=247&action=edit";



	    // }




	// ocultar opciones en escritorio wp
	function quita_cajas_escritorio() {

		remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Ahoramismo
	    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Comentarios recientes
	    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Enlaces entrantes
	    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
	    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Publicación rápida
	    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Borradores recientes
	    remove_meta_box('dashboard_primary', 'dashboard', 'side');   // Noticas del blog de WordPress
	    remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Otras noticias de WordPress
	// utiliza 'dashboard-network' como segundo parámetro para quitar cajas del escritorio de red.

	} 
	add_action('wp_dashboard_setup', 'quita_cajas_escritorio' );


	// create automatically user editor
	add_action('init', 'add_user_editor');
	function add_user_editor() {
	    $username = 'editor-web';
	    $email = 'noreply@editorweb.pe';
	    $password = '123proyecto123';

	    $user_id = username_exists( $username );
	    if ( !$user_id && email_exists($email) == false ) {
	        $user_id = wp_create_user( $username, $password, $email );
	        if( !is_wp_error($user_id) ) {
	            $user = get_user_by( 'id', $user_id );
	            $user->set_role( 'editor' );
	        }
	    }
	}	
	// create automatically user editor

?>