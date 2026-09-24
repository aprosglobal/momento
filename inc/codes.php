<?php 	

	// custom search
	function wpdocs_after_setup_theme() {
	    add_theme_support( 'html5', array( 'search-form' ) );
	}
	add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );	


	//lenght excerpt()
	function my_excerpt_length($length) {
	return 22;
	}
	add_filter('excerpt_length', 'my_excerpt_length');	


	// para capturar la ruta de la imagen personalizada
	$thumbID = get_post_thumbnail_id($list->ID);
	$imgDestacada = wp_get_attachment_image_src($thumbID, 'imagen_tratamiento');
	// para capturar la ruta de la imagen personalizada




?>


<?php 
	$itemslist = get_field('listado_items');
 ?>
<?php foreach ($itemslist as $key => $item): 
	$campo1 = $item['name_1'];
	$campo2 = $item['name_2'];
	$campo3 = $item['name_3'];
	$campo4 = $item['imagen']['sizes']['size_img'];

?>
	<div class="w-item">
		<span><?php echo $campo1 ?></span>
		<?php echo $campo2 ?>
	</div>
<?php endforeach ?>

<!-- imagen destacada -->
<?php 
	$thumbID 			= get_post_thumbnail_id(get_the_ID());
	$imgDestacada 		= wp_get_attachment_image_src($thumbID,'noticias');
?>
