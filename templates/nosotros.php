<?php get_header(); 
	/* Template Name: Nosotros */
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/lightgallery/latest/css/lightgallery.css">

<?php while(have_posts()):the_post();

	$title_about_us = get_field('title_about_us');
	$description_about_us = get_field('description_about_us');
	$image_about_us_data = get_field('image_about_us');
	$image_about_us = $image_about_us_data['url'];

?>

<!-- BLOQUE 6 -->
<section class="b6 g3-anima">
	<div class="wancho">
		<div class="b6-wrap">
			<div class="b6-left g3-move-left-1">
				<div class="b6-text-top">
					<div class="b6-union-1">
						<img src="<?php echo STATIC_URL ?>img/union-left.png" alt="" width="57" height="57">
					</div>
					<div class="b6-union-2">
						<img src="<?php echo STATIC_URL ?>img/union-right.png" alt="" width="57" height="57">
					</div>
					<div class="b6-title">
						<?php echo $title_about_us ?>
					</div>
					<span class="b6-subtitle">-UCDM</span>  
				</div>
				<div class="b6-description">
					<?php echo $description_about_us ?>
				</div>
			</div>
			<?php if ($image_about_us): ?>
			<div class="b6-right g3-move-right-1">
				<div class="b6-bg" style="background-image: url('<?php echo $image_about_us ?>');"></div>
			</div>
			<?php endif ?>
		</div>
	</div>
</section>

<?php 
	$image_ideal_us_data = get_field('image_ideal_us');
	$image_ideal_us = $image_ideal_us_data['url'];

	$title_ideal_us = get_field('title_ideal_us');
	$description_ideal_us = get_field('description_ideal_us');
	$characteristics_list_us = get_field('characteristics_list_us');
?>

<!-- BLOQUE 7 -->
<section class="b7 g3-anima">
	<div class="b7-warp">
		<?php if ($image_ideal_us): ?>
		<div class="b7-left g3-move-left-2" style="background-image: url('<?php echo $image_ideal_us ?>');"></div>
		<?php endif ?>
		<div class="b7-right g3-move-right-2">
			<div class="b7-texto">
				<h3 class="b7-title"><?php echo $title_ideal_us ?></h3>
				<div class="b7-dscription-center">
					<?php echo $description_ideal_us ?>
				</div>
			</div>
			<?php if ($characteristics_list_us): ?>
				
			<div class="b7-listado">
				<?php foreach ($characteristics_list_us as $key => $item):
					$number_us = $item['number_us'];
					$text_us = $item['text_us'];
					$url_data = $item['url_us'];
					$url_link = $url_data ? $url_data['url'] : null;

					$url = $url_link ? 'href="'.$url_link.'"' : '';
					$class_url = !$url_link ? 'no-link' : '';
				?>      
				
				<div class="b7-item">
					<span class="b7-number"><?php echo $number_us ?></span>
					<div  class="b7-yeard <?php echo $class_url ?>"> <i class="icon-flecha-right"></i><a <?php echo $url ?>><?php echo $text_us ?></a></div>
				</div>
				
				<?php endforeach ?>
			</div>          
			<?php endif ?>
		</div>
	</div>
</section>

<?php
	$title_values_us = get_field('title_values_us');
	$image_values_us_data = get_field('image_values_us');
	$image_values_us = $image_values_us_data['url'];

	$values_list_us = get_field('values_list_us');
?>

<!-- BLOQUE 8 -->
<section class="b8 g3-anima">
	<div class="wancho">
		<div class="b8-wrap">
			<div class="b8-left g3-move-left-3">
				<div class="b8-inner">
					<h1 class="b8title"><?php echo $title_values_us ?></h1>
					<?php if ($values_list_us): ?>
						
					<div class="b8accordion">
						<?php foreach ($values_list_us as $key => $item):
							$value_us = $item['value_us'];
							$description_value_us = $item['description_value_us'];
						?>  
						<div class="b8item">
							<div class="b8head b8openAccordion">
								<!-- <div class="b8number"><span class="b8addZero">1</span>.</div> -->
								<h2 class="b8subtitle"><?php echo $value_us ?></h2>
							</div>
							<div class="b8container">
								<?php echo $description_value_us ?>
							</div>
						</div>
						
						<?php endforeach ?>
					</div>          
					<?php endif ?>
				</div>
			</div>
			<?php if ($image_values_us): ?>
			<div class="b8-right g3-move-right-3">
				<div class="b8-bg" style="background-image: url('<?php echo $image_values_us ?>');"></div>
			</div>
			<?php endif ?>
		</div>
	</div>
</section>

<?php 
	$title_desing_us = get_field('title_desing_us');
	$desing_list_us = get_field('desing_list_us');
?>

<?php if ($desing_list_us): ?>
<!-- BLOQUE 9 -->
<section class="b9 g3-anima">
	<div class="wancho">
		<h3 class="b9-title g3-move-up-1"><?php echo $title_desing_us ?></h3>
		<div class="b9-list g3-move-up-2">
			<?php foreach ($desing_list_us as $key => $item):
				$image_desing = $item['image_desing']['url'];
				$text_desing = $item['text_desing'];
			?>
			<div class="b9-item">
				<?php if ($image_desing): ?>  
				<div class="b9-figura">
					<img src="<?php echo $image_desing ?>" alt="" height="50">
				</div>
				<?php endif ?>
				<div class="b9-title-it"><?php echo $text_desing ?></div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<?php endif ?>

<?php
	$title_leader_us = get_field('title_leader_us');
	$description_leader_us = get_field('description_leader_us');
	$logo_leader_us_data = get_field('logo_leader_us');
	$logo_leader_us = $logo_leader_us_data['url'];

	$video_group = get_field('video_group');
	$image_video_us = $video_group['image_video_us']['url'];
	$url_video_us_data = $video_group['url_video_us'];
	$url_video_us = $url_video_us_data ? 'href="'.$url_video_us_data.'"' : '';
?>

<!-- BLOQUE 10 -->
<section class="b10 g3-anima">
	<div class="wancho">
		<h3 class="b10-title g3-move-up-0"><?php echo $title_leader_us ?></h3>
		<div class="b10-inner g3-move-up-1">
			<div class="b10-text">
				<div class="b10-description">
					<?php echo $description_leader_us ?>
				</div>
				<?php if ($logo_leader_us): ?>
				<div class="b10-logo">
					<img src="<?php echo $logo_leader_us ?>" alt="">
				</div>
				<?php endif ?>
			</div>
			<div class="b10-video">
				<?php if ($image_video_us): ?>
				<div class="b10-bg gallery-zoom" style="background-image: url('<?php echo $image_video_us ?>');">
					<?php if ($url_video_us): ?>
					<a <?php echo $url_video_us ?> class="b10-play item-gallery"><span>Play</span></a>
					<?php endif ?>
				</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</section>

<?php
	$title_team = get_field('title_team');
	$team_list = get_field('team_list');
?>

<?php if ($team_list): ?>
<!-- BLOQUE 11 -->
<section class="b11 g3-anima">
	<div class="wancho">
		<h3 class="b10-title bottom g3-move-up-1"><?php echo $title_team ?></h3>
		<div class="b11-list g3-move-up-2">
			<?php foreach ($team_list as $key => $item): 
				$image_team_data = $item['image_team'];
				$image_team = $image_team_data['url'];
				$name_team = $item['name_team'];
				$charge_team = $item['charge_team'];
			?>
			<div class="b11-item">
				<?php if ($image_team): ?>
				<div class="b11-foto">
					<img src="<?php echo $image_team ?>" alt="" width="282" height="400"/>
				</div>
				<?php endif ?>
				<div class="b11-text-it">
					<h3><?php echo $name_team ?></h3>
					<p><?php echo $charge_team ?></p>
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