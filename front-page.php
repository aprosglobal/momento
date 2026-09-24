<?php get_header() ?>
<link rel="stylesheet" href="<?php echo STATIC_URL ?>css/animate.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/lightgallery/latest/css/lightgallery.css">

<?php while(have_posts()):the_post();
    $banner_list_home = get_field('banner_list_home');
?>

<?php if ($banner_list_home): ?>
<!-- BLOQUE 1 -->
<section class="b1">
    <div class="b1-content-slider">
        <div class="b1-slider">
            <?php
                // var_dump($banner_list_home);
            ?>
            <?php foreach ($banner_list_home as $key => $item):
                $image_desktop = $item['images_group']['image_desktop']['url'];
                $image_mobile_data = $item['images_group']['image_mobile']['url'];
                $image_mobile = $image_mobile_data ? $image_mobile_data : $image_desktop;

                $title_image = $item['title_banner'];

                $link_home_data = $item['url_banner'];
                $link_text = $link_home_data ? $link_home_data['title'] : null;
                $link_url = $link_home_data ? $link_home_data['url'] : null;
                $target_link_data = $link_home_data ? $link_home_data['target'] : null;
                $target_link = $target_link_data === '_blank' ? 'target="_blank"':'';
            ?>
            <div>
                <div class="b1-item-sl" data-image="<?php echo $image_desktop.';'.$image_mobile; ?>">
                    <div class="wancho">
                        <div class="b1-text">
                            <?php if ($title_image): ?>
                                <h3 class="b1-title"><?php echo $title_image ?></h3>
                                <?php if ($link_url): ?>
                                    <div class="g0-cnt-btn center">
                                        <!--<a href="<?php //echo $link_url ?>" <?php //echo $target_link ?> class="b1-link"> <i class="icon-flecha-right"></i><span><?php //echo $link_text ?></span></a>-->
                                        <a class="b1-link" href="<?php echo $link_url;?>">
                                            <i class="icon-flecha-right"></i>
                                            <span><?php echo html_entity_decode($link_text); ?></span>
                                        </a>
                                    </div>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php endif ?>

<?php
	$title_home_us = get_field('title_home_us',60);
	$description_home_us = get_field('description_home_us',60);
	$video_group_home_us = get_field('video_group_home_us',60);
	$image_video = $video_group_home_us['image_video']['url'];
    $url_video_data = $video_group_home_us['url_video'];
    $url_video = $url_video_data ? 'href="'.$url_video_data.'"' : '';

    $image_home_us_data = get_field('image_home_us',60);
    $image_home_us = $image_home_us_data['url'];
?>

<!-- BLOQUE 2 -->
<section class="b2 g3-anima">
    <div class="wancho">
        <div class="b6-union-1 g3-move-left-1">
            <img src="<?php echo STATIC_URL ?>img/union-left.png" alt="" width="57" height="57">
        </div>
        <div class="b6-union-2 g3-move-right-1">
            <img src="<?php echo STATIC_URL ?>img/union-right.png" alt="" width="57" height="57">
        </div>
        <div class="b6-wrap">
            <div class="b6-left g3-move-left-0">
                <div class="b6-text-top">
                    <div class="b6-title">
                        <?php echo $title_home_us ?>
                    </div>
                </div>
                <div class="b6-description">
                    <?php echo $description_home_us ?>
                </div>
                <?php if ($image_video): ?>
                <div class="b2-video">
                    <div class="b10-bg gallery-zoom" style="background-image: url('<?php echo $image_video ?>');">
                    	<?php if ($url_video): ?>
                        <a <?php echo $url_video ?> class="b10-play item-gallery"><span>Play</span></a>
                    	<?php endif ?>
                    </div>
                </div>
                <?php endif ?>
            </div>
            <?php if ($image_home_us): ?>
            <div class="b6-right g3-move-right-0">
                <div class="b6-bg" style="background-image: url('<?php echo $image_home_us ?>');"></div>
            </div>
            <?php endif ?>
        </div>
    </div>
</section>







<?php
    // Obtener el título (esto estaba bien)
    $title_projects_home = get_field('title_projects_home');

    // 1. OBTENER LOS IDs DE LOS PROYECTOS SELECCIONADOS DESDE EL CAMPO ACF
    $proyectos_seleccionados_ids = get_field('projects_home');

    // 2. VERIFICAR SI SE HAN SELECCIONADO PROYECTOS
    //    Si la variable tiene datos, continuamos.
    if ( $proyectos_seleccionados_ids ):

        // 3. DEFINIR LOS ARGUMENTOS PARA LA CONSULTA
        $args = array(
            'post_type'       => 'proyectos',
            'posts_per_page'  => -1, // Mostramos TODOS los proyectos seleccionados (-1)
            'post__in'        => $proyectos_seleccionados_ids, // Usamos los IDs de ACF aquí
            'orderby'         => 'post__in', // Mantenemos el orden en que se seleccionaron
   // 'tax_query'       => array(
            //     array(
            //         'taxonomy'  => 'etapa-proyecto',
            //         'field'     => 'slug',
            //         'terms'     => 'entregados',
            //         'operator'  => 'NOT IN' // Mantenemos tu filtro de no mostrar "entregados"
            //     )
            // ),
        );

        // 4. EJECUTAR LA CONSULTA
        $proyectos = new WP_Query($args);

        // AHORA TU HTML Y EL LOOP PUEDEN IR DENTRO DE ESTE "IF"
        // Así, la sección completa solo se muestra si hay proyectos para mostrar.
?>

<!-- BLOQUE 3 -->
<section class="b3 g3-anima">
    <div class="wancho">
        <h3 class="b3-title g3-move-up-0">
            <?php echo $title_projects_home ?>
        </h3>

        <!-- Tu sección de filtros (selects) se mantiene igual -->
        <div class="b3-wrap-select g3-move-up-1">
            <!-- ... (todo tu código de los <select> va aquí sin cambios) ... -->
             <div class="b3-inner-select">
                <?php
                    $argsDist = array(
                        'post_type'   => 'distrito-proyecto',
                        'order'       => 'ASC',
                        'orderby'     => 'modified',
                        'posts_per_page'  => -1,
                    );
                    $districtsList = new WP_Query($argsDist);

                ?>

                <div class="b3-select">
                    <select class="b3-select-distrito b3-select-filter">
                        <option value="">Ubicación</option>
                        <?php
                            while($districtsList->have_posts()):$districtsList->the_post();
                                $current_id = get_the_ID();

                                $title_district = get_field('title_district');
                        ?>
                        <option value="<?php echo $current_id ?>"><?php echo $title_district ?></option>
                        <?php endwhile; wp_reset_postdata();?>
                    </select>
                </div>
                <?php
                    $tax_state_project = get_terms( array(
                        'taxonomy' => 'etapa-proyecto',
                        'hide_empty' => true,
                    ) );

                ?>
                <div class="b3-select">
                    <select class="b3-select-stage b3-select-filter">
                        <option value="">Etapa</option>
                        <?php foreach ($tax_state_project as $key => $item):
                            $tax_name = $item->name;
                            $tax_slug = $item->slug;
                            $tax_id = $item->term_id;
                        ?>
                        <?php if ($tax_slug !== 'entregados'): ?>
                            <option value="<?php echo $tax_id ?>"><?php echo $tax_name ?></option>
                        <?php endif ?>
                        <?php endforeach ?>
                    </select>
                </div>
                <?php
                    $meters_data = array();
                    $argsMeters = array(
                        'post_type'   => 'proyectos',
                        'order'       => 'ASC',
                        'orderby'     => 'modified',
                        'posts_per_page'  => -1,
                    );
                    $proyectos_meters = new WP_Query($argsMeters);
                    while($proyectos_meters->have_posts()):$proyectos_meters->the_post();
                    $footage_project = get_field('footage_project');
                    array_push($meters_data, $footage_project);
                    endwhile; wp_reset_postdata();
                    $meters_list = array_unique($meters_data);
                ?>
                <div class="b3-select">
                    <select class="b3-select-footage b3-select-filter">
                        <option value="">Metraje</option>
                        <?php foreach ($meters_list as $key => $item): ?>
                            <?php if ($item): ?>

                            <option value="<?php echo $item ?>"><?php echo $item ?> m²</option>
                            <?php endif ?>

                        <?php endforeach ?>
                    </select>
                </div>
                <?php
                    $argsArchitects = array(
                        'post_type'   => 'arquitectos',
                        'order'       => 'ASC',
                        'orderby'     => 'modified',
                        'posts_per_page'  => -1,
                    );
                    $architectsList = new WP_Query($argsArchitects);

                ?>
                <div class="b3-select">
                    <select class="b3-select-architects b3-select-filter">
                        <option value="">Arquitectos</option>
                        <?php
                            while($architectsList->have_posts()):$architectsList->the_post();
                                $name_architects = get_the_title();
                                $id_arquitects = get_the_ID();

                        ?>
                        <option value="<?php echo $id_arquitects ?>"><?php echo $name_architects ?></option>
                        <?php endwhile; wp_reset_postdata();?>
                    </select>
                </div>
            </div>
            <div class="b3-wrap-clearfilters" style="display:none">
                <a href="" class="b3-clear-filter"><span><?php _e('Limpiar Filtros', 'staff'); ?></span> <i class="icon-close"></i></a>
            </div>
        </div>

        <div class="b3-listado" id="b3-list-project-filter">
            <!-- Este div se llenará con los resultados de los filtros (AJAX) -->
        </div>

        <div class="b3-listado-default" id="b3-list-project-default">
            <div class="b3-listado g3-move-up-2">
                <?php
                // El loop ahora itera sobre los proyectos seleccionados
                while($proyectos->have_posts()): $proyectos->the_post();
                    // ... (tu código para mostrar cada item del proyecto va aquí sin cambios) ...
                    $imagePlaceholder = STATIC_URL.'img/placeholder.png';
                    $image_group_proyect = get_field('image_group_proyect');
                    $logotipo_list_projects = $image_group_proyect['logotipo_list_projects']['url'];
                    $image_hover_projects = $image_group_proyect['image_hover_projects']['url'];
                    $image_list_projects_data = $image_group_proyect['image_list_projects']['url'];
                    $image_list_projects = $image_list_projects_data ? $image_list_projects_data : $imagePlaceholder;

                    $tax_group = get_field('tax_group');
                    $state_project_tax = $tax_group['state_project'];
                    $name_tax = $state_project_tax->name;

                    $type_project = $tax_group['type_project'];
                    $name_type = $type_project->name;

                    $district_project = $tax_group['district_project'];
                    $name_district = get_the_title($district_project);
                    $ubication_footage = get_field('ubication_footage');
                ?>
                <a href="<?php echo get_permalink() ?>" class="b3-item">
                  <div class="b3-figura-it">
                    <span class="b3-tag"><?php echo $name_tax ?></span>
                    <div class="b3-bg" style="background-image: url('<?php echo $image_list_projects ?>');">
                    </div>
                    <div class="b3-bg-hover" style="background-image: url('<?php echo $image_hover_projects ?>');">
                    </div>
                    <div class="b3-btn">
                        <span class="b3-btn_text"><?php _e('Ver proyecto', 'staff'); ?></span>
                    </div>
                  </div>
                  <div class="b3-info-it">
                        <?php if ($logotipo_list_projects): ?>
                        <div class="b3-logo-it">
                            <img src="<?php echo $logotipo_list_projects ?>" alt="" height="68" width="148">
                        </div>
                        <?php endif ?>
                        <div class="b3-text-it">
                            <span class="b3-nombre"><?php echo $name_type ?></span>
                            <div class="b3-direccion">
                                <div class="b3-gps">
                                    <img src="<?php echo STATIC_URL ?>img/gps.svg" height="15" alt="">
                                </div>
                                <p><?php echo $ubication_footage ?> <?php echo $name_district ?></p>
                            </div>
                        </div>
                    </div>
                </a>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <?php
                $hiden_button_project = get_field('hiden_button_project');
                if(!$hiden_button_project):
            ?>
            <div class="g0-cnt-btn g3-move-up-3">
                <a href="<?php echo get_permalink(375) ?>" class="g0-btn"> <i class=""></i>más proyectos</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
    endif; // Cerramos el "if" que comprueba si había proyectos seleccionados
?>






<?php
    $title_project_architects = get_field('title_project_architects',333);
    $description_project_architects = get_field('description_project_architects',333);
    $architects_home_list = get_field('architects_home_list');

?>

<?php if ($architects_home_list): ?>

<!-- BLOQUE 23 -->
<section class="b23">
    <div class="wancho">
        <div class="b23-fila-top">
            <h3 class="b23-title"><?php echo $title_project_architects ?></h3>
            <div class="b23-description">
                <?php echo $description_project_architects ?>
            </div>
            <div class="g0-cnt-btn">
                <a href="<?php echo get_permalink(333) ?>" class="b23-link"><i class="icon-flecha-right"></i><span>Nuestros arquitectos</span></a>
            </div>
        </div>
        <div class="b23-fila-down">
            <div class="b23-content-slider">
                <div class="b23-slider">
                    <?php foreach ($architects_home_list as $key => $item):
                        $images_architects_group = get_field('images_architects_group',$item);
                        $image_architects = $images_architects_group['image_architects']['url'];

                        $number = $key+1;

                        $name_architects = get_the_title($item);
                        $description_architects_data = get_field('description_architects_home',$item);
                        $description_clean = strip_tags($description_architects_data);
                        $description_architects = substr($description_clean, 0, 138);

                    ?>

                    <div class="b23-item-sl" data-slider="<?php echo $number ?>">
                        <div class="b23-figura-it"  style="background-image: url('<?php echo $image_architects ?>');">

                        </div>
                        <div class="b23-text-it">
                            <span class="b23-name"><?php echo $name_architects ?></span>
                            <div class="b23-description-it">
                                <?php echo $description_architects_data ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <?php if ($architects_home_list): ?>
            <div class="b23-wrap">
                <div class="b23-wrap-previous">
                    <div class="b23-slider-small">
                        <?php foreach ($architects_home_list as $key => $item):
                            $images_architects_group = get_field('images_architects_group',$item);
                            $image_architects = $images_architects_group['image_architects']['url'];
                        ?>
                        <div class="b23-previous" style="background-image: url('<?php echo $image_architects ?>');"></div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <?php endif ?>
        </div>
    </div>
</section>
<?php endif ?>

<?php

    $title_blog_home = get_field('title_blog_home',5);
    $argsBlog = array(
        'post_type'       => 'post',
        'posts_per_page'  => 3

    );
    $blogList = new WP_Query($argsBlog);

?>

<?php if ($blogList->have_posts()): ?>
<section class="b5 g3-anima">
    <div class="wancho">
        <div class="b5-top g3-move-up-1">
            <h3 class="b5-title"><?php echo $title_blog_home ?></h3>
            <div class="g0-cnt-btn">
                <a href="<?php echo get_permalink(5) ?>" class="b5-link"> <i class="icon-flecha-right"></i><span>Visitar Blog</span></a>
            </div>
        </div>
        <div class="b5-down g3-move-up-2">
            <?php
                while($blogList->have_posts()):$blogList->the_post();
                    $name_post_data = get_the_title();
                    $image_blog_group = get_field('image_blog_group');
                    $image_list_data = $image_blog_group['image_list']['url'];

                    $imagePlaceholder = STATIC_URL.'img/placeholder.png';

                    $image_list = $image_list_data ? $image_list_data : $imagePlaceholder;
             ?>
            <a href="<?php echo get_permalink() ?>" class="b5-item">
                <span class="b5-date"><?php echo get_the_modified_date() ?></span>
                <div class="b5-text-it">
                    <h4 class="b5-title-it"><?php echo $name_post_data ?></h4>
                </div>
                <div class="b5-figura">
                    <div class="b5-bg" style="background-image: url('<?php echo $image_list ?>');"></div>
                </div>
            </a>
            <?php endwhile; wp_reset_postdata();?>
        </div>
    </div>
</section>
<?php endif ?>

<?php endwhile; ?>


<!-- SCRIPTS para seccion nueva -->

<article class="widgetBPTL"></article>
<script src="https://widget.bestplacetolive.com/bptl/6af41bc3cd9a"></script>

<!-- END SCRIPTS para seccion nueva -->


<?php get_footer() ?>
<script src="https://cdn.jsdelivr.net/g/lightgallery,lg-autoplay,lg-thumbnail,lg-video,lg-zoom"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">

    function changeImagePay(banners){
        var win = window.innerWidth;
        var elementImg = document.querySelectorAll(banners);

            for(var i = 0; i < elementImg.length; i++){
                var forElement = elementImg[i]
                if (forElement.hasAttribute('data-image')){
                    var dataImg = forElement.getAttribute('data-image').split(';');
                    if(win > 746){
                        forElement.style.backgroundImage = 'url('+dataImg[0]+')'
                    }
                    if(win <= 745){
                        forElement.style.backgroundImage = 'url('+dataImg[1]+')'
                    }
                } else{
                    return false
                }
            }
    };

    changeImagePay('.b1-item-sl');

    window.onresize = function(){
        changeImagePay('.b1-item-sl');

    };
    $(function(){

        function responseMessage(mensaje,type,subtitle){
          let error_img = '<img src="<?php echo STATIC_URL ?>img/error.svg" alt="" width="54" >';
          let success_img = '<img src="<?php echo STATIC_URL ?>img/check.svg" alt="" width="54">';
          Swal.fire({
              title: mensaje,
              text: subtitle,
              customClass: {
                popup: 'pop-response',
              },
              icon: type === 'success' ? 'success' : 'error',
              iconHtml: type === 'success' ? success_img : error_img,
              allowOutsideClick: false,
              showCancelButton: false,
              showConfirmButton: false,
              showCloseButton: true,
          }).then((result) => {
              // if (result && result.isDismissed && type ==='success') {

              // }
          });

        }

    let urlSite ='<?php echo get_site_url() ?>';

        $('.gallery-zoom').lightGallery({
            selector: '.item-gallery',
            getCaptionFromTitleOrAlt: false,
            thumbnail: true,
            youtubePlayerParams: {
                modestbranding: 1,
                showinfo: 0,
                rel: 0,
                controls: 1
            },
            vimeoPlayerParams: {
                byline : 0,
                portrait : 0,
                color : 'A90707'
            }
        });


      var b1_slide = $('.b1-item-sl').length;

      function carruselb1() {
          if (b1_slide >= 2) {
              // $('.b1-item').removeClass('carousel-desktop');
            $('.b1-slider').addClass('owl-carousel');
            $('.b1-slider').owlCarousel({
                  loop: true,
                  dots: true,
                  autoplay: true,
                  autoplayTimeout:6000, // time for slides changes
                  smartSpeed: 2000, // duration of change of 1 slide
                  responsiveClass: true,
                  animateIn: 'fadeIn',
                  nav:true,
                  animateOut: 'fadeOut',
                  navText: ['<span class="icon-flecha-left"></span>', '<span class="icon-flecha-right"></span>'],
                  onInitialized: animate,
                  responsive: {
                      0: {
                          items: 1
                      }
                  }
              });

              function animate(event) {
                  $('.b1-slider .owl-item.active').find('.b1-item-sl').addClass('animate');
              }

              $('.b1-slider').on('changed.owl.carousel', function(property) {
                  var current = property.item.index;
                  $('.b1-slider .b1-item-sl').removeClass('animate');
                  $(property.target).find(".owl-item").eq(current).find('.b1-item-sl').addClass('animate');

              });

          } else {
              $(window).on('load', function(event) {
                  $('.b1-item-sl').addClass('animate');

                  /* Act on the event */
              });
          }

      };
      carruselb1();

      var b23_slide = $('.b23-item-sl').length;

      function carruselb23() {
          if (b23_slide >= 2) {
              // $('.b23-item').removeClass('carousel-desktop');
            $('.b23-slider-small').addClass('owl-carousel');
            $('.b23-slider-small').owlCarousel({
              loop: true,
              dots: true,
              autoplay: false,
              touchDrag: false,
              mouseDrag: false,
              autoplayTimeout:4000, // time for slides changes
              smartSpeed: 2000, // duration of change of 1 slide
              responsiveClass: true,
              nav:false,
              autoHeight: true,
              responsive: {
                  0: {
                      items: 1
                  }
              }

            });
            $('.b23-slider-small').trigger('to.owl.carousel', 1)

            $('.b23-slider').addClass('owl-carousel');
            $('.b23-slider').owlCarousel({
                  loop: true,
                  dots: true,
                  autoplay: false,
                  autoHeight: true,
                  autoplayTimeout:4000, // time for slides changes
                  smartSpeed: 2000, // duration of change of 1 slide
                  responsiveClass: true,
                  animateIn: 'fadeIn',
                  nav:true,
                  mouseDrag: false,
                  touchDrag: false,
                  animateOut: 'fadeOut',
                  navText: ['<span class="icon-fleha-left"></span>', '<span class="icon-flecha-right"></span>'],
                  onInitialized: animate,
                  autoHeight: true,
                  responsive: {
                      0: {
                          items: 1
                      }
                  }
              });

              function animate(event) {
                  $('.b23-slider .owl-item.active').find('.b23-item-sl').addClass('animate');
              }

              $('.b23-slider').on('changed.owl.carousel', function(property) {
                  var current = property.item.index;

                  $('.b23-slider .b23-item-sl').removeClass('animate');
                  $(property.target).find(".owl-item").eq(current).find('.b23-item-sl').addClass('animate');
                  let indexSL = $(property.target).find(".owl-item").eq(current).find('.b23-item-sl').attr('data-slider');
                  console.log('indexSL',indexSL)
                  let moveTo = indexSL;

                  $('.b23-slider-small').trigger('to.owl.carousel', moveTo);
              });

          } else {
              $(window).on('load', function(event) {
                  $('.b23-item-sl').addClass('animate');

                  /* Act on the event */
              });
          }
      };
      carruselb23();

        $('.b3-select-filter').on('change', function(event) {
            let option_distrito = $('.b3-select-distrito').val();
            let option_etapa = $('.b3-select-stage').val();
            let option_metraje = $('.b3-select-footage').val();
            let option_arquitecto = $('.b3-select-architects').val();


              var distValue = $(this).val();


              if (distValue){
                  var dataFilter = {
                      "title_district":option_distrito,
                      "footage_project":option_metraje,
                      "state_project":option_etapa,
                      "architect_select":option_arquitecto,
                      "origin_project":'home'
                  }
                  console.log('dataFilter',dataFilter);
                    $.ajax({
                        url: urlSite+'/wp-json/api/filter-projects',
                        beforeSend: function () {
                            $('.g4-loading').addClass('active');
                            $('.b3-botom').hide();

                        },
                        type: 'post',
                        dataType: 'json',
                        data:JSON.stringify(dataFilter),
                        contentType: 'application/json',
                        success: function( data ) {
                          $('.g4-loading').removeClass('active');
                            console.log('data',data);
                            if (data.status === 200) {
                              let projects_list ='';
                              for(let t = 0; t < data.result.length; t++ ){
                                  let item_project = data.result[t];
                                  let type_project = item_project.type ? '<span class="b3-nombre">'+item_project.type+'</span>' : '';
                                  let logo_project = item_project.logo ? '<div class="b3-logo-it"><img src="'+item_project.logo+'" alt="" height="68" width="148" /></div>' : '';
                                   projects_list = projects_list + `
                                        <a href="${item_project.url_project}" class="b3-item">
                                            <div class="b3-figura-it">
                                                <span class="b3-tag">${item_project.taxonomy_etapa}</span>
                                                <div class="b3-bg" style="background-image: url('${item_project.imagen}');"></div>
                                                <div class="b3-bg-hover" style="background-image: url('${item_project.imagen_hover}');"></div>
                                                <div class="b3-btn">
                                                    <span class="b3-btn_text">Ver proyecto</span>
                                                </div>
                                            </div>

                                            <div class="b3-info-it">
                                                ${logo_project}
                                                <div class="b3-text-it">
                                                    ${type_project}
                                                    <div class="b3-direccion">
                                                        <div class="b3-gps">
                                                            <img src="${item_project.static_url}img/gps.svg" height="15" alt="" />
                                                        </div>
                                                        <p>${item_project.direccion} ${item_project.distrito}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                  `;
                               };
                              $('#b3-list-project-default').hide();
                              $('#b3-list-project-filter').html(projects_list)

                              if(data.pages >= 2){
                                $('.b3-botom').show();
                              }
                              $('.b3-wrap-clearfilters').show();
                              $('#b3-list-project-filter').removeAttr('style');
                            }
                            if (data.status === 404) {
                              responseMessage('No se encontrarón resultados.','error','Utilice otro criterio de búsqueda.')
                            }


                        },
                        error: function (error) {
                              responseMessage('Se produjo un error inténtalo de nuevo.','error')
                            $('.g4-loading').removeClass('active');
                        }
                    });


              }else{


              }

          });

          $('.b3-clear-filter').click(function(event) {
              event.preventDefault();
              $('#b3-list-project-default').show();
              $('#b3-list-project-filter').hide();

              $('.b3-select-distrito').prop('selectedIndex',0);
              $('.b3-select-stage').prop('selectedIndex',0);
              $('.b3-select-footage').prop('selectedIndex',0);
              $('.b3-select-architects').prop('selectedIndex',0);
              $('.b3-wrap-clearfilters').hide();

          });

    });
</script>