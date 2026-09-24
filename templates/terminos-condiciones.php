<?php get_header() 
	/* Template Name: Legales */
?>

<?php while(have_posts()):the_post();
?>

<!-- BLOQUE 28 -->
<section class="b28">
    <div class="wancho">
        <h3 class="b28-title"><?php echo the_title() ?></h3>
        <div class="b28-description">
 			<?php the_content() ?>
        </div>
    </div>
</section>


<?php endwhile; ?>

<?php get_footer() ?>