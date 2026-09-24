<?php 

add_action( 'rest_api_init', 'custom_api_get_correlativebook' );

function custom_api_get_correlativebook() {
    register_rest_route( 'api', 'get-correlative-book', 
    	array(
            'methods' => 'POST',
            'callback' => 'custom_get_correlative_book',
            // 'permission_callback' => function() {
            //     return current_user_can( 'edit_others_posts' );
            //     },                     
        )
    );
}


function custom_get_correlative_book( $data ) {
	
	$nro_correlative = get_field('nro_correlative_libro',473);

	$result = array(
		'status' => 200,
		'message' => 'Se encontraron las siguientes resultados',
		'result' => $nro_correlative,
	);		

	wp_reset_query();	
	return rest_ensure_response($result);

}

?>