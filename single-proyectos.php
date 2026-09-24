<?php get_header(); ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php //echo STATIC_URL 
?>js/slick/slick.css"/> -->
<link rel="stylesheet" type="text/css" href="<?php echo STATIC_URL . 'js/fancybox3/jquery.fancybox.min.css' ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/lightgallery/latest/css/lightgallery.css">
<title><?php the_title(); ?></title>
<style>
    .hidden {
        display: none;
    }
</style>

<?php while (have_posts()):
    the_post();
    $banner_intro_project_data = get_field('banner_intro_project');
    $banner_intro_project = $banner_intro_project_data['url'];
    $hide_banner = get_field('hide_banner');
    ?>

    <?php if (!$hide_banner): ?>
        <?php if ($banner_intro_project): ?>
            <!-- BLOQUE 18 -->
            <section class="b18 prueba" style="background-image: url('<?php echo $banner_intro_project ?>');">
                <div class="wancho">
                    <a aria-label="flechas" href="<?php echo get_site_url() . '/proyectos-en-venta' ?>" class="b18-back-bottom"><i
                            class="icon-fleha-left"></i></a>
                </div>
            </section>
        <?php endif ?>
    <?php endif ?>

    <?php
    $image_group_proyect = get_field('image_group_proyect');
    $logotipo_list_projects = $image_group_proyect['logotipo_list_projects']['url'];
    $title_project = get_field('title_project');
    $description_project = get_field('description_project');
    $image_project_data = get_field('image_project');
    //   $image_project = $image_project_data['image_project']['url'];
    $image_project = $image_project_data['url'];
    $since_project = get_field('since_project');
    $features_project_list = get_field('features_project_list');
    $boton_cotizar = get_field('boton_cotizar');
    $button_brochure = get_field('boton');
    $hide_presentation = get_field('hide_presentation');

    //   print_r($image_project_data);
    ?>
    <!-- <h1 class="hidden"><?php //the_title(); ?></h1> -->

    <?php if (!$hide_presentation): ?>

        <?php if ($image_project || $features_project_list): ?>

            <!-- BLOQUE 19 -->
            <section class="b19 g3-anima prueba">
                <div class="wancho">
                    <div class="b19-logo g3-move-up-0">
                        <img src="<?php echo $logotipo_list_projects ?>" alt="" height="143">
                    </div>
                    <h2 class="b19-title g3-move-up-1"><?php echo $title_project ?></h2>
                    <div class="b19-inner g3-move-up-2">
                        <div class="b19-left">
                            <div class="b19-description">
                                <?php echo $description_project ?>
                            </div>
                            <?php if ($since_project): ?>
                                <div class="b19-price">
                                    <p>Desde</p>
                                    <span><?php echo $since_project ?></span>
                                </div>
                            <?php endif ?>
                        </div>
                        <?php if ($image_project): ?>

                            <div class="b19-center">
                                <div class="b19-figura-center">
                                    <img src="<?php echo $image_project ?>" alt="" width="674">
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if ($features_project_list): ?>
                            <div class="b19-right">
                                <div class="b19-list">
                                    <?php foreach ($features_project_list as $key => $item):
                                        $icon = $item['icon']['url'];
                                        $title = $item['title']
                                            ?>
                                        <div class="b19-item">
                                            <div class="b19-fig-it">
                                                <img src="<?php echo $icon ?>" alt="" width="48" height="48">
                                            </div>
                                            <div class="b19-title-it"><?php echo $title ?></div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <div class="b19-list">
                                    <?php if ($boton_cotizar && $boton_cotizar['url'] && $boton_cotizar['title']): ?>
                                        <a href="<?php echo $boton_cotizar['url'] ?>" target="_blank" rel="noopener noreferrer"
                                            class="g0-btn ancla" aria-label="cotizar"><i class="icon-flecha-right"></i>
                                            <?php echo $boton_cotizar['title']; ?>
                                        </a>
                                    <?php else: ?>
                                        <a href="#form-cotizar" class="g0-btn ancla" aria-label="cotizar"><i
                                                class="icon-flecha-right"></i>Cotizar</a>
                                    <?php endif; ?>
                                    <?php if ($button_brochure['url']): ?>
                                        <a href="<?php echo $button_brochure['url'] ?>" download class="g0-btn ancla"
                                            aria-label="link de descarga brochure">
                                            <i class="icon-flecha-right"></i><span class="m-0">Descargar <br> Brochure</span>
                                        </a>
                                    <?php endif; ?>
                                </div>

                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </section>
        <?php endif ?>
    <?php endif ?>

    <?php
    $hide_ambientes = get_field('hide_ambientes');
    $title_environments = get_field('title_environments');
    $description_environments = get_field('description_environments');
    $environments_list = get_field('environments_list');
    ?>

    <?php if (!$hide_ambientes): ?>
        <?php if ($environments_list): ?>

            <!-- BLOQUE 20 -->
            <section class="b20 g3-anima">
                <div class="wancho">
                    <div class="b20-fila-top g3-move-up-1">
                        <h3 class="b20-title-top"><?php echo $title_environments ?></h3>
                        <div class="b20-decription-top">
                            <?php echo $description_environments ?>
                        </div>
                    </div>
                    <div class="b20-content-slider">
                        <div class="b20-slider">
                            <?php foreach ($environments_list as $key => $item):
                                $image = $item['image']['url'];
                                $title = $item['title'];
                                $description = $item['description'];
                                ?>
                                <div class="b20-item-sl" data-count="<?php echo $key + 1 ?>">
                                    <div class="b20-fila-center" style="background-image: url('<?php echo $image ?>');"></div>
                                    <div class="b20-fila-down g3-move-up-3">
                                        <div class="b20-left-down">
                                            <h4><?php echo $title ?></h4>
                                            <?php if ($description): ?>
                                                <p><?php echo $description ?>
                                                <p>
                                                <?php endif ?>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="b20-right-down">
                            <div class="b20-pager">
                                <span class="active b20-page-star">01</span>
                                <em>/</em>
                                <span class="b20-page-end"></span>
                            </div>
                            <div class="b20-control">
                                <div class="b20-prev-control"><i class="icon-fleha-left"></i></div>
                                <div class="b20-next-control"><i class="icon-flecha-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif ?>
    <?php endif ?>

    <?php
    $title_block_finish = get_field('title_block_finish');
    $images_finishes_group = get_field('images_finishes_group');
    $image_1 = $images_finishes_group['image_1']['url'];
    $image_2 = $images_finishes_group['image_2']['url'];

    $title_finish = get_field('title_finish');
    $description_finish = get_field('description_finish');
    $hide_finish = get_field('hide_finish');
    $url_video = get_field('url_video');
    ?>

    <?php if (!$hide_finish): ?>

        <?php if ($image_1 || $title_finish): ?>

            <!-- BLOQUE 50 -->
            <section class="b50 g3-anima">
                <div class="wancho">
                    <div class="b50-top g3-move-up-1">
                        <h3 class="b50-title"><?php echo $title_block_finish ?></h3>
                    </div>
                    <div class="b50-bottom g3-move-up-2">
                        <?php if ($image_1): ?>
                            <div class="b50-left">
                                <img src="<?php echo $image_1 ?>" width="376" height="444" alt="" />
                            </div>
                        <?php endif ?>
                        <div class="b50-center">
                            <h3 class="b50-center-title">
                                <?php echo $title_finish ?>
                            </h3>
                            <div class="b50-center-text">
                                <?php echo $description_finish ?>
                            </div>
                        </div>
                        <?php if ($image_2): ?>
                            <div class="b50-right gallery-zoom">
                                <img src="<?php echo $image_2 ?>" width="376" height="444" alt="" />
                                <?php if ($url_video): ?>
                                    <a aria-label="play" href="<?php echo $url_video ?>" class="b10-play item-gallery"><span>Play</span></a>
                                <?php endif ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </section>
        <?php endif ?>
    <?php endif ?>

    <?php
    $title_ubication = get_field('title_ubication');
    $iframe_map_contact = get_field('iframe_map_contact');
    $description_map = get_field('description_map');
    ?>

    <?php if ($iframe_map_contact): ?>

        <!-- BLOQUE 21 -->
        <section class="b21 g3-anima">
            <div class="wancho">
                <h3 class="b21-title g3-move-up-1"><?php echo $title_ubication ?></h3>
                <div class="b21-mapa g3-move-up-2">
                    <?php echo $iframe_map_contact ?>
                </div>
                <?php if ($description_map): ?>
                    <div class="b21_text_p">
                        <?php echo $description_map ?>
                    </div>
                <?php endif ?>
            </div>
        </section>
    <?php endif ?>

    <?php
    $title_project_architects = get_field('title_project_architects', 333);
    $description_project_architects = get_field('description_project_architects');
    $architects_list = get_field('architects_list');
    $hide_architects = get_field('hide_architects');
    ?>

    <?php if (!$hide_architects): ?>
        <?php if ($architects_list): ?>
            <!-- BLOQUE 23 -->
            <section class="b23">
                <div class="wancho">
                    <div class="b23-fila-top">
                        <h3 class="b23-title"><?php echo $title_project_architects ?></h3>
                        <div class="b23-description">
                            <?php echo $description_project_architects ?>
                        </div>
                        <div class="g0-cnt-btn">
                            <a aria-label="Nuestros arquitectos" href="<?php echo get_permalink(333) ?>" class="b23-link"><i
                                    class="icon-flecha-right"></i><span>Nuestros arquitectos</span></a>
                        </div>
                    </div>
                    <div class="b23-fila-down">
                        <div class="b23-content-slider">
                            <div class="b23-slider">
                                <?php foreach ($architects_list as $key => $item):
                                    $images_architects_group = get_field('images_architects_group', $item);
                                    $image_architects = $images_architects_group['image_architects']['url'];

                                    $number = $key + 1;

                                    $name_architects = get_the_title($item);
                                    $description_architects_data = get_field('description_architects_home', $item);
                                    $description_clean = strip_tags($description_architects_data);
                                    $description_architects = substr($description_clean, 0, 138);

                                    ?>

                                    <div class="b23-item-sl" data-slider="<?php echo $number ?>">
                                        <div class="b23-figura-it" style="background-image: url('<?php echo $image_architects ?>');">

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
                        <?php if ($architects_list): ?>
                            <div class="b23-wrap" style="display:none">
                                <div class="b23-wrap-previous">
                                    <div class="b23-slider-small">
                                        <?php foreach ($architects_list as $key => $item):
                                            $images_architects_group = get_field('images_architects_group', $item);
                                            $image_architects = $images_architects_group['image_architects']['url'];
                                            ?>
                                            <div class="b23-previous" style="background-image: url('<?php echo $image_architects ?>');">
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </section>
        <?php endif ?>
    <?php endif ?>

    <?php
    $tipology_list = get_field('tipology_list');
    $title_quote_project = get_field('title_quote_project', 'options');
    $description_form_project = get_field('description_form_project', 'options');
    $response_mailing_project = get_field('response_mailing_project', 'options');
    $hide_quote_proyect = get_field('hide_quote_proyect');
    $form_title = get_field('formulario_titulo');

    $class_center = $tipology_list ? $tipology_list : 'form-center';
    ?>


    <?php if (!$hide_quote_proyect): ?>
        <!-- BLOQUE 22 -->
        <section class="b22 g3-anima" id="form-cotizar">
            <div class="wancho <?php echo $class_center ?>">
                <?php if ($tipology_list): ?>

                    <div class="b22-left g3-move-left-1">
                        <h3 class="b22-title"><?php echo $form_title ? $form_title : $title_quote_project ?></h3>
                        <?php if ($tipology_list): ?>
                            <div class="b22-inner-left">
                                <div class="b22-content-slider">
                                    <div class="b22-slider">
                                        <?php foreach ($tipology_list as $key => $item):
                                            $tipology_group = $item['tipology_group'];
                                            $total_area = $tipology_group['tipo'];
                                            $bedrooms = $tipology_group['bedrooms'];
                                            $bathroom = $tipology_group['bathroom'];
                                            $image_plano = $tipology_group['image_plano']['url'];
                                            ?>
                                            <div class="b22-item-sl" data-slide="<?php echo $key ?>">
                                                <div class="b22-plano">
                                                    <img src="<?php echo $image_plano ?>" alt="" width="416">
                                                    <a aria-label="Iconos" href="<?php echo $image_plano ?>"
                                                        class="b22-lupa b22-big-image"><i class="icon-mas"></i></a>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif ?>
                <div class="b22-right g3-move-right-1">
                    <div class="b12-wrap-formulario">
                        <div class="b12-description-form">
                            <?php echo $description_form_project ?>
                        </div>
                        <div class="b12-formulario">
                            <form id="sd_form_project" method="post">

                                <input value="" type="hidden" name="source_id">
                                <input value="" type="hidden" name="utm_source">
                                <input value="" type="hidden" name="utm_medium">
                                <input value="" type="hidden" name="utm_campaign">
                                <input value="" type="hidden" name="utm_term">
                                <input value="" type="hidden" name="utm_content">

                                <?php if ($tipology_list): ?>
                                    <div class="g5-select g5-item-input">
                                        <select id="form-tipology-project" name="currentTipology"
                                            class="form-input validate[required] b22-select-tipology">
                                            <?php
                                            foreach ($tipology_list as $key => $item):
                                                $tipology_group = $item['tipology_group'];
                                                $dpto = $tipology_group['tipo'];
                                                $total_area = $tipology_group['total_area'];
                                                $bedrooms = $tipology_group['bedrooms'];
                                                $bathroom = $tipology_group['bathroom'];
                                                $image_plano = $tipology_group['image_plano']['url'];

                                                $currentTipology = 'Dpto. ' . $dpto . ' - ' . $bedrooms . ' dormitorios - ' . ' Área total ' . $total_area;

                                                ?>
                                                <option data-slide="<?php echo $key ?>" value="<?php echo $currentTipology ?>">
                                                    <?php echo $currentTipology ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                        <label class="input-label fijar" for="form-tipology-project"><span>Tipo</span><i
                                                class="icon-arrow-down"></i></label>
                                    </div>
                                <?php endif ?>
                                <div class="g5-input-two">
                                    <div class="g5-input g5-item-input">
                                        <input type="text" id="form_nombre" name="your-name"
                                            class="validKeypress form-input validate[required] ">
                                        <label class="input-label" for="form_nombre"><span>Nombres *</span></label>
                                    </div>
                                    <div class="g5-input g5-item-input">
                                        <input type="text" id="form_apellidos" name="your-last-name"
                                            class="validKeypress form-input validate[required] ">
                                        <label class="input-label" for="form_apellidos"><span>Apellidos*</span></label>
                                    </div>
                                </div>

                                <div class="g5-input-two">
                                    <div class="g5-input g5-item-input">
                                        <input type="text" id="form-email" name="your-email"
                                            class="validate[required,custom[email]] form-input">
                                        <label for="form-email"><span>Email *</span></label>
                                    </div>
                                    <div class="g5-input g5-item-input">
                                        <input type="text" maxlength="9" id="form_phone" name="your-phone"
                                            class="form-input soloNumber validKeypress validate[required,custom[onlyNumberSp],minSize[9],maxSize[9]]">
                                        <label class="input-label" for="form_phone"><span>Teléfono*</span></label>
                                    </div>
                                </div>
                                <div class="g5-item-input g5-textarea">
                                    <textarea id="form_consulta" name="your-message" required="required"
                                        class="form-input"></textarea>
                                    <label class="input-label" for="form_consulta"><span>¿Tienes algún
                                            comentario?</span></label>
                                </div>
                                <span class="b11required g5-required">(*) Campos obligatorios</span> <br>
                                <?php
                                $privacy_policies = get_permalink(617);
                                $terms_conditions = get_permalink(619);
                                ?>
                                <div class="g5-terminos">
                                    <input type="checkbox" checked id="form_project_privacity" class="validate[required]"
                                        name="agree-terms-privacity">
                                    <label for="form_project_privacity" class="g5-terminos_nota"><span
                                            class="g5-terminos_icon"></span>
                                        <div class="g5-terminos_text">
                                            <p>
                                                Acepto las <a aria-label="Link Políticas" class="openPopupJS" target="_blank"
                                                    href="<?php echo $privacy_policies ?>">Políticas de Privacidad </a> y <a
                                                    aria-label="Términos y condiciones"
                                                    href="<?php echo $terms_conditions ?>">Términos y Condiciones</a> de Momento
                                                Grupo Inmobiliario.</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="g0-cnt-btn">
                                    <button type="submit" class="g0-btn b12-enviar">Enviar</button>
                                </div>
                                <input type="hidden" name="your-subject" value="Formulario Detalle Proyecto">
                                <input type="hidden" name="your-project" value="<?php echo get_the_title(); ?>">
                                <input type="hidden" name="current-date" class="g5-date-input" value="">
                                <input type="hidden" name="response_mailing_project"
                                    value="<?php echo $response_mailing_project ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


<?php endwhile; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php get_footer(); ?>
<!-- <script src="<?php //echo STATIC_URL 
?>js/slick/slick.min.js"></script> -->
<script type="text/javascript" src="<?php echo STATIC_URL ?>js/jquery.waypoints.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL . 'js/fancybox3/jquery.fancybox.min.js' ?>"></script>

<script src="https://cdn.jsdelivr.net/g/lightgallery,lg-autoplay,lg-thumbnail,lg-video,lg-zoom"></script>

<script type="text/javascript">
    function responseMessage(mensaje, type, subtitle) {
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

    $(function () {

        var b20_slide = $('.b20-item-sl').length;
        let count_end = b20_slide < 10 ? '0' + b20_slide : b20_slide;
        $('.b20-page-end').text(count_end);


        function carruselb20() {
            if (b20_slide >= 2) {
                // $('.b20-item').removeClass('carousel-desktop');
                $('.b20-slider').addClass('owl-carousel');
                $('.b20-slider').owlCarousel({
                    loop: true,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 6000, // time for slides changes
                    smartSpeed: 2000, // duration of change of 1 slide
                    mouseDrag: true,
                    touchDrag: true,
                    responsiveClass: true,
                    animateIn: 'fadeIn',
                    nav: true,
                    animateOut: 'fadeOut',
                    navText: ['<span class="icon-flecha-izq-s"></span>', '<span class="icon-flecha-derech-s"></span>'],
                    onInitialized: animate,
                    responsive: {
                        0: {
                            items: 1
                        }
                    }
                });

                function animate(event) {
                    $('.b20-slider .owl-item.active').find('.b20-item-sl').addClass('animate');
                }

                $('.b20-slider').on('changed.owl.carousel', function (property) {
                    var current = property.item.index;
                    $('.b20-slider .b20-item-sl').removeClass('animate');
                    let current_page = $(property.target).find(".owl-item").eq(current).find('.b20-item-sl');
                    $(current_page).addClass('animate');
                    let current_count = $(current_page).attr('data-count');
                    let number_count = current_count < 10 ? '0' + current_count : current_count;
                    $('.b20-page-star').text(number_count);

                });

            } else {
                $(window).on('load', function (event) {
                    $('.b20-item-sl').addClass('animate');

                    /* Act on the event */
                });
            }

            $('.b20-prev-control').click(function (event) {
                $('.b20 .owl-prev').click();
            });
            $('.b20-next-control').click(function (event) {
                $('.b20 .owl-next').click();
            });

        };
        carruselb20();

        $().fancybox({
            selector: '.b22-slider .b22-big-image',
            hash: false,
            thumbs: {
                autoStart: false
            },
            afterClose: function () {
                console.log('close fancybox')
                // $('.b47-item-link.active').click();
            }


        });

        var b23_slide = $('.b23-item-sl').length;

        function carruselb23() {

            let sliderSmall = $('.b23-previous').length;
            console.log('sliderSmall', sliderSmall)
            if (sliderSmall >= 2) {
                $('.b23-wrap').removeAttr('style')
                console.log('salio')
            }

            if (b23_slide >= 2) {
                // $('.b23-item').removeClass('carousel-desktop');
                $('.b23-slider-small').addClass('owl-carousel');
                $('.b23-slider-small').owlCarousel({
                    loop: true,
                    dots: true,
                    autoplay: false,
                    touchDrag: false,
                    mouseDrag: false,
                    autoplayTimeout: 4000, // time for slides changes
                    smartSpeed: 2000, // duration of change of 1 slide
                    responsiveClass: true,
                    nav: false,
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
                    autoplayTimeout: 4000, // time for slides changes
                    smartSpeed: 2000, // duration of change of 1 slide
                    responsiveClass: true,
                    animateIn: 'fadeIn',
                    nav: true,
                    mouseDrag: false,
                    touchDrag: false,
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
                    $('.b23-slider .owl-item.active').find('.b23-item-sl').addClass('animate');
                }

                $('.b23-slider').on('changed.owl.carousel', function (property) {
                    var current = property.item.index;

                    $('.b23-slider .b23-item-sl').removeClass('animate');
                    $(property.target).find(".owl-item").eq(current).find('.b23-item-sl').addClass('animate');
                    let indexSL = $(property.target).find(".owl-item").eq(current).find('.b23-item-sl').attr('data-slider');
                    console.log('indexSL', indexSL)
                    let moveTo = indexSL;

                    $('.b23-slider-small').trigger('to.owl.carousel', moveTo);
                });

            } else {
                $(window).on('load', function (event) {
                    $('.b23-item-sl').addClass('animate');

                    /* Act on the event */
                });
            }
        };
        carruselb23();

        $(".g5-input-file input").change(function () {
            var fileInput = $(".g5-text-input");
            var text;
            $this = $(this);
            $('.g5-text-input').html($this.val());
            text = $('.g5-text-input').html();
            text = text.substring(text.lastIndexOf("\\") + 1, text.length);
            $('.g5-text-input').html(text);
        });
        //efecto levantar label de formulario
        var inputs = document.getElementsByClassName("form-input");
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener("blur", function (e) {
                e.currentTarget.closest('.g5-item-input').classList.remove('inFocus');
            });
            inputs[i].addEventListener("focus", function (e) {
                e.currentTarget.closest('.g5-item-input').classList.add('inFocus');
                if (this.value.length >= 1) {
                    this.nextElementSibling.classList.add("fijar");
                } else {
                    this.nextElementSibling.classList.remove("fijar");
                }
            });
            inputs[i].addEventListener("change", function () {
                if (this.value == "") {
                    this.nextElementSibling.classList.remove("fijar");
                } else {
                    this.nextElementSibling.classList.add("fijar");
                }
            });
        }
        //efecto levantar label de formulario

        let data_today = new Date();
        let dd = String(data_today.getDate()).padStart(2, '0');
        let mm = String(data_today.getMonth() + 1).padStart(2, '0'); //January is 0!
        let yyyy = data_today.getFullYear();
        let current_date = dd + '/' + mm + '/' + yyyy;
        $('.g5-date-input').val(current_date);
        console.log('dia', current_date);

        $('.soloNumber').keypress(validateNumber);

        function validateNumber(event) {
            var key = window.event ? event.keyCode : event.which;
            if (event.keyCode === 8 || event.keyCode === 46) {
                return true;
            } else if (key < 48 || key > 57) {
                return false;
            } else {
                return true;
            }
        };

        $("form").validationEngine('attach', {
            promptPosition: "topLeft",
            autoHidePrompt: true,
            autoPositionUpdate: false,
            autoHideDelay: 2000,
            binded: false,
            scroll: false,
            validateNonVisibleFields: true,
            showOneMessage: false
        });

        let urlSite = '<?php echo get_site_url() ?>';

        $('.b12-enviar').on('click', function (event) {
            event.preventDefault();
            const formID = <?php echo json_encode(get_field('sperant_form_id')); ?>;
            if (!formID) return

            let form = $(this).closest('form');
            var valid = $(this).closest('form').validationEngine('validate');
            if (!valid) {
                console.log('error: campos vacios');
            } else {
                console.log('formulario OK');
                let data_form = new FormData(document.getElementById("sd_form_project"))
                // Agregar campo obligatorio para Contact Form 7
                data_form.append('_wpcf7_unit_tag', `wpcf7-f${formID}-o1`);
                $.ajax({
                    url: urlSite + `/wp-json/contact-form-7/v1/contact-forms/${formID}/feedback`,
                    // url: urlSite+'/wp-json/contact-form-7/v1/contact-forms/2384/feedback',
                    beforeSend: function () {
                        $('.g4-loading').addClass('active');
                    },
                    type: 'post',
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data_form,
                    success: function (response) {
                        $('.g4-loading').removeClass('active');
                        if (response.status === 'mail_sent') {
                            // responseMessage('Mensaje enviado con exito','success');
                            window.location.replace(' <?php echo get_permalink(390) ?>');

                        }
                        if (response.status === 'validation_failed') {
                            let text_error = 'Error de servidor: ' + JSON.stringify(response.invalid_fields);
                            responseMessage('Se produjo un error inténtalo de nuevo.', 'error', text_error);
                        }

                    },
                    error: function (response) {
                        $('.g4-loading').removeClass('active');
                        responseMessage('Se produjo un error inténtalo de nuevo.', 'error');

                    }
                });

            }
        });

        // /es momento de cotizar
        var cantidadb22 = $('.b22-item-sl').length;

        function sliderOwb22() {
            $('.b22-slider').removeClass('desktop')
            $('.b22-slider').addClass('owl-carousel');
            $('.b22-slider').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                autoplay: false,
                autoplayTimeout: 2000,
                navText: ['<span class="icon-fleha-left"></span>', '<span class="icon-flecha-right"></span>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    680: {
                        items: 1
                    },
                    769: {
                        items: 1
                    },

                    1001: {
                        items: 1
                    }
                }
            })
        }

        function destroyOwb22() {
            $('.b22-slider').trigger('destroy.owl.carousel');
            $('.b22-slider').addClass('desktop');
            $('.b22-slider').removeClass('owl-carousel');
        }

        if (matchMedia) {
            var mqb22 = window.matchMedia("(max-width: 1000px)");
            mqb22.addListener(WidthChangeb22);
            WidthChangeb22(mqb22);
        }

        // media query change
        function WidthChangeb22(mqb22) {
            if (mqb22.matches) {
                console.log('menor a 1000px');
                if ($('.b22-slider').hasClass('owl-carousel')) {
                    // console.log('slider, ya existe');
                } else {
                    // console.log('slider, aun no existe')
                    sliderOwb22()
                }
            } else {
                console.log('mayor a 1000px');
                if (cantidadb22 >= 1) {
                    destroyOwb22()
                    sliderOwb22()
                } else {
                    destroyOwb22()
                }
            };
        }
        // /es momento de cotizar
        $('.b22-select-tipology').on('change', function (event) {
            let dataSlide = $('.b22-select-tipology option:selected').attr('data-slide');
            $('.b22-slider').trigger('to.owl.carousel', dataSlide)
        });

        $('.b22-slider').on('changed.owl.carousel', function (property) {
            let current = property.item.index;
            let dataSlide = $(property.target).find(".owl-item").eq(current).find('.b22-item-sl').attr('data-slide');

            $('.b22-select-tipology [data-slide="' + dataSlide + '"]').prop('selected', 'selected');

        });
    });


    //js nuevo
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
            byline: 0,
            portrait: 0,
            color: 'A90707'
        }
    });
</script>