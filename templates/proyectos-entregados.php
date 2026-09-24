<?php get_header(); 
		/* Template Name: Proyectos Entregados */
?>

<?php while(have_posts()):the_post(); 
		$title_delivery_projects = get_field('title_delivery_projects');
?>

<!-- BLOQUE 9 -->
<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$argsProjects = array(
				'post_type'       => 'proyectos',            
				'posts_per_page'  => 6,
				'paged'=>$paged,
				'tax_query' => array(
				array(
								'taxonomy'  => 'etapa-proyecto',
								'field'     => 'slug',
								'terms'     => 'entregados',
						)

				),                           

		);
		$projectsList = new WP_Query($argsProjects);
 ?>

<?php if ($projectsList->have_posts()): ?> 
<!-- BLOQUE 46 -->
<section class="b46 g3-anima">
	<div class="wancho">
		<h3 class="b46-title  g3-move-up-0"><?php echo $title_delivery_projects ?></h3>
		<div class="b46-bottom g3-move-up-1">
			<div class="b46-list">
				<?php 
						while($projectsList->have_posts()):$projectsList->the_post();
								$imagePlaceholder = STATIC_URL.'img/placeholder.png';
								$image_group_proyect = get_field('image_group_proyect');
								$logotipo_list_projects = $image_group_proyect['logotipo_list_projects']['url'];
								$image_list_projects_data = $image_group_proyect['image_list_projects']['url'];

								$image_list_projects = $image_list_projects_data ? $image_list_projects_data : $imagePlaceholder;
								$year_delivery = get_field('year_delivery');
								$number_departments = get_field('number_departments');

								$description_group = get_field('description_group');
								$description_floors = $description_group['description_floors'];
								$description_departments = $description_group['description_departments'];
								$tax_group = get_field('tax_group');
								$district_project = $tax_group['district_project'];
								
								$name_district = get_the_title($district_project);

				 ?> 
				<div class="b46-item">
					<div class="b46-left">
						<div class="b46-bgi" style="background-image: url('<?php echo $image_list_projects ?>');"></div>
					</div>
					<div class="b46-right">
						<div class="b46-content-top">
							<?php if ($logotipo_list_projects): ?>
							<div class="b46-logo">
								<img src="<?php echo $logotipo_list_projects ?>" alt="" width="145" height="145"/>
							</div>
							<?php endif ?>
							
						</div>
						<div class="content-bottom">
							<div class="b46-descriptions">
								
								<div class="b46_mobil_clone">

									<?php if ($district_project): ?>
									<div class="b46-direction">
										<div class="b46-icon icon-gps"></div>
										<p><?php echo $name_district ?></p>
									</div>
									<?php endif ?>

								</div>
								<?php if ($year_delivery || $number_departments): ?>
								<p><strong> <?php echo $year_delivery ?> </strong> | <?php echo $number_departments ?></p>
								<?php endif ?>
								<p><?php echo $description_floors ?></p>
								<p><?php echo $description_departments ?></p>
								<?php if ($district_project): ?>
								<div class="b46-direction">
									<div class="b46-icon icon-gps"></div>
									<p><?php echo $name_district ?></p>
								</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; wp_reset_postdata();?> 
			</div>
			<div class="g1-paginator">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $projectsList ) ); } ?>
			</div>
		</div>
	</div>
</section>
<?php endif ?>


<?php endwhile; ?>

<?php get_footer() ?>
<script type="text/javascript">
	
	// $(".b46_lugar_responsive").clone().appendTo(".b46_mobil_clone");
</script>
