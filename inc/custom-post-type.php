<?php 


/** custom post type bloques: **/

add_action('init', 'staff_proyectos' );	

function staff_proyectos(){
	$labels = array(
		'name'				=> _x('Proyectos','staff'),
		'singular_name'		=> _x('Proyectos','post type singular name','staff'),
		'menu_name'			=> _x('Proyectos','admin menu','staff'),
		'name_admin_bar'	=> _x('Proyecto','add new on admin bar','staff'),
		'add_new'			=> _x('Agregar nuevo Proyecto','Proyecto', 'staff'),
		'add_new_item'		=> __('Agregar Nuevo Proyecto', 'staff'),
		'new_item'			=> __('Nuevo Proyecto', 'staff'),
		'edit_item'			=> __('Editar Proyecto', 'staff'),
		'edit_item'			=> __('Editar Proyecto', 'staff'),
		'view_item'			=> __('Ver Proyecto', 'staff'),
		'all_items'			=> __('Todos los Proyectos', 'staff'),
		'search_items'		=> __('Buscar Proyectos', 'staff'),
		'parent_item_color'	=> __('Parent Proyectos', 'staff'),
		'not_found'			=> __('Proyecto no encontrado', 'staff'),
		'not_found_in_trash'=> __('Proyecto no encontrado en Papelera', 'staff')
	);
	$args = array(
		'labels'			=> $labels,
		'descripcion'		=> __('Descripcion.','staff'),
		'public'			=> true,
		'publicly_queryable'=> true,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'query_var'			=> true,
		'rewrite'			=> array('slug' =>'proyectos'),
		'capability_type'	=> 'post',
		'has_archive'		=> true,
		'hierarchical'		=> false,
		'menu_position'		=> 6,
		'menu_icon'			=>'dashicons-pressthis',
		'supports'			=> array('title', 'editor', 'thumbnail'),
		// 'taxonomies'		=> array('category')


	);
	register_post_type( 'proyectos', $args );
}


add_action('init', 'staff_arquitectos' );	

function staff_arquitectos(){
	$labels = array(
		'name'				=> _x('Arquitectos','staff'),
		'singular_name'		=> _x('Arquitectos','post type singular name','staff'),
		'menu_name'			=> _x('Arquitectos','admin menu','staff'),
		'name_admin_bar'	=> _x('Arquitecto','add new on admin bar','staff'),
		'add_new'			=> _x('Agregar nuevo Arquitecto','Arquitecto', 'staff'),
		'add_new_item'		=> __('Agregar Nuevo Arquitecto', 'staff'),
		'new_item'			=> __('Nuevo Arquitecto', 'staff'),
		'edit_item'			=> __('Editar Arquitecto', 'staff'),
		'edit_item'			=> __('Editar Arquitecto', 'staff'),
		'view_item'			=> __('Ver Arquitecto', 'staff'),
		'all_items'			=> __('Todos los Arquitectos', 'staff'),
		'search_items'		=> __('Buscar Arquitectos', 'staff'),
		'parent_item_color'	=> __('Parent Arquitectos', 'staff'),
		'not_found'			=> __('Arquitecto no encontrado', 'staff'),
		'not_found_in_trash'=> __('Arquitecto no encontrado en Papelera', 'staff')
	);
	$args = array(
		'labels'			=> $labels,
		'descripcion'		=> __('Descripcion.','staff'),
		'public'			=> true,
		'publicly_queryable'=> true,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'query_var'			=> true,
		'rewrite'			=> array('slug' =>'arquitectos'),
		'capability_type'	=> 'post',
		'has_archive'		=> true,
		'hierarchical'		=> false,
		'menu_position'		=> 6,
		'menu_icon'			=>'dashicons-pressthis',
		'supports'			=> array('title', 'editor', 'thumbnail'),
		// 'taxonomies'		=> array('category')


	);
	register_post_type( 'arquitectos', $args );
}


add_action('init', 'staff_distrito_proyecto' );	

function staff_distrito_proyecto(){
	$labels = array(
		'name'				=> _x('Distritos Proyectos','staff'),
		'singular_name'		=> _x('Distritos Proyectos','post type singular name','staff'),
		'menu_name'			=> _x('Distritos Proyectos','admin menu','staff'),
		'name_admin_bar'	=> _x('Distrito Proyecto','add new on admin bar','staff'),
		'add_new'			=> _x('Agregar nuevo Distrito Proyecto','Distrito Proyecto', 'staff'),
		'add_new_item'		=> __('Agregar Nuevo Distrito Proyecto', 'staff'),
		'new_item'			=> __('Nuevo Distrito Proyecto', 'staff'),
		'edit_item'			=> __('Editar Distrito Proyecto', 'staff'),
		'edit_item'			=> __('Editar Distrito Proyecto', 'staff'),
		'view_item'			=> __('Ver Distrito Proyecto', 'staff'),
		'all_items'			=> __('Todos los Distritos Proyectos', 'staff'),
		'search_items'		=> __('Buscar Distritos Proyectos', 'staff'),
		'parent_item_color'	=> __('Parent Distritos Proyectos', 'staff'),
		'not_found'			=> __('Distrito Proyecto no encontrado', 'staff'),
		'not_found_in_trash'=> __('Distrito Proyecto no encontrado en Papelera', 'staff')
	);
	$args = array(
		'labels'			=> $labels,
		'descripcion'		=> __('Descripcion.','staff'),
		'public'			=> true,
		'publicly_queryable'=> true,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'query_var'			=> true,
		'rewrite'			=> array('slug' =>'distrito-proyecto'),
		'capability_type'	=> 'post',
		'has_archive'		=> true,
		'hierarchical'		=> false,
		'menu_position'		=> 6,
		'menu_icon'			=>'dashicons-pressthis',
		'supports'			=> array('title', 'editor', 'thumbnail'),
		// 'taxonomies'		=> array('category')


	);
	register_post_type( 'distrito-proyecto', $args );
}

/** custom post type bloques **/

 





/** ejemplo de custom post type **/


// add_action('init', 'mqrental_productos' );	

// function mqrental_productos(){
// 	$labels = array(
// 		'name'				=> _x('Productos','mqrental'),
// 		'singular_name'		=> _x('Productos','post type singular name','mqrental'),
// 		'menu_name'			=> _x('Línea de Maquinarias','admin menu','mqrental'),
// 		'name_admin_bar'	=> _x('Producto','add new on admin bar','mqrental'),
// 		'add_new'			=> _x('Agregar nuevo producto','producto', 'mqrental'),
// 		'add_new_item'		=> __('Agregar Nuevo Producto', 'mqrental'),
// 		'new_item'			=> __('Nuevo Producto', 'mqrental'),
// 		'edit_item'			=> __('Editar Producto', 'mqrental'),
// 		'edit_item'			=> __('Editar Producto', 'mqrental'),
// 		'view_item'			=> __('Ver Producto', 'mqrental'),
// 		'all_items'			=> __('Todos los Productos', 'mqrental'),
// 		'search_items'		=> __('Buscar Productos', 'mqrental'),
// 		'parent_item_color'	=> __('Parent Productos', 'mqrental'),
// 		'not_found'			=> __('Producto no encontrado', 'mqrental'),
// 		'not_found_in_trash'=> __('Producto no encontradp en Papelera', 'mqrental')
// 	);
// 	$args = array(
// 		'labels'			=> $labels,
// 		'descripcion'		=> __('Descripcion.','mqrental'),
// 		'public'			=> true,
// 		'publicly_queryable'=> true,
// 		'show_ui'			=> true,
// 		'show_in_menu'		=> true,
// 		'query_var'			=> true,
// 		'rewrite'			=> array('slug' =>'productos'),
// 		'capability_type'	=> 'post',
// 		'has_archive'		=> true,
// 		'hierarchical'		=> false,
// 		'menu_position'		=> 6,
// 		'menu_icon'			=>'dashicons-pressthis',
// 		'supports'			=> array('title', 'editor', 'thumbnail'),
// 		// 'taxonomies'		=> array('category')


// 	);
// 	register_post_type( 'productos', $args );
// }




/** ejemplo de custom post type **/


/** ejemplo de custom taxonomia (categorias) **/


	
	function project_type() {

		$labels = array(
			'name'              => _x( 'Tipo de Proyecto', 'taxonomy general name' ),
			'singular_name'     => _x( 'Tipo de Proyecto', 'taxonomy singular name' ),
			'search_items'      => __( 'Buscar Tipo de Proyecto' ),
			'all_items'         => __( 'Todas los Tipo de Proyectos' ),
			'parent_item'       => __( 'Tipo de Proyecto Padre' ),
			'parent_item_colon' => __( 'Tipo de Proyecto Padre:' ),
			'edit_item'         => __( 'Editar Tipo de Proyecto' ),
			'update_item'       => __( 'Actualizar Tipo de Proyecto' ),
			'add_new_item'      => __( 'Agregar Nuevo Tipo de Proyecto' ),
			'new_item_name'     => __( 'Nuevo Tipo de Proyecto' ),
			'menu_name'         => __( 'Tipo de Proyecto' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite' => array( 'slug' => 'tipo-proyecto' ),
		);

		register_taxonomy( 'tipo-proyecto', array( 'proyectos' ), $args );


	}
	add_action( 'init', 'project_type' );


	function project_stage() {

		$labels = array(
			'name'              => _x( 'Etapa de Proyecto', 'taxonomy general name' ),
			'singular_name'     => _x( 'Etapa de Proyecto', 'taxonomy singular name' ),
			'search_items'      => __( 'Buscar Etapa de Proyecto' ),
			'all_items'         => __( 'Todas los Etapa de Proyectos' ),
			'parent_item'       => __( 'Etapa de Proyecto Padre' ),
			'parent_item_colon' => __( 'Etapa de Proyecto Padre:' ),
			'edit_item'         => __( 'Editar Etapa de Proyecto' ),
			'update_item'       => __( 'Actualizar Etapa de Proyecto' ),
			'add_new_item'      => __( 'Agregar Nuevo Etapa de Proyecto' ),
			'new_item_name'     => __( 'Nuevo Etapa de Proyecto' ),
			'menu_name'         => __( 'Etapa de Proyecto' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite' => array( 'slug' => 'etapa-proyecto' ),
		);

		register_taxonomy( 'etapa-proyecto', array( 'proyectos' ), $args );


	}
	add_action( 'init', 'project_stage' );


/** ejemplo de custom taxonomia (categorias) **/

?>