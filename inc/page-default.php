<?php 
	// programmatically create some basic pages, and then set Home and Blog
	// setup a function to check if these pages exist
	function the_slug_exists($post_name) {
		global $wpdb;
		if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
			return true;
		} else {
			return false;
		}
	}

	// create the page Información de contacto
	


	// create the blog page
	if (isset($_GET['activated']) && is_admin()){
	    $blog_page_title = 'Blog';
	    $blog_page_content = 'This is blog page placeholder. Anything you enter here will not appear in the front end, except for search results pages.';
	    $blog_page_check = get_page_by_title($blog_page_title);
	    $blog_page = array(
		    'post_type' => 'page',
		    'post_title' => $blog_page_title,
		    'post_content' => $blog_page_content,
		    'post_status' => 'publish',
		    'post_author' => 1,
		    'post_slug' => 'blog'
	    );
	    if(!isset($blog_page_check->ID) && !the_slug_exists('blog')){
	        $blog_page_id = wp_insert_post($blog_page);
	    }
	}

	if (isset($_GET['activated']) && is_admin()){
		// Set the blog page
		$blog = get_page_by_title( 'Blog' );
		update_option( 'page_for_posts', $blog->ID );

		// Use a static front page
		$front_page = 2; // this is the default page created by WordPress
		update_option( 'page_on_front', $front_page );
		update_option( 'show_on_front', 'page' );
	}


	// change the Sample page to the home page
	if (isset($_GET['activated']) && is_admin()){
	    $home_page_title = 'Home';
	    $home_page_content = '';
	    $home_page_check = get_page_by_title($home_page_title);
	    $home_page = array(
		    'post_type' => 'page',
		    'post_title' => $home_page_title,
		    'post_content' => $home_page_content,
		    'post_status' => 'publish',
		    'post_author' => 1,
		    'ID' => 2,
		    'post_slug' => 'home'
	    );
	    if(!isset($home_page_check->ID) && !the_slug_exists('home')){
	        $home_page_id = wp_insert_post($home_page);
	    }
	}



	// create the page contactenos
	if (isset($_GET['activated']) && is_admin()){
	    $contactenos_page_title = 'Contáctenos';
	    $contactenos_page_check = get_page_by_title($contactenos_page_title);
	    $contactenos_page = array(
		    'post_type' => 'page',
		    'post_title' => $contactenos_page_title,
		    'post_status' => 'publish',
		    'post_author' => 1,
		    'post_slug' => 'contactenos'
	    );
	    if(!isset($contactenos_page_check->ID) && !the_slug_exists('contactenos')){
	        $contactenos_page_id = wp_insert_post($contactenos_page);
	    }
	}



	// create the page Generales
	if (isset($_GET['activated']) && is_admin()){
	    $generales_page_title = 'Componentes Web';
	    $generales_page_check = get_page_by_title($generales_page_title);
	    $generales_page = array(
		    'post_type' => 'page',
		    'post_title' => $generales_page_title,
		    'post_status' => 'publish',
		    'post_author' => 1,
		    'post_slug' => 'componentes-web'
	    );
	    if(!isset($generales_page_check->ID) && !the_slug_exists('componentes-web')){
	        $generales_page_id = wp_insert_post($generales_page);
	    }
	}

	// add bloques for desarrollos of the web
	
	for ($bloques=1; $bloques <= 50; $bloques++) { 
		# code...
		if (isset($_GET['activated']) && is_admin()){
		    $bloque_page_title = 'B'. $bloques;
		    $bloque_page_check = get_page_by_title($bloque_page_title,'objet', 'Componentes');
		    $bloque_page = array(
			    'post_type' => 'bloques',
			    'post_title' => $bloque_page_title,
			    'post_status' => 'publish',
			    'post_author' => 1,
			    'post_slug' => 'bloques/b'.$bloques
		    );
		    if(!isset($bloque_page_check->ID) && !the_slug_exists('bloques/b'.$bloques)){
		        $bloque_page_id = wp_insert_post($bloque_page);
		    }
		}
		
	}

	// create bloques

 

	/*** Paginador de numeros, para imprimir en html: <?php wpex_pagination(); ?> cambiar los iconos por el de su Uso **/
	if ( !function_exists( 'wpex_pagination' ) ) {
		
		function wpex_pagination() {
			
			$prev_arrow = is_rtl() ? '<i class="icon-flecha-right"></i>' : '<i class="icon-fleha-left"></i>';
			$next_arrow = is_rtl() ? '<i class="icon-fleha-left"></i>' : '<i class="icon-flecha-right"></i>';
			
			global $wp_query;
			$total = $wp_query->max_num_pages;
			$big = 999999999; // need an unlikely integer
			if( $total > 1 )  {
				 if( !$current_page = get_query_var('paged') )
					 $current_page = 1;
				 if( get_option('permalink_structure') ) {
					 $format = 'page/%#%/';
				 } else {
					 $format = '&paged=%#%';
				 }
				echo paginate_links(array(
					'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format'		=> $format,
					'current'		=> max( 1, get_query_var('paged') ),
					'total' 		=> $total,
					'mid_size'		=> 3,
					'type' 			=> 'list',
					'prev_text'		=> $prev_arrow,
					'next_text'		=> $next_arrow,
				 ) );
			}
		}
		
	};


 ?>