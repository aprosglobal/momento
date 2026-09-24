<!DOCTYPE html>
<html class="html" lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Momento grupo inmobiliario</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- inicio favicon  iphone retina, ipad, iphone en orden-->
            <!--    <link rel="icon" type="image/png" href="{{ STATIC_URL }}img/favicon/256x256.png"/>
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ STATIC_URL }}img/favicon/114x114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ STATIC_URL }}img/favicon/72x72.png">
        <link rel="apple-touch-icon-precomposed" href="{{ STATIC_URL }}img/favicon/57x57.png"> -->
    <!-- end favicon -->
    <?php wp_head(); ?>


	  <!-- Meta Pixel Code --><script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init', '765491376515061');fbq('track', 'PageView');</script><noscript><img height="1" width="1" style="display:none"src="https://www.facebook.com/tr?id=765491376515061&ev=PageView&noscript=1"/></noscript><!-- End Meta Pixel Code -->  

</head>

<body <?php body_class() ?>>

    <?php
      $post_id = get_the_ID();
      $seo_h1 = get_field("h1",$post_id);
    ?>

    <h1 style="display: none;"><?php echo (isset($seo_h1) && !empty($seo_h1)) ? $seo_h1 : get_the_title() ?></h1>

    <div class="g4-loading">
        <img src="<?php echo STATIC_URL.'/img/loading.svg' ?>" width="200" alt="">
    </div>
 

    <div class="cnt-wrapper">
        <div class="wrapper">
            
        	<!-- html nav header -->
 
            <!-- <header class="header">
                <div class="wancho header-ctn">
                    <a href="home.html" class="header-logo">
                        <img src="http://placehold.it/180x90" alt="" width="179" height="107">
                    </a>
                    <?php 
                        //if (function_exists(clean_custom_menus())) clean_custom_menus(); 
                    ?>
                </div>
            </header> -->

            <?php 

                $logo_color_local = STATIC_URL.'/img/logo-header.svg';
                $logo_white_local = STATIC_URL.'/img/logo-white.svg';
                $logo_header_group = get_field('logo_header_group', 'options');
                $logo_color_header = $logo_header_group['logo_color_header']['url'];
                $logo_white_header = $logo_header_group['logo_white_header']['url'];


                $logo_color = $logo_color_header ? $logo_color_header : $logo_color_local;
                $logo_white = $logo_white_header ? $logo_white_header : $logo_white_local;

                $phone_header = get_field('phone_header','options');

            ?>

            <header class="header">
                <div class="header-ctn">
                    <div class="h-left">
                        <a aria-label="Icono menú" href="" class="h-menu h-open-menu"><span class="icon-menu1"></span></a>
                        <a aria-label="Logo" href="<?php echo get_site_url() ?>" class="h-logo">
                            <img class="color" src="<?php echo $logo_color ?>" alt="" width="282" height="25">
                            <img class="white" src="<?php echo $logo_white ?>" alt="" width="282" height="25">
                        </a>            
                    </div>
                    <?php if ($phone_header): ?>
                        
                    <div class="h-right">
                        <a aria-label="Teléfono" href="tel:+51<?php echo $phone_header ?>" class="h-phone"><i class="icon-phone1"></i><?php echo $phone_header ?></a>
                    </div>
                    <?php endif ?>
                </div>
            </header>
            <?php 
                $image_group = get_field('image_group','options');
                $image_menu = $image_group['image_menu']['url'];
                $url_menu_data = $image_group['url_menu'];
                $link_url_data = $url_menu_data ? $url_menu_data['url'] : null;
                $link_url = $link_url_data ? 'href="'.$link_url_data.'"' : '';
                $target_link_data = $url_menu_data ? $url_menu_data['target'] : null;
                $target_link = $target_link_data === '_blank' ? 'target="_blank"':'';

                $write_footer = get_field('write_footer','options');
                $social_media_footer_group = get_field('social_media_footer_group','options');
                $h_facebook = $social_media_footer_group['facebook_footer'];
                $h_instragram = $social_media_footer_group['instragram_footer'];
                $h_tiktok = $social_media_footer_group['tiktok_footer'];
                $h_linkdl = $social_media_footer_group['linkdln_footer'];
                $h_youtube = $social_media_footer_group['youtube_footer'];
                $h_spotify = $social_media_footer_group['spotify_footer'];
            ?>
            <div class="b16-menu-overlay"></div>
            <section class="b16">
                <div class="b16-wrap">
                    <div class="b16-left">
                        <a aria-label="Iconos" href="#" class="b16-close icon-close"></a>
                        <div class="b16-bg" style="background-image: url('<?php echo $image_menu ?>');"></div>
                        <div class="b16-redes">
                            <h3 class="b16-title-red">Síguenos en</h3>
                            <div class="b16-list-redes">
                            	<?php if ($h_instragram): ?>
                                <a aria-label="Link instagram" href="<?php echo $h_instragram ?>" class="b16-red"> <i class="icon-inst"></i></a>
                            	<?php endif ?>
                            	<?php if ($h_facebook): ?>
                                <a aria-label="Link facebook" href="<?php echo $h_facebook ?>" class="b16-red"> <i class="icon-fb"></i></a>
                            	<?php endif ?>
                            	<?php if ($h_youtube): ?>
                                <a aria-label="Link youtube" href="<?php echo $h_youtube ?>" class="b16-red"> <i class="icon-youtube"></i></a>
                            	<?php endif ?>
                            	<?php if ($h_tiktok): ?>
                                <a aria-label="Link tiktok" href="<?php echo $h_tiktok ?>" class="b16-red"> <i class="icon-tk"></i></a>
                            	<?php endif ?>
                            	<?php if ($h_linkdl): ?>
                                <a aria-label="Link linkedin" href="<?php echo $h_linkdl ?>" class="b16-red"> <i class="icon-lkd"></i></a>
                            	<?php endif ?>
                            	<?php if ($h_spotify): ?>
                                <a aria-label="Link spotify" href="<?php echo $h_spotify ?>" class="b16-red"> <i class="icon-spf"></i></a>
                            	<?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="b16-right">
                        
                        <?php 
                            if (function_exists(clean_custom_menus())) clean_custom_menus(); 
                        ?>  
                    
                    </div>
                </div>
            </section>
            <div class="h-wsp">
                <i class="icon-wsp"></i>
            </div>

            <?php 
                $wsp_number = get_field('wsp_number','options');
             ?>
            <?php if ($wsp_number): ?>
                <a aria-label="Link whatsapp" target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $wsp_number ?>" class="h-wsp">
                    <i class="icon-wsp"></i>
                </a>
            <?php endif ?>

        	<!-- html nav header -->