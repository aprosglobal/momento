<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo STATIC_URL ?>css/animate.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/lightgallery/latest/css/lightgallery.css">

<?php while(have_posts()):the_post();

    $name_post = get_the_title();
    $description_architects = get_field('description_architects');
    $images_architects_group = get_field('images_architects_group');
    $logo_architects = $images_architects_group['logo_architects']['url'];
    $image_architects = $images_architects_group['image_architects']['url'];
?>

<!-- BLOQUE 49 -->
<section class="b49 g3-anima">
  <div class="wancho">
    <div class="b49-left g3-move-left-1">
      <h3 class="b49-title"><?php echo $name_post ?>
        <a href="<?php echo get_site_url().'/arquitectos-listado' ?>" class="b49-link"><i class="icon-fleha-left"></i></a>
      </h3> 
      <div class="b49-description">
        <?php echo $description_architects ?>
      </div>
      <?php if ($logo_architects): ?>
      <div class="b49-icon">
        <img src="<?php echo $logo_architects ?>" width="148" height="49" alt=""/>
      </div>
      <?php endif ?>
    </div>
    <?php if ($image_architects): ?>
    <div class="b49-right-bg g3-move-right-1" style="background-image: url('<?php echo $image_architects ?>');"></div>
    <?php endif ?>
  </div>
</section>

<?php 
    $hide_team = get_field('hide_team');
    $title_team = get_field('title_team');
    $team_list = get_field('team_list');
?>

<?php if (!$hide_team): ?>
<?php if ($team_list): ?>
<!-- BLOQUE 48 -->
<section class="b48 g3-anima">
  <div class="wancho">
    <div class="b48-top g3-move-up-1">
      <h3 class="b48-title"><?php echo $title_team ?></h3>
    </div>    
    <div class="b48-bottom g3-move-up-2">
      <div class="b48-list">
        <?php foreach ($team_list as $key => $item):
            $image_team = $item['image_team']['url'];
            $name_team = $item['name_team'];
            $charge_team = $item['charge_team'];
        ?>
        <div class="b48-item">
          <div class="b48-image">
            <img src="<?php echo $image_team ?>" width="384" height="264" alt=""/>
          </div>
          <div class="b48-cargo">
            <div class="b48-name"><?php echo $name_team ?></div>
            <div class="b48-description"><?php echo $charge_team ?></div>
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</section>
<?php endif ?>
<?php endif ?>

<?php 
    $title_project_architects = get_field('title_project_architects');
    $video_architect_group = get_field('video_architect_group');
    $image_video = $video_architect_group['image_video']['url'];
    $url_video_data = $video_architect_group['url_video'];
    $url_video = $url_video_data ? 'href="'.$url_video_data.'"' : '';
    $proyectos_architects_list = get_field('proyectos_architects_list');
?>

<?php if ($proyectos_architects_list || $image_video): ?>
    
<!-- BLOQUE 14 -->
<section class="b14 g3-anima">
    <div class="wancho">
        <h3 class="b14-title g3-move-up-1"><?php echo $title_project_architects ?></h3>
        <div class="b14-inner">
            <?php if ($image_video): ?>
            <div class="b14-left g3-move-left-2">
                <div class="b10-bg gallery-zoom" style="background-image: url('<?php echo $image_video ?>');">
                    <?php if ($url_video): ?>
                        <a <?php echo $url_video ?> class="b10-play item-gallery"><span>Play</span></a>
                    <?php endif ?>
                </div>

            </div>
            <?php endif ?>
            <?php if ($proyectos_architects_list): ?>
                
            <div class="b14-right g3-move-up-2">
                <div class="b14-all-items">
                    <?php foreach ($proyectos_architects_list  as $key => $item):
                        $image_group_proyect = get_field('image_group_proyect',$item);
                        $logotipo_list_projects = $image_group_proyect['logotipo_list_projects']['url'];
                        $ubication_footage = get_field('ubication_footage',$item);

                        $tax_group = get_field('tax_group',$item);

                        $state_project = $tax_group['state_project'];
                        $name_state = $state_project->slug;

                        $type_project = $tax_group['type_project'];
                        $name_type = $type_project->slug;

                        $district_project = $tax_group['district_project'];
                        $name_district = get_the_title($district_project);
                        $url_project = $name_state === 'entregados' ? '' : 'href="'.get_permalink($item).'"';
                    ?>
                    <a <?php echo $url_project ?> class="b14-item-project">
                        <div class="b3-info-it">
                            <div class="b3-logo-it">
                                <img src="<?php echo $logotipo_list_projects ?>" alt="" height="68" width="148">
                            </div>
                            <div class="b3-text-it">
                                <span class="b3-nombre"><?php echo $name_type ?></span>
                                <?php if ($district_project): ?>
                                <div class="b3-direccion">
                                    <div class="b3-gps">
                                        <img src="<?php echo STATIC_URL ?>img/gps.svg" height="15" alt="">
                                    </div>
                                    <p><?php echo $ubication_footage ?> <?php echo $name_district ?></p>
                                </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </a>
                    <?php endforeach ?>
                </div>
                <div class="b14-content-slider">
                    <div class="b14-slider desktop">

                    </div>
                </div>        
            </div>
            <?php endif ?>
        </div>
    </div>
</section>
<?php endif ?>

<?php 
    $title_recognition = get_field('title_recognition');
    $recognition_list = get_field('recognition_list');
?>

<?php if ($recognition_list): ?>   
<!-- BLOQUE 15 -->
<section class="b15 g3-anima">
    <div class="wancho">
        <h3 class="b15-title g3-move-up-2"><?php echo $title_recognition ?></h3>
        <div class="b8accordion g3-move-up-3">
            <?php foreach ($recognition_list as $key => $item):
                $year = $item['year'];
                $title = $item['title'];
                $description = $item['description'];
            ?>
            <div class="b8item">
                <div class="b8head b8openAccordion">
                    <!-- <div class="b8number"><span class="b8addZero">1</span>.</div> -->
                    <h2 class="b8subtitle"> <span><?php echo $year ?></span><?php echo $title ?></h2>
                </div>
                <div class="b8container">
                    <?php echo $description ?>
                </div>
            </div>
            <?php endforeach ?>
        </div>  
    </div>
</section>
<?php endif ?>

<?php endwhile; ?>
<?php get_footer(); ?>
<script src="https://cdn.jsdelivr.net/g/lightgallery,lg-autoplay,lg-thumbnail,lg-video,lg-zoom"></script>
<script type="text/javascript">
    $(function(){


      function carruselb14() {
      var b14_slide = $('.b14-item-sl').length;
      console.log('text');
          if (b14_slide >= 2) {
              // $('.b14-item').removeClass('carousel-desktop');
            $('.b14-slider').addClass('owl-carousel');
                   $('.b14-slider').owlCarousel({
                  loop: true,
                  dots: true,
                  autoplay: true, 
                  autoplayTimeout:4000, // time for slides changes
                  smartSpeed: 2000, // duration of change of 1 slide
                  responsiveClass: true,
                  animateIn: 'fadeIn',
                  nav:true,
                  animateOut: 'fadeOut',
                  navText: ['<span class="icon-fleha-left"></span>', '<span class="icon-flecha-right"></span>'],
                  onInitialized: animate,
                  responsive: {
                      0: {
                          items: 1
                      }
                  }
              });

              function animate(event) {
                  $('.b14-slider .owl-item.active').find('.b14-item-sl').addClass('animate');
              }

              $('.b14-slider').on('changed.owl.carousel', function(property) {
                  var current = property.item.index;
                  $('.b14-slider .b14-item-sl').removeClass('animate');
                  $(property.target).find(".owl-item").eq(current).find('.b14-item-sl').addClass('animate');

              });
              
          } else {
              $(window).on('load', function(event) {
                  $('.b14-item-sl').addClass('animate');

                  /* Act on the event */
              });
          }

      };

        let items = $(".b14-item-project");
        let grupode = 3
        for(let i = 0; i < items.length; i+=grupode) {
          items.slice(i, i+grupode).appendTo('.b14-slider').wrapAll('<div class="b14-item-sl"></div>');
        };
        carruselb14();


        // +++ ACOORDION +++
        $('.b8item').eq(0).find('.b8head').addClass('active');
        var OpenSubmenu = $('.b8head.active');
        if (OpenSubmenu.hasClass('active')) {
            $('.b8container').hide();
            OpenSubmenu.closest('.b8item').find('.b8container').show();
        };
        $('.b8openAccordion').click(function(e){
            e.preventDefault();
            if ($(this).hasClass('active')) {
                $(this).removeClass('active').parent().find('.b8container').stop().slideUp();
            }else{
                $('.b8head').removeClass('active');
                $('.b8container').stop().slideUp();
                $(this).addClass('active').parent().find('.b8container').stop().slideToggle();
            };
        });
        // <<< END >>>

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

    });
</script>