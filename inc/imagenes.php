<?php 
/** para agregar imagenes  ***/
function staff_images(){
	add_theme_support('post-thumbnails' ); // agregando imagenes destacadas a los posts

	// agregando tamaño de imagen personalizado:
		// add_image_size( 'imagen_somos', 670, 620, true );

	//para modificar medidas por defecto:
	// update_option( 'medium_size_w', 164); 
	// update_option( 'thumbnail_size_w', 253); 
	// update_option( 'thumbnail_size_h', 164);

	

}
add_action('after_setup_theme', 'staff_images');

/** para agregar imagenes  ***/



?>