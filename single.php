<?php get_header(); ?>


<?php while(have_posts()):the_post(); 
    $imagePlaceholder = STATIC_URL.'img/placeholder.png';
    $name_post = get_the_title();
    $image_blog_group = get_field('image_blog_group');
    $image_banner_data = $image_blog_group['image_banner']['url'];
    $image_banner = $image_banner_data ? $image_banner_data : $imagePlaceholder;
    $post_current_id =get_the_ID();

    $category_data = get_the_terms(get_the_ID(),'category');
    $current_category = $category_data[0]->slug;

?>

<!-- BLOQUE 36 -->

<section class="sng-banner g3-anima" style="background-image: url(<?php echo $image_banner ?>);">
    <div class="wancho">
        <div class="sng-banner-current-category">
            <?php foreach ($category_data as $key => $item): 
                $name_category = $item->name;
                $slug_category = $item->slug;
                $urlcat = get_term_link($slug_category,'category');

                ?>
                <span><?php echo $name_category.' ' ?></span>
            <?php endforeach ?>            
        </div>        
        <h3 class="sng-banner-title g3-move-left-0"><?php echo $name_post ?></h3>
    </div>
</section>

<!-- BLOQUE 37 -->
<section class="sng-cnt g3-anima">
    <div class="wancho g3-move-up-1">
        <div class="sng-cnt-left">

            <div class="sng-cnt-description">
                <?php 
                    the_content()
                 ?>

            </div>
            <div class="sng-cnt-redes">
                <div class="sng-cnt-text-red">
                    <?php _e('Compartir:', 'staff'); ?>
                </div>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink() ?>&t=<?php echo get_the_title() ?>" class="sng-cnt-item-red icon-social-facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"></a>
                <a href="https://twitter.com/share?url=<?php echo get_permalink() ?>&text=<?php echo get_the_title() ?>" class="sng-cnt-item-red icon-social-twitter" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"></a>
                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink() ?>&title=<?php echo get_the_title() ?>&source=<?php echo get_the_title() ?>" class="sng-cnt-item-red icon-social-linkedin" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"></a>
                
                <a class="sng-cnt-item-red icon-social-whatsapp" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" href="https://web.whatsapp.com/send?text=<?php echo get_the_title().' '.get_permalink() ?>"></a>


            </div>

            <div class="sng-cnt-banner-bottom">
                <img src="<?php echo $image_banner_bottom ?>" alt="">
            </div>
        </div>
    </div>
</section>

<!-- BLOQUE 38 -->


<?php 
    $args_related = array(
        'post_type'       => 'post',
        'posts_per_page'  => 5,   
        'order'           => 'DESC',
        'orderby'         => 'title',
        'post__not_in'    => array($post_current_id),
        'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $current_category,
            ),
        ), 

    );
    $posts_related = new WP_Query($args_related);

 ?>

<?php if ($posts_related->have_posts()): ?>
<section class="sng g3-anima">
    <div class="wancho">
        <h3 class="sng-title g3-move-up-2">
            <?php _e('Noticias relacionadas', 'staff'); ?>
        </h3>
        <div class="sng-list g3-move-up-3">
            <div class="sng-slider desktop">
            <?php 
                while($posts_related->have_posts()):$posts_related->the_post(); 
                    $name_post = get_the_title();
                    $image_blog_group = get_field('image_blog_group');
                    $image_list_data = $image_blog_group['image_list']['url'];

                    $image_list = $image_list_data ? $image_list_data : $imagePlaceholder;

                    $description_data = get_the_content();
                    $description_clean = strip_tags($description_data);
                    $description = substr($description_clean, 0, 100);
                    $post_current_id =get_the_ID();
                    $category_data = get_the_terms($post_current_id,'category');
             ?>
             
                <div class="arch-list-item-left">
                    <a href="<?php echo get_permalink() ?>" class="arch-list-figura">
                        <div class="arch-list-figura-bg" style="background-image: url(<?php echo $image_list ?>);"></div>
                    </a>
                    <div class="arch-list-texto-item">
                        <a href="" class="arch-list-title">
                        <?php foreach ($category_data as $key => $item): 
                            $name_category = $item->name;
                            $slug_category = $item->slug;
                            $urlcat = get_term_link($slug_category,'category');

                            ?>   
                                <?php if ($slug_category !== 'destacados'): ?>           
                                    <?php echo $name_category.'  ' ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        </a>
                        <a href="<?php echo get_permalink() ?>" class="arch-list-sub-title"><?php echo $name_post ?></a>
                        <div class="arch-list-description">
                            <?php echo $description.'...' ?>
                        </div>
                        <div class="arch-list-description-banner black">
                            <span>
                                <?php echo get_the_modified_date() ?>
                            </span>
                        </div>                        
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata();?>                
            </div>
        </div>
    </div>
</section>
<?php endif ?>

<?php
    $prev_post = get_previous_post(); 
    $id_prev_post = $prev_post->ID;

    $image_blog_group = get_field('image_blog_group',$id_prev_post);
    $image_list_data = $image_blog_group['image_list']['url'];
    $image_list_prev = $image_list_data ? $image_list_data : $imagePlaceholder;

?>
<?php 
    $next_post = get_next_post();
    $id_next_post = $next_post->ID;

    $image_blog_group = get_field('image_blog_group',$id_next_post);
    $image_list_data = $image_blog_group['image_list']['url'];
    $image_list_next = $image_list_data ? $image_list_data : $imagePlaceholder;
    
?> 

<!-- BLOQUE 28 -->

<section class="b30">
    <div class="b30-wrap">
        <?php if ($prev_post): ?>
        <a href="<?php echo get_permalink($id_prev_post) ?>" class="b30-item"style="background-image: url('<?php echo $image_list_prev ?>');">
            <div class="b30-text">
                <span><?php _e('Post anterior', 'staff'); ?></span>
                <h3 class="b30-title"><?php echo get_the_title($id_prev_post) ?></h3>
            </div>
        </a>
        <?php endif ?>
        <?php if ($next_post): ?>
            
        <a href="<?php echo get_permalink($id_next_post) ?>" class="b30-item"style="background-image: url('<?php echo $image_list_next ?>');">
            <div class="b30-text">
                <span><?php _e('Post siguiente', 'staff'); ?></span>
                <h3 class="b30-title"><?php echo get_the_title($id_next_post) ?></h3>
            </div>
        </a>
        <?php endif ?>
    </div>
    
</section>


<?php endwhile; ?>
<?php get_footer(); ?>

<script type="text/javascript">

    $(function(){

        // /proyecto relacionado
            var cantidadsng = $('.arch-list-item-left').length;

            function sliderOwsng(){
                $('.sng-slider').removeClass('desktop')
                $('.sng-slider').addClass('owl-carousel');
                $('.sng-slider').owlCarousel({
                    loop:true,
                    margin:20,
                    nav:true,
                    autoplay:true,
                    autoplayTimeout:3000,
                    navText:['<span class="icon-arrow-left"></span>','<span class="icon-arrow-right"></span>'],
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:2
                        },
                        769:{
                            items:2
                        },
                        
                        1001:{
                            items:3
                        }
                    }
                })
            }

            function destroyOwsng(){
                $('.sng-slider').trigger('destroy.owl.carousel');
                $('.sng-slider').addClass('desktop');
                $('.sng-slider').removeClass('owl-carousel');
            }

            if (matchMedia) {
                var mqsng = window.matchMedia("(max-width: 1000px)");
                mqsng.addListener(WidthChangesng);
                WidthChangesng(mqsng);
            }

            // media query change
            function WidthChangesng(mqsng) {
                if (mqsng.matches ) {
                        console.log('menor a 1000px');
                        if ($('.sng-slider').hasClass('owl-carousel')) {
                            // console.log('slider, ya existe');
                        }
                        else{
                            // console.log('slider, aun no existe')
                            sliderOwsng()
                    }
                }
                else {
                    console.log('mayor a 1000px');
                    if (cantidadsng >= 4) {
                        destroyOwsng()
                        sliderOwsng()
                    }
                    else{
                        destroyOwsng()
                    }
                };
            }
            // /proyecto relacionado

    });
</script>