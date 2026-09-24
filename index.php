<?php get_header(); ?>

<?php 
    $id_blog = 5;
    $banner_blog = get_field('banner_blog',$id_blog);
    $title_banner_blog = $banner_blog['title_banner_blog'];
    $image_banner_blog = $banner_blog['image_banner_blog']['url'];

 ?>
 <?php if ($image_banner_blog): ?>
     
<!-- BLOQUE 28 -->
<section class="arch-banner g3-anima" style="background-image: url(<?php echo $image_banner_blog ?>);">
    <div class="wancho">
        <h3 class="arch-banner-title g3-move-left-0"><?php echo  $title_banner_blog ?></h3>
    </div>
</section>
 <?php endif ?>
<!-- BLOQUE 29 -->
<section class="arch-list g3-anima">
    <div class="wancho g3-move-up-1">
        <div class="arch-list-left">
            <div class="arch-list-list">

                <?php while(have_posts()):the_post(); 
                    $name_post = get_the_title();
                    $image_blog_group = get_field('image_blog_group');
                    $image_list_data = $image_blog_group['image_list']['url'];
                    $imagePlaceholder = STATIC_URL.'img/placeholder.png';

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
                        <?php if ($category_data): ?>
                            
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
                        <?php endif ?>
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
                <?php endwhile; ?>



            </div>
            <div class="arch-list-paginador">
                 <!-- pagination -->
                <?php wpex_pagination(); ?>

            </div>             
        </div>
        <?php 
            $category_posts = get_terms( array(
                'taxonomy' => 'category',
                'hide_empty' => true,
            ) );
            
         ?>        
        <div class="arch-list-right">
            <div class="arch-list-categoria">Categorías</div>
            <div class="arch-list-list-categoria">
                <?php foreach ($category_posts as $key => $item): 
                    $tax_name = $item->name;
                    $tax_slug = $item->slug;
                    $urlcat = get_term_link($tax_slug,'category');
                ?>
                <?php if ($tax_slug !== 'destacados'): ?>
                    <a href="<?php echo $urlcat ?>" class="arch-list-item-categoria"><?php echo $tax_name ?></a>
                <?php endif ?>                                                
                <?php endforeach ?>
            </div>
 
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script type="text/javascript">

    $(function(){

 

    });
</script>