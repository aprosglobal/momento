<?php 

add_action( 'rest_api_init', 'custom_api_get_map' );

function custom_api_get_map() {
    register_rest_route( 'api', 'get-mapa', 
    	array(
            'methods' => 'POST',
            'callback' => 'custom_list_maps',
            // 'permission_callback' => function() {
            //     return current_user_can( 'edit_others_posts' );
            //     },                     
        )
    );
}


function custom_list_maps( $data ) {

	$jsonData = json_decode(file_get_contents('php://input'), true);


     if( isset($jsonData) ) {
          $id_disctrict = $jsonData['id_disctrict'];
    }
        
		$args = array(
			'post_type'   => 'distrito-proyecto',
			'p'   			=> $id_disctrict,
			'post_status' => 'publish',
			'posts_per_page'   => 1,
			'order'                  => 'DESC',
			'orderby'                => 'date',		
		);
 
	$district_map = new WP_Query($args);
	

if ($district_map->have_posts()) {


	$dataResult;
	while( $district_map->have_posts() ) {
		$district_map->the_post();
		$imagePlaceholder = STATIC_URL.'img/placeholder.png';
		$image_district_data = get_field('image_district');
		$image_district_mobil_data = get_field('image_district_mobil');

		$image_district_data = $image_district_data['url'];

		$idPost = get_the_ID();
		$image_district = $image_district_data ? $image_district_data : $imagePlaceholder;

		$image_district_mobil = $image_district_mobil_data ? $image_district_mobil_data : $image_district;


		$dataResult = array(
			'image' => $image_district,
			'image_mobil' => $image_district_mobil,
		);

	}	

	
	$result = array(
		'status' => 200,
		'pages' => $district_map->max_num_pages,
		'message' => 'Se encontraron las siguientes resultados',
		'result' => $dataResult,
		'request' => $id_disctrict,
	);		

}else{
	$result = array(
	'status' => 404,
	'message' => 'No se encontraron resultados',
	'request' => $id_disctrict,
	'enter' =>$enter
	);				

}


	wp_reset_query();	
	return rest_ensure_response($result);

}

?>