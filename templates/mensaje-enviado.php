<?php get_header(); 
    /* Template Name: Mensaje Enviado */
?>

<?php while(have_posts()):the_post(); 

	$image_message_data = get_field('image_message');
    $image_message = $image_message_data['url'];

    $title_message = get_field('title_message');
    $description_message = get_field('description_message');

?>

<!-- BLOQUE 17 -->
<section class="b17 g3-anima">
    <div class="wancho">
        <div class="b17-left g3-move-left-1">
            <h3 class="b17-title"><?php echo $title_message ?></h3>
            <div class="b17-description">
                <?php echo $description_message ?>
            </div>
            <div class="g0-cnt-btn">
                <a href="<?php echo get_site_url() ?>" class="g0-btn br"><i class="icon-fleha-left"></i>Regresar al home</a>
            </div>
        </div>
        <div class="b17-right g3-move-right-1" style="background-image: url('<?php echo $image_message ?>');"></div>
    </div>
</section>


<?php endwhile; ?>

<?php get_footer() ?>