<?php 

add_action( 'rest_api_init', 'custom_api_projects' );

function custom_api_projects() {
    register_rest_route( 'api', 'filter-projects', 
    	array(
            'methods' => 'POST',
            'callback' => 'custom_list_projects',
            // 'permission_callback' => function() {
            //     return current_user_can( 'edit_others_posts' );
            //     },                     
        )
    );
}


function custom_list_projects( $data ) {

	$jsonData = json_decode(file_get_contents('php://input'), true);


     if( isset($jsonData) ) {
          $ubigeoDistrito = $jsonData['title_district'];
          $footage_project = $jsonData['footage_project'];
          $state_project = $jsonData['state_project'];        
          $architect_select = $jsonData['architect_select'];
          $origin_project = $jsonData['origin_project'];



    }
    // distrito
    $enter = 'vacio';
    if($ubigeoDistrito && $footage_project === '' && $state_project === '' && $architect_select === ''){
    	$enter = 'ingreso al if de distrito';
    	$filter = array(
	        array(
	            'key' => 'tax_group_district_project',
	            'value' => $ubigeoDistrito,
	        ),
	    );
    }
    // distrito y tipo
    if($ubigeoDistrito && $footage_project  && $state_project === '' && $architect_select === ''){
    	$filter = array(
	    	// 'relation' => 'AND',
	        array(
	            'key' => 'tax_group_district_project',
	            'value' => $ubigeoDistrito
	        ),
	        array(
	            'key' => 'footage_project',
                'compare' => 'LIKE',
	            'value' => $footage_project
	        ),
	    );
    }


    // distrito, tipo y etapa(estaoo)
    if($ubigeoDistrito && $footage_project  && $state_project && $architect_select === ''){
    	$filter = array(
	    	// 'relation' => 'AND',
	        array(
	            'key' => 'tax_group_district_project',
	            'value' => $ubigeoDistrito
	        ),
	        array(
	            'key' => 'footage_project',
                'compare' => 'LIKE',
	            'value' => $footage_project
	        ),
	        array(
	            'key' => 'tax_group_state_project',
                'compare' => 'LIKE',
	            'value' => $state_project
	        ),
	    );
    }

    // solo arquitecto
    if($ubigeoDistrito === '' && $footage_project === ''  && $state_project === '' && $architect_select){
    	$filter = array(
	        array(
	            'key' => 'architects_list',
	            'compare' => 'LIKE',
	            'value' => $architect_select
	        ),
	    );
    }


    // arquitecto y tipo
    if($ubigeoDistrito === '' && $footage_project  && $state_project === '' && $architect_select){
    	$filter = array(
	    	// 'relation' => 'AND',
	    	array(
	            'key' => 'architects_list',
                'compare' => 'LIKE',
	            'value' => $architect_select
	        ),
	        array(
	            'key' => 'footage_project',
                'compare' => 'LIKE',
	            'value' => $footage_project
	        ),
	        
	    );
    }

    // arquitecto y etapa(estado)
    if($ubigeoDistrito === '' && $footage_project === ''  && $state_project && $architect_select){
    	$filter = array(
	    	// 'relation' => 'AND',
	        array(
	            'key' => 'architects_list',
                'compare' => 'LIKE',
	            'value' => $architect_select
	        ),
	        array(
	            'key' => 'tax_group_state_project',
                'compare' => 'LIKE',
	            'value' => $state_project
	        ),
	    );
    }

    // arquitecto y distrito
    if($ubigeoDistrito && $footage_project === ''  && $state_project === '' && $architect_select){
    	$filter = array(
	    	// 'relation' => 'AND',
	        array(
	            'key' => 'tax_group_district_project',
	            'value' => $ubigeoDistrito
	        ),

	        array(
	            'key' => 'architects_list',
                'compare' => 'LIKE',
	            'value' => $architect_select
	        ),
	    );
    }

    // arquitecto y distrito y estado
    if($ubigeoDistrito && $footage_project === ''  && $state_project && $architect_select){
    	$filter = array(
	    	// 'relation' => 'AND',
	        array(
	            'key' => 'tax_group_district_project',
	            'value' => $ubigeoDistrito
	        ),
	        array(
	            'key' => 'tax_group_state_project',
                'compare' => 'LIKE',
	            'value' => $state_project
	        ),
	        array(
	            'key' => 'architects_list',
                'compare' => 'LIKE',
	            'value' => $architect_select
	        ),
	    );
    }

    // arquitecto y distrito y tipo
    if($ubigeoDistrito && $footage_project  && $state_project === '' && $architect_select){
    	$filter = array(
	    	// 'relation' => 'AND',
	        array(
	            'key' => 'tax_group_district_project',
	            'value' => $ubigeoDistrito
	        ),
	        array(
	            'key' => 'footage_project',
                'compare' => 'LIKE',
	            'value' => $footage_project
	        ),
	        array(
	            'key' => 'architects_list',
                'compare' => 'LIKE',
	            'value' => $architect_select
	        ),
	    );
    }

    // arquitecto y estado y tipo
    if($ubigeoDistrito === '' && $footage_project && $state_project && $architect_select){
    	$filter = array(
	    	// 'relation' => 'AND',
	        array(
	            'key' => 'footage_project',
                'compare' => 'LIKE',
	            'value' => $footage_project
	        ),
	        array(
	            'key' => 'tax_group_state_project',
                'compare' => 'LIKE',
	            'value' => $state_project
	        ),
	        array(
	            'key' => 'architects_list',
                'compare' => 'LIKE',
	            'value' => $architect_select
	        ),
	    );
    }

    // distrito, tipo y etapa(estaoo) y arquitecto
    if($ubigeoDistrito && $footage_project  && $state_project && $architect_select){
    	$filter = array(
	    	// 'relation' => 'AND',
	        array(
	            'key' => 'tax_group_district_project',
	            'value' => $ubigeoDistrito
	        ),
	        array(
	            'key' => 'footage_project',
                'compare' => 'LIKE',
	            'value' => $footage_project
	        ),
	        array(
	            'key' => 'tax_group_state_project',
                'compare' => 'LIKE',
	            'value' => $state_project
	        ),
	        array(
	            'key' => 'architects_list',
                'compare' => 'LIKE',
	            'value' => $architect_select
	        ),
	    );
    }



    // solo tipo
    if($ubigeoDistrito === '' && $footage_project  && $state_project === '' && $architect_select === ''){
    	$filter = array(
	        array(
	            'key' => 'footage_project',
                'compare' => 'LIKE',
	            'value' => $footage_project
	        ),
	    );
    }

    // solo estapa
    if($ubigeoDistrito === '' && $footage_project === ''  && $state_project && $architect_select === ''){
    	$filter = array(
	        array(
	            'key' => 'tax_group_state_project',
                'compare' => 'LIKE',
	            'value' => $state_project
	        ),
	    );
    }


    // tipo y etapa(estado)
    if($ubigeoDistrito === '' && $footage_project  && $state_project && $architect_select === ''){
    	$filter = array(
	    	// 'relation' => 'AND',
	        array(
	            'key' => 'footage_project',
                'compare' => 'LIKE',
	            'value' => $footage_project
	        ),
	        array(
	            'key' => 'tax_group_state_project',
                'compare' => 'LIKE',
	            'value' => $state_project
	        ),
	    );
    }



    // distrito  y etapa(estapo)
    if($ubigeoDistrito && $footage_project === ''  && $state_project && $architect_select === ''){
    	$filter = array(
	    	// 'relation' => 'AND',
	        array(
	            'key' => 'tax_group_district_project',
	            'value' => $ubigeoDistrito
	        ),

	        array(
	            'key' => 'tax_group_state_project',
                'compare' => 'LIKE',
	            'value' => $state_project
	        ),
	    );
    }


    
		$args = array(
			'post_type'   => 'proyectos',
			'post_status' => 'publish',
			'posts_per_page'   => $origin_project === 'home' ? 8 : -1,
			'order'                  => 'DESC',
			'orderby'                => 'date',	
	        'tax_query' => array(
	        array(
	                'taxonomy'  => 'etapa-proyecto',
	                'field'     => 'slug',
	                'terms'     => 'entregados',
	                'operator'  => 'NOT IN'
	            )

	        ),			
		    'meta_query' => $filter		
		);
 
	$projects_list = new WP_Query($args);
	

if ($projects_list->have_posts()) {


	$dataResult;
	while( $projects_list->have_posts() ) {
		$projects_list->the_post();
			
		$idPost = get_the_ID();
    	$image_group_proyect = get_field('image_group_proyect');
		$image_list_projects = $image_group_proyect['image_list_projects']['url'];
		$image_hover_projects = $image_group_proyect['image_hover_projects']['url'];
		$logotipo_list_projects = $image_group_proyect['logotipo_list_projects']['url'];

		$tax_group = get_field('tax_group');
		$state_project_tax = $tax_group['state_project'];
		$name_tax = $state_project_tax->name;

		$type_project_current = $tax_group['type_project'];
		$name_type = $type_project_current->name;

		$district_project = $tax_group['district_project'];
		$name_district = get_the_title($district_project);

		$imagePlaceholder = STATIC_URL.'img/placeholder.png';
		$ubication_footage = get_field('ubication_footage');

		$dataPost = array();
		$dataPost['id'] = $idPost;
		$dataPost['project'] = get_the_title();
		$dataPost['url_project'] = get_permalink();
		$dataPost['imagen'] = $image_list_projects ? $image_list_projects : $imagePlaceholder;
		$dataPost['imagen_hover'] = $image_hover_projects;
		$dataPost['logo'] = $logotipo_list_projects;
		$dataPost['distrito'] = $name_district;
		$dataPost['direccion'] = $ubication_footage;
		$dataPost['taxonomy_etapa'] = $name_tax;
		$dataPost['type'] = $name_type;
		$dataPost['static_url'] = STATIC_URL;
		$dataPosts[] = $dataPost;
		$dataResult = $dataPosts;

	}	

	
	$result = array(
		'status' => 200,
		'pages' => $projects_list->max_num_pages,
		'message' => 'Se encontraron las siguientes resultados',
		'result' => $dataResult,
		'origin' => $origin_project,
		'request' => $ubigeoDistrito.'--'.$footage_project.'--'.$state_project.'--'.$architect_select,
	);		

}else{
	$result = array(
	'status' => 404,
	'message' => 'No se encontraron resultados',
	'request' => $ubigeoDistrito.'--'.$footage_project.'--'.$state_project.'--'.$architect_select,
	'enter' =>$enter
	);				

}


	wp_reset_query();	
	return rest_ensure_response($result);

}

?>