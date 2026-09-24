<?php get_header(); 
	/* Template Name: Proyectos en Venta */
?>

<?php while(have_posts()):the_post(); 
	$title_block = get_field('title_block');
	$title_sale = get_field('title_sale');
	$banner_project_sale_data = get_field('banner_project_sale');
	$banner_project_sale = $banner_project_sale_data['url'];
?>

<?php if ($banner_project_sale): ?>
	
<!-- BLOQUE 24 -->
<section class="b24 g3-anima" style="background-image: url('<?php echo $banner_project_sale ?>');">
	<div class="wancho">
		<div class="b24-text">
			<h3 class="b24-title g3-move-up-0"><?php echo $title_block ?></h3>
			<div class="b24-subtitle g3-move-up-1"><?php echo $title_sale ?></div>
		</div>
	</div>
</section>
<?php endif ?>


<?php
	$argsDist = array(
		'post_type'       => 'proyectos',
		'posts_per_page'  => -1,
		'order'           => 'ASC',
		'orderby'         => 'modified',
		'tax_query' => array(
		array(
				'taxonomy'  => 'etapa-proyecto',
				'field'     => 'slug',
				'terms'     => 'entregados',
				'operator'  => 'NOT IN'
			)

		),                       

	);
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'post_type'       => 'proyectos',
		'posts_per_page'  => 4,
		'order'           => 'DESC',
		'orderby'         => 'date',   
		'paged'=>$paged,
		'tax_query' => array(
		array(
				'taxonomy'  => 'etapa-proyecto',
				'field'     => 'slug',
				'terms'     => 'entregados',
				'operator'  => 'NOT IN'
			)

		),                       

	);
	$proyectos = new WP_Query($args);

?>

<!-- BLOQUE 25 -->
<section class="b25 g3-anima">
	<div class="b25-fila-top">
		<div class="wancho">
			<div class="b25-inner-select g3-move-up-0">
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
				
				<!--
				
				<?php 
				// 	$tax_state_project = get_terms( array(
				// 		'taxonomy' => 'etapa-proyecto',
				// 		'hide_empty' => true,
				// 	) );
					  
				?> 
				<div class="b3-select">
					<select class="b3-select-stage b3-select-filter">
						<option value="">Etapa</option>
						<?php // foreach ($tax_state_project as $key => $item): 
				// 			$tax_name = $item->name;
				// 			$tax_slug = $item->slug;
				// 			$tax_id = $item->term_id;
						?>
						<?php //if ($tax_slug !== 'entregados'): ?>
							<option value="<?php //echo $tax_id ?>"><?php //echo $tax_name ?></option>
						<?php //endif ?>
						<?php //endforeach ?>
					</select>
				</div>
		  <?php 
				// $meters_data = array();
				// $argsMeters = array(
				// 	 'post_type'   => 'proyectos',
				// 	 'order'       => 'ASC',
				// 	 'orderby'     => 'modified',            
				// 	 'posts_per_page'  => -1,
				// );
				// $proyectos_meters = new WP_Query($argsMeters);
				// while($proyectos_meters->have_posts()):$proyectos_meters->the_post();
				// $footage_project = get_field('footage_project');
				// array_push($meters_data, $footage_project);
				// endwhile; wp_reset_postdata();
				// $meters_list = array_unique($meters_data);
		  ?> 
		  <div class="b3-select">
				<select class="b3-select-footage b3-select-filter">
					 <option value="">Metraje</option>
					 <?php // foreach ($meters_list as $key => $item): ?>
						  <?php // if ($item): ?>
								
						  <option value="<?php //echo $item ?>"><?php // echo $item ?> m²</option>
						  <?php // endif ?>
					 
					 <?php // endforeach ?>
				</select>
		  </div>
				<?php 
				// 	$argsArchitects = array(
				// 		'post_type'   => 'arquitectos',
				// 		'order'       => 'ASC',
				// 		'orderby'     => 'modified',            
				// 		'posts_per_page'  => -1,
				// 	);
				// 	$architectsList = new WP_Query($argsArchitects);

				 ?>
				<div class="b3-select">
					<select class="b3-select-architects b3-select-filter">
						<option value="">Arquitectos</option>
						<?php 
				// 			while($architectsList->have_posts()):$architectsList->the_post();
				// 				$name_architects = get_the_title();
				// 				$id_arquitects = get_the_ID();

						?>
						<option value="<?php //echo $id_arquitects ?>"><?php // echo $name_architects ?></option>
						<?php //endwhile; wp_reset_postdata();?>
					</select>
				</div>
				
				-->
				
			</div>
			<div class="b3-wrap-clearfilters" style="display:none">
				<a href="" class="b3-clear-filter"><span><?php _e('Limpiar Filtros', 'staff'); ?></span> <i class="icon-close"></i></a>
			</div>             
		</div>
	</div>
	<?php
		$title_sale_list = get_field('title_sale_list');
		$class_title = $title_sale_list ? $title_sale_list : 'no-title';
	?>
	<div class="b25-fila-down g3-move-up-1">
		<div class="wancho <?php echo $class_title ?>">
			<h3 class="b25-title-down"><?php echo $title_sale_list ?></h3>
			<div class="b3-listado" id="b3-list-project-filter">
				
			</div>
			<div class="b3-listado-default" id="b3-list-project-default">
				<div class="b3-listado">
					<?php while($proyectos->have_posts()):$proyectos->the_post();
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
					<?php endwhile; wp_reset_postdata();?>
				</div>
				<div class="g1-paginator">
					<?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $proyectos ) ); } ?>
				</div>
				
			</div>
		</div>
	</div>
</section>

<?php 
	$title_ubication = get_field('title_ubication');
	$subtitle_ubication = get_field('subtitle_ubication');

?>

<!-- BLOQUE 26 -->
<section class="b26 g3-anima" id="b3-district-map" style="display: none;">
	<div class="b26-text g3-move-up-1">
		<h3 class="b26-title"><?php echo $title_ubication ?></h3>
		<div class="b26-description">
			<p>
				<?php echo $subtitle_ubication ?>
			</p>
		</div>
	</div>
	<div id="b3-current-map" class="b26-mapa g3-move-up-2 changeImagesMaps" >
		
	</div>
</section>


<?php endwhile; ?>

<?php get_footer() ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">

function changeImage(banners){
   var win = window.innerWidth;
   var elementImg = document.querySelectorAll(banners);
   for(var i = 0; i < elementImg.length; i++){
      var forElement = elementImg[i]
      if (forElement.hasAttribute('data-image')){
         var dataImg = forElement.getAttribute('data-image').split(';');
         if(win > 1024){
            forElement.style.backgroundImage = 'url('+dataImg[0]+')'
         }
         if(win <= 640){
            forElement.style.backgroundImage = 'url('+dataImg[1]+')'
         }
      } else{
         return false
      }
   }
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
					  "origin_project":'proyectos-en-venta'
				  }     
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
							  $('#b3-list-project-filter').html(projects_list);

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
					if(option_distrito){
						let dataMapa = {
							"id_disctrict":option_distrito,
						}
						$.ajax({
							url: urlSite+'/wp-json/api/get-mapa',
							beforeSend: function () {
								$('.g4-loading').addClass('active');
							},            
							type: 'post',
							dataType: 'json',
							data:JSON.stringify(dataMapa),
							contentType: 'application/json',
							success: function( data ) {
								console.log('data-mapa',data);
							  $('.g4-loading').removeClass('active');
								
								if (data.status === 200) {
								  let dataImageMap = data.result.image;
								  let dataImageMapMobil = data.result.image_mobil;
								  console.log(dataImageMap);
								//   $('#b3-current-map').css('background-image', 'url('+dataImageMap+')');
								  $('#b3-current-map').attr('data-image', dataImageMap + ';' + dataImageMapMobil)


								  changeImage('.changeImagesMaps');
									window.onresize = function(){
										changeImage('.changeImagesMaps');
									};
								  $('#b3-district-map').removeAttr('style');
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
					}
			 

			  }else{
			 

			  }

		  });
	  
		  $('.b3-clear-filter').click(function(event) {
			  event.preventDefault();
			  $('#b3-list-project-default').show();
			  $('#b3-list-project-filter').hide();
			  $('.b3-botom').show();

			  $('.b3-select-distrito').prop('selectedIndex',0);
			  $('.b3-select-stage').prop('selectedIndex',0);
			  $('.b3-select-footage').prop('selectedIndex',0);
           $('.b3-select-architects').prop('selectedIndex',0);

			  $('.b3-wrap-clearfilters').hide();
			  $('#b3-district-map').hide();
		  });

	});
</script>