        </div> <!-- wrapper -->
    </div> <!-- cnt -wrapper -->


<?php 
    $logo_color_local = STATIC_URL.'/img/logo-f.png';
    $logo_white_local = STATIC_URL.'/img/logo-f-white.png';
	$logo_footer_group = get_field('logo_footer_group','options');
	$logo_color_footer = $logo_footer_group['logo_color_footer']['url'];
	$logo_white_footer = $logo_footer_group['logo_white_footer']['url'];

	$logo_color = $logo_color_footer ? $logo_color_footer : $logo_color_local;
	$logo_white = $logo_white_footer ? $logo_white_footer : $logo_white_local;

	$call_footer_group = get_field('call_footer_group','options');
	$phone_1 = $call_footer_group['phone_1'];
	$phone_2 = $call_footer_group['phone_2'];

	$write_footer = get_field('write_footer','options');
	$social_media_footer_group = get_field('social_media_footer_group','options');
	$facebook_footer = $social_media_footer_group['facebook_footer'];
	$instragram_footer = $social_media_footer_group['instragram_footer'];
	$tiktok_footer = $social_media_footer_group['tiktok_footer'];
	$linkdln_footer = $social_media_footer_group['linkdln_footer'];
	$youtube_footer = $social_media_footer_group['youtube_footer'];
	$spotify_footer = $social_media_footer_group['spotify_footer'];

	$descripcion_footer = get_field('descripcion_footer','options');

	//LOGO FOOTER
	$logo_staff_black = get_field('logo_staff_black','options');
	$logo_staff_white = get_field('logo_staff_white','options');
?>


    <!-- html footer -->
	<footer class="footer">
	    <div class="wancho">
	        <div class="f-top">
	            <div class="f-top-left">
	                <a aria-label="Logo" href="<?php echo get_site_url() ?>" class="f-logo">
	                    <img src="<?php echo $logo_color ?>" alt="" width="133">
	                </a>
	                <a aria-label="Logo home" href="<?php echo get_site_url() ?>" class="f-logo-home">
	                    <img src="<?php echo $logo_white ?>" alt="" width="133">
	                </a>       
	            </div>
	            <div class="f-top-right">
	            	<?php if ($phone_1 || $phone_2): ?>
	                <div class="f-contact">
	                    <div class="f-title"> <i class="icon-phone1"></i>Llámanos</div>
	                    <div class="f-phones">
	                        <a aria-label="teléfono" href="tel:<?php echo $phone_1 ?>"><?php echo $phone_1 ?></a>
	                        <a aria-label="teléfono" href="tel:<?php echo $phone_2 ?>"><?php echo $phone_2 ?></a>
	                    </div>
	                </div>
	            	<?php endif ?>
	                <?php if ($write_footer): ?>
	                <div class="f-mensaje">
	                    <div class="f-title"> <i class="icon-msj"></i>Escríbenos</div>
	                    <a aria-label="correo" href="mailto:<?php echo $write_footer ?>" class="f-correo"><?php echo $write_footer ?></a>
	                </div>
	                <?php endif ?>
	                <div class="f-redes">
	                    <div class="f-title"> Síguenos en redes</div>
	                    <div class="f-list-redes">
	                    	<?php if ($facebook_footer): ?>
	                        <a aria-label="Link facebook" href="<?php echo $facebook_footer ?>" class="f-red"><i class="icon-fb"></i></a>
	                    	<?php endif ?>
	                    	<?php if ($instragram_footer): ?>
	                        <a aria-label="Link instagram" href="<?php echo $instragram_footer ?>" class="f-red"><i class="icon-inst"></i></a>
	                    	<?php endif ?>
	                    	<?php if ($tiktok_footer): ?>
	                        <a aria-label="Link tiktok" href="<?php echo $tiktok_footer ?>" class="f-red"><i class="icon-tk"></i></a>
	                    	<?php endif ?>
	                    	<?php if ($linkdln_footer): ?>
	                        <a aria-label="Link linkedin" href="<?php echo $linkdln_footer ?>" class="f-red"><i class="icon-lkd"></i></a>
	                    	<?php endif ?>
	                    	<?php if ($youtube_footer): ?>
	                        <a aria-label="Link youtube" href="<?php echo $youtube_footer ?>" class="f-red"><i class="icon-youtube"></i></a>
	                    	<?php endif ?>
	                    	<?php if ($spotify_footer): ?>
	                        <a aria-label="Link spotify" href="<?php echo $spotify_footer ?>" class="f-red"><i class="icon-spf"></i></a>
	                    	<?php endif ?>
	                    </div>
	                </div>                
	            </div>
	        </div>
	        <?php if ($descripcion_footer): ?>
	        <div class="f-center">
	            <div class="f-description">
	                <?php echo $descripcion_footer ?>
	            </div>
	        </div>
	        <?php endif ?>
	        <div class="f-down">
	            <?php 
                    if (function_exists(menu_footer())) menu_footer(); 
                ?>
	                <!-- <a href="" class="f-item-down"><span>Únete al equipo</span> <i class="icon-flecha-diagonal"></i></a> -->
	            
	            <div class="f-right-down">
	                <div class="f-grupo-moment">
	                    <span>© 2022  </span>
	                    <p>Momento Grupo Inmobiliario </p>
	                </div>
	                <div class="f-staff">
	                    <p>Diseñado por </p>
	                    <a aria-label="Logo" href="https://www.staffdigital.pe/" class="f-logo-staff"><img src="<?php echo STATIC_URL . 'img/logo-black1.svg' ?>" alt="" width="82"></a>
	                    <a aria-label="Logo" href="https://www.staffdigital.pe/" class="f-logo-staff-home"><img src="<?php echo STATIC_URL . 'img/logo-white1.svg' ?>" alt="" width="82"></a>
	                </div>
	            </div>
	        </div>
	    </div>
	</footer> 
    <!-- html footer -->




    <!-- contenedor del menu responsive -->
    <div class="menu-sidebar">
        <div class="menu-sidebar-cnt"></div>
    </div>

    <script type="text/javascript" src="<?php echo STATIC_URL ?>js/jquery.waypoints.js"></script>
	<?php wp_footer(); ?>

    <!-- seccion scripts -->
	<script type="text/javascript">
		$(document).ready(function() {

			

			$('#b16-nav-item-687 a').attr('target', '_blank');
			$('#f-menu-item-692 a').attr('target', '_blank');

		});
		$(window).on('load', function(event) {
			var animaseccion = $('.g3-anima')
				$(animaseccion).each(function(index, el) {
					$(el).waypoint(function(direction) {
						if (direction === 'down') {
							$(el).addClass('anima');

						}else{
							// $(el).removeClass('anima');
						}
					}, {
						offset:'90%'
					});
				}); 

			});
	</script>

    <!-- seccion scripts -->
</body>
</html>
