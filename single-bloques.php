<?php get_header(); ?>
<?php 
	$enlace_actual = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	$enlace_actual = explode("/", $enlace_actual);
	// print_r($enlace_actual);

	require get_template_directory() . '/blocks/'.$enlace_actual[4].'.php';

 
?>

<?php get_footer(); ?>