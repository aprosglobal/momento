<?php get_header(); ?>
 
<?php 

    $image_error_page_data = get_field('image_error_page',388);
    $image_error_page = $image_error_page_data['url'];

    $title_error_page = get_field('title_error_page',388);
    $description_error_page = get_field('description_error_page',388);

?>

<!-- BLOQUE 17 -->
<section class="b17 g3-anima">
    <div class="wancho">
        <div class="b17-left g3-move-left-1">
            <h3 class="b17-title"><?php echo $title_error_page ?></h3>
            <div class="b17-description">
                <?php echo $description_error_page ?>
            </div>
            <div class="g0-cnt-btn">
                <a href="<?php echo get_site_url() ?>" class="g0-btn br"><i class="icon-fleha-left"></i>Regresar al home</a>
            </div>
        </div>
        <div class="b17-right g3-move-right-1" style="background-image: url('<?php echo $image_error_page ?>');"></div>
    </div>
</section>

<?php get_footer() ?>