<?php get_header(); 
    /* Template Name: Arquitectos */
?>

<?php while(have_posts()):the_post(); 
	$title_architects = get_field('title_architects');
?>



<?php 
    $argsArchitects = array(
        'post_type'   => 'arquitectos',
        'order'       => 'ASC',
        'orderby'     => 'modified',            
        'posts_per_page'  => -1,
    );
    $architectsList = new WP_Query($argsArchitects);

 ?>

<?php if ($architectsList->have_posts()): ?>
    
<!-- BLOQUE 47 -->
<section class="b47 g3-anima">
    <div class="wancho">
        <h3 class="b47-title-top g3-move-up-1"><?php echo $title_architects ?></h3>
        <div class="b47-bottom">
            <div class="b47-list g3-move-up-2">
        	    <?php 
                    while($architectsList->have_posts()):$architectsList->the_post();

                        $imagePlaceholder = STATIC_URL.'img/place-holder.png';

                    	$images_architects_group = get_field('images_architects_group');
                    	$image_architects_data = $images_architects_group['image_architects_list']['url'];

                        $image_architects = $image_architects_data ? $image_architects_data : $imagePlaceholder;

                    	$name_architects = get_the_title();

                 ?>
                <a href="<?php echo get_permalink() ?>" class="b47-item">
                    <div class="b47-foto">
                        <img src="<?php echo $image_architects ?>" alt="" width="282" height="400">
                    </div>
                    <div class="b47-text-about">
                        <h3><?php echo $name_architects ?></h3>
                    </div>
                </a>
                <?php endwhile; wp_reset_postdata();?>  
                
            </div>
        </div>
    </div>
</section>

<?php endif ?>

<?php endwhile; ?>

<?php get_footer() ?>