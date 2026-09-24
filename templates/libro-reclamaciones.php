<?php get_header(); 
	/* Template Name: Libro de Reclamaciones */
?>
<?php 
	$hiden_out = 0;
?>
<?php while(have_posts()):the_post();

	$description_libro = get_field('description_libro');
	$sedes_list = get_field('sedes_list');
	$note_libro = get_field('note_libro');
	$events_text = get_field('events_text');
	$identification_1 = get_field('identification_1');
	$identification_2 = get_field('identification_2');

	$legales_book = get_field('legales_book');
	$hiden_form = get_field('hiden_form');
	$hiden_out = $hiden_form;
?>

<?php if($hiden_form):?>
<!-- BLOQUE NUEVO -->
<section class="b28">
	<div class="wancho">
		<h3 class="b28-title"><?php echo the_title() ?></h3>
		<div class="b28-description">
 			<?php echo  $legales_book?>
		</div>
	</div>
</section>
<!-- FIN DEL BLOQUE -->

<?php else: ?>




<!-- BLOQUE 25 -->
<section class="b27 g3-anima">
	<div class="wancho">
		<div class="b27-libro-top g3-move-up-0">
			<h3 class="b27-title-libro"><?php the_title() ?></h3>
			<div class="b27-description-libro">
				<?php echo $description_libro ?>
			</div>          
		</div>
		<div class="b27-libro-down g3-move-up-1">
			<div class="b27-libro-form">
				<form id="formulario-reclamos">
					<?php 
						$response_mailing_book = get_field('response_mailing_book');
					?>
					<input type="hidden" name="your-subject" value="Formulario Libro de Reclamaciones">
					<input type="hidden" name="response_mailing_book" value="<?php echo $response_mailing_book ?>">
					<input type="hidden" name="current_date">
					<input type="hidden" name="code_correlative">
					<div class="b27-list-box">
						<div class="b27-libro-box">
							<h4 class="b27-subtitle-libro"><?php echo $events_text ?></h4>
							<?php if ($sedes_list): ?>
							<div class="g5-select g5-item-input">
								<select id="form-sedes" name="name-sede" class="form-input validate[required]">
									<option value=""></option>
									<?php foreach ($sedes_list as $key => $item): 
										$sede = $item['sede'];
									?>
										<option value="<?php echo $sede ?>"><?php echo $sede ?></option>
									<?php endforeach ?>
								</select>
								<label class="input-label" for="form-sedes"><span><?php _e('Establecimiento', 'staff'); ?></span><i class="icon-arrow-down"></i></label>
							</div>
							<div class="b27-nota">
								<?php echo $note_libro ?>
							</div>
							<?php endif ?>
						</div>
						<div class="b27-libro-box">
							<h5 class="b27-title-box"><?php echo $identification_1 ?></h5>
							<div class="g5-input-two">
								<div class="g5-input g5-item-input">
									<input type="text"  id="form_nombre" name="your-name" class="validKeypress form-input validate[required] ">
									<label class="input-label" for="form_nombre"><span><?php _e('Nombres*', 'staff'); ?></span></label>
								</div>
								<div class="g5-input g5-item-input">
									<input type="text"  id="form_apellido" name="your-last-name" class="validKeypress form-input validate[required] ">
									<label class="input-label" for="form_apellido"><span><?php _e('Apellidos*', 'staff'); ?></span></label>
								</div>                      
							</div>
							<div class="g5-input-two">
								<div class="g5-input g5-item-input">
									<input type="text"  id="form_email" name="your-email"  class="validate[required,custom[email]] form-input">
									<label for="form_email"><span><?php _e('Correo electrónico*', 'staff'); ?></span></label>
								</div>                       
								<div class="g5-input g5-item-input">
									<input type="text" maxlength="9"  id="form_phone" name="your-phone" class="form-input soloNumber validKeypress validate[required,custom[onlyNumberSp],minSize[9],maxSize[9]]">
									<label class="input-label" for="form_phone"><span><?php _e('Teléfono/celular*', 'staff'); ?></span></label>
								</div>                      
							</div>
							<div class="g5-input-two">
								<div class="g5-select g5-item-input">
									<select id="form-documento" name="tipo-documento" class="form-input validate[required]">
										<option value=""></option>
										<option value="DNI"><?php _e('DNI', 'staff'); ?></option>
										<option value="Pasaporte"><?php _e('Pasaporte', 'staff'); ?></option>
										<option value="C.E."><?php _e('C.E.', 'staff'); ?></option>
										<option value="R.U.C."><?php _e('R.U.C.', 'staff'); ?></option>
									</select>
									<label class="input-label" for="form-documento"><span><?php _e('Tipo de documento', 'staff'); ?></span><i class="icon-arrow-down"></i></label>
								</div>
								<div class="g5-input g5-item-input">
									<input type="text"   id="form_numero" name="nro-documento" class="form-input soloNumber validKeypress validate[required,custom[onlyNumberSp]]">
									<label class="input-label" for="form_numero"><span><?php _e('Nº de documento*', 'staff'); ?></span></label>
								</div>  
							</div>
							<div class="g5-input-two">
								<div class="g5-select g5-item-input">
									<select id="form-departamento" name="departamento" class="form-input validate[required]"></select>
									<label class="input-label" for="form-departamento"><span><?php _e('Departamento', 'staff'); ?></span><i class="icon-arrow-down"></i></label>
								</div>
								<div class="g5-select g5-item-input">
									<select disabled id="form-provincia" name="provincia" class="form-input validate[required]"></select>
									<label class="input-label" for="form-provincia"><span><?php _e('Provincia', 'staff'); ?></span><i class="icon-arrow-down"></i></label>
								</div>
								
							</div>

							<div class="g5-input-two">
								<div class="g5-select g5-item-input">
									<select disabled id="form-distrito" name="distrito" class="form-input validate[required]"></select>
									<label class="input-label" for="form-distrito"><span><?php _e('Distrito', 'staff'); ?></span><i class="icon-arrow-down"></i></label>
								</div>
								<div class="g5-input g5-item-input">
									<input type="text"  id="form_direccion" name="address" class="validKeypress form-input validate[required] ">
									<label class="input-label" for="form_direccion"><span><?php _e('Dirección*', 'staff'); ?></span></label>
								</div>
							</div>
							<div class="g5-input-two">
								<div class="g5-input g5-item-input">
									<input type="text"  id="form_nombre-tutor" name="name-tutor" class="validKeypress form-input ">
									<label class="input-label" for="form_nombre-tutor"><span><?php _e('Nombre del Tutor', 'staff'); ?></span></label>
								</div>
								<div class="g5-input g5-item-input">
									<input type="text"  id="form_apellido-tutor" name="apellido-tutor" class="validKeypress form-input">
									<label class="input-label" for="form_apellido-tutor"><span><?php _e('Apellidos del Tutor', 'staff'); ?></span></label>
								</div>                      
							</div>

							<div class="g5-input-two">
								<div class="g5-select g5-item-input">
									<select id="form-documento-tutor" name="tipo-documento-tutor" class="form-input">
										<option value=""></option>
										<option value="DNI"><?php _e('DNI', 'staff'); ?></option>
										<option value="Pasaporte"><?php _e('Pasaporte', 'staff'); ?></option>
										<option value="C.E."><?php _e('C.E.', 'staff'); ?></option>
										<option value="R.U.C."><?php _e('R.U.C.', 'staff'); ?></option>
									</select>
									<label class="input-label" for="form-documento-tutor"><span><?php _e('Tipo de documento', 'staff'); ?></span><i class="icon-arrow-down"></i></label>
								</div>
								<div class="g5-input g5-item-input">
									<input type="text"   id="form_numero-tutor" name="nro-documento-tutor" class="form-input soloNumber">
									<label class="input-label" for="form_numero-tutor"><span><?php _e('N° de documento', 'staff'); ?></span></label>
								</div>  
							</div>
							<div class="g5-input g5-item-input">
								<input type="text"  id="form_direccion" name="direccion-tutor" class="validKeypress form-input validate[required] ">
								<label class="input-label" for="form_direccion"><span><?php _e('Dirección*', 'staff'); ?></span></label>
							</div>
							<div class="b27-reclamo-menor">
								<p><?php _e('*Esto aplica si el reclamante es menor de edad', 'staff'); ?></p>
								<p><?php _e('*Esto aplica si el reclamante es menor de edad', 'staff'); ?></p>
							</div>


						</div>
						<div class="b27-libro-box">
							<h5 class="b27-title-box"><?php echo $identification_2 ?></h5>
							<div class="b27-list-radios">
								<div class="g-input-radio">
									<input type="radio" value="Producto" checked name="identificacion-bien-contratado" id="form_detalle-proyecto">
									<label for="form_detalle-proyecto"><?php _e('Producto', 'staff'); ?></label>
								</div>
								<div class="g-input-radio">
									<input type="radio" value="Servicio" name="identificacion-bien-contratado" id="form_detalle-servicio">
									<label for="form_detalle-servicio"><?php _e('Servicio', 'staff'); ?></label>
								</div>                              
							</div>
							<div class="g5-item-input g5-textarea">
								<textarea id="form_description" name="descripcion-bien-contratado"  class="form-input validate[required]"></textarea>
								<label class="input-label" for="form_description"><span><?php _e('Descripción*', 'staff'); ?></span></label>
							</div>
							<div class="g5-input g5-item-input identificacion">
								<input type="text"  id="form_product" name="product-bien-contratado" class="validKeypress form-input validate[required] ">
								<label class="input-label" for="form_product"><span><?php _e('valor del Product/servicio*', 'staff'); ?></span></label>
							</div>
							
							
						</div>
							<?php 
								$text_reclamo_queja = get_field('text_reclamo_queja');
								$detail_claim = get_field('detail_claim');
							 ?>
						<div class="b27-libro-box claim">
							<h5 class="b27-title-box"><?php echo $detail_claim ?></h5>
							<div class="b27-list-radios">
								<div class="g-input-radio">
									<input checked name="tipo-reclamacion" value="Reclamo" type="radio" id="form_detalle-reclamo">
									<label for="form_detalle-reclamo"><?php _e('Reclamo **', 'staff'); ?></label>
								</div> 
								<div class="g-input-radio">
									<input name="tipo-reclamacion" value="Queja" type="radio"  id="form_detalle-queja">
									<label for="form_detalle-queja"><?php _e('Queja **', 'staff'); ?></label>
								</div>                             
							</div>
							<div class="b27-box-reclamo">
							   <?php echo $text_reclamo_queja ?>
							</div>
							<div class="g5-item-input g5-textarea">
								<textarea id="form_detalle" name="detalle-reclamacion" required="required" class="form-input validate[required]"></textarea>
								<label class="input-label " for="form_detalle"><span><?php _e('Detalle*', 'staff'); ?></span></label>
							</div>
							<div class="g5-item-input g5-textarea">
								<textarea id="form_pedido" name="pedido-reclamacion" required="required" class="form-input validate[required]"></textarea>
								<label class="input-label" for="form_pedido"><span><?php _e('Pedido*', 'staff'); ?></span></label>
							</div>
							<div class="g5-select g5-input-file g5-book-file">
								<input onchange="inputFile(event)" id="file-reclamo" type="file" class="validate[custom[validateMIME[jpg|jpeg|png]]" data-errormessage-custom-error="Debe adjuntar archivo (imágenes JPG, PNG, JPEG)" name="file-reclamo">
								<label class="input-label no-effect" for="file-reclamo">
									<!-- <span class="g5-inpufile-text">Adjuntar archivo</span> -->
									<i class="g5-icoinput icon-adjuntar"></i>
									<div class="g5-text-input">
										Adjuntar foto
									</div>
								</label>
							</div>
							<p class="b27-adjunta">*Ajuntar Imagen satelital señalando la ubicación del terreno.</p>
						</div>
						<?php 
							$actions_proveedor = get_field('actions_proveedor');
							$observation_action = get_field('observation_action');
							$authorization_end = get_field('authorization_end')
						 ?>
						 <input type="hidden" name="acciones-proveedor" value="<?php echo strip_tags($actions_proveedor) ?>">
						<div class="b27-libro-box observacion">
							<h5 class="b27-title-box"><?php echo $observation_action ?></h5>
							<div class="b27-libro-observacion">
								<?php echo $actions_proveedor ?>
							</div>
						</div>
						<div class="b27-libro-box">
							<h5 class="b27-title-box"><?php echo $authorization_end ?></h5>
							<div class="b27-list-radios">
								<div class="g-input-radio">
									<input name="autorizo-notificacion-resultado" value="Si" type="radio" checked id="form_detalle-si">
									<label for="form_detalle-si"><?php _e('Si', 'staff'); ?></label>
								</div>
								<div class="g-input-radio">
									<input name="autorizo-notificacion-resultado" value="No" type="radio" id="form_detalle-no">
									<label for="form_detalle-no"><?php _e('No', 'staff'); ?></label>
								</div>                              
							</div>
						</div>
					</div> 
					<?php 
						$end_text_libro = get_field('end_text_libro');
					 ?>
					<span class="b27-required g5-required"><?php _e('(*) Campos obligatorios', 'staff'); ?></span>  
					<div class="b27-libro-formulacion">
						<?php echo $end_text_libro ?>
					</div>                         
					<br> 
					<?php 
						$privacy_policies = get_permalink(617);
						$terms_conditions = get_permalink(619);
					 ?>
					<div class="g5-terminos b27-terminos">
						<input type="checkbox" checked id="form_book_terms" class="validate[required]" name="agree-terms-terms">
						<label for="form_book_terms" class="g5-terminos_nota"><span class="g5-terminos_icon"></span>
							<div class="g5-terminos_text">
								<p>
								   He leído y acepto los   <a class="openPopupJS" target="_blank" href="<?php echo $terms_conditions ?>"> Términos y condiciones </a>  de Inmobiliaria Bengala. </p>
							</div>
						</label>
					</div>
					<div class="g5-terminos b27-terminos">
						<input type="checkbox" checked id="form_book_privacity" class="validate[required]" name="agree-terms-privacity">
						<label for="form_book_privacity" class="g5-terminos_nota"><span class="g5-terminos_icon"></span>
							<div class="g5-terminos_text">
								<p>
								   Acepto  <a class="openPopupJS" target="_blank" href="<?php echo $privacy_policies ?>">Política de Privacidad </a> </p>
							</div>
						</label>
					</div>
					<div class="g0-ctn-btn b2_form_btn center">
						<button type="submit" class="g0-btn b14-enviar"><?php _e('Enviar datos', 'staff'); ?></button>

					</div>
				</form>
			</div>
			
		</div>
	</div>
</section>

<?php endif; ?>


<?php get_footer(); ?>

<?php if(!$hiden_out):?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="<?php echo STATIC_URL ?>js/jquery.waypoints.js"></script>
<script type="text/javascript">

	var fileCurrent;
	function inputFile(event){
		fileCurrent = event.currentTarget.files[0];
	}    

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

	$(function(){

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
		var fileCurrent;
		function inputFile(event){
			fileCurrent = event.currentTarget.files[0];
		}    
		
		let urlSite ='<?php echo get_site_url() ?>';

		
		$(".g5-input-file input").change(function (){
			console.log('asas');
			var fileInput = $(".g5-text-input");
			var text;
			$this = $(this);
			$('.g5-text-input').html($this.val());
			text = $('.g5-text-input').html();
			text = text.substring(text.lastIndexOf("\\") + 1, text.length);
			$('.g5-text-input').html(text);
		});

		$('.soloNumber').keypress(validateNumber);
			function validateNumber(event) {
				var key = window.event ? event.keyCode : event.which;
				if (event.keyCode === 8 || event.keyCode === 46) {
					return true;
				} else if ( key < 48 || key > 57 ) {
					return false;
				} else {
					return true;
				}
			};


		$('.b14-enviar').on('click', function(event) {
			event.preventDefault();
			let form = $(this).closest('form');
			let valid = form.validationEngine('validate');
			if (!valid) {
				console.log('error: campos vacios');
			}else {

				// get-correlative-book


				console.log('formulario OK');
				let data_form = new FormData(document.getElementById("formulario-reclamos"));
					data_form.append('file-reclamo',fileCurrent);
				

				$.ajax({
					url: urlSite+'/wp-json/api/get-correlative-book',
					beforeSend: function () {
						$('.g4-loading').addClass('active');
					},            
					type: 'post',
					cache: false,
					contentType: false,
					processData: false,                    
					// data:data_form,
					success: function( correlative ) {

						$('.g4-loading').removeClass('active');
						if (correlative.status === 200) {
							
							let data_today = new Date();
							let dd = String(data_today.getDate()).padStart(2, '0');
							let mm = String(data_today.getMonth() + 1).padStart(2, '0'); //January is 0!
							let yyyy = data_today.getFullYear();
							let curHour = data_today.getHours() > 12 ? data_today.getHours() - 12 : (data_today.getHours() < 10 ? "0" + data_today.getHours() : data_today.getHours());
							let curMinute = data_today.getMinutes() < 10 ? "0" + data_today.getMinutes() : data_today.getMinutes();
							let curMeridiem = data_today.getHours() > 12 ? "pm" : "am";   
							let current_hour = curHour + ":" + curMinute + " " + curMeridiem;
							let current_date = dd + '/' + mm + '/' + yyyy;

							let hour_register = current_date +' - '+current_hour;
							let correlative_register = 'R'+yyyy+''+mm+'-'+correlative.result;

							data_form.append('code_correlative',correlative_register);
							data_form.append('current_date',hour_register);

							$.ajax({
								url: urlSite+'/wp-json/contact-form-7/v1/contact-forms/477/feedback',
								beforeSend: function () {
									$('.g4-loading').addClass('active');
								},            
								type: 'post',
								cache: false,
								contentType: false,
								processData: false,                    
								data:data_form,
								success: function( response ) {
									$('.g4-loading').removeClass('active');
									if(response.status === 'mail_sent'){
										// responseMessage('Mensaje enviado con exito','success');
										window.location.replace('<?php echo get_permalink(390) ?>');

									}
									if(response.status === 'validation_failed'){
										let text_error = 'Error de servidor: '+JSON.stringify(response.invalid_fields);
										responseMessage('Se produjo un error inténtalo de nuevo.','error',text_error);
									}

								},
								error: function (response) {
									$('.g4-loading').removeClass('active');
									responseMessage('Se produjo un error inténtalo de nuevo.','error');
									 
								}                        
							});                             
						}

					},
					error: function (response) {
						$('.g4-loading').removeClass('active');
						responseMessage('Se produjo un error inténtalo de nuevo.','error');
						 
					}                        
				}); 
				
			}
		}); 

		// ubigeo
		$.ajax({
			url: '<?php echo STATIC_URL.'ubigeo/departamentos.json' ?>',
			beforeSend: function () {
				$('.g4-loading').addClass('active');
			},            
			type: 'get',
			dataType: 'json',
			// data:form.serialize(),
			success: function( response ) {
				
				let dpto_data  = response;
				let dpto_list ='<option value=""></option>';

				for (var i = 0; i < dpto_data.length; i++) {
					let item_dpto = dpto_data[i];
					dpto_list = dpto_list + `<option data-ubigeo="${item_dpto.id_ubigeo}" value="${item_dpto.nombre_ubigeo}">${item_dpto.nombre_ubigeo}</option>`;
				}
				$('#form-departamento').html(dpto_list);
				$('.g4-loading').removeClass('active');
			},
			error: function (response) {
				$('.g4-loading').removeClass('active');
				responseMessage('Se produjo un error inténtalo de nuevo.','error');
				 
			}                        
		}); 
		$('#form-departamento').on('change', function(event) {
			let dpto_current = $(event.currentTarget).find('option:selected').attr('data-ubigeo');
			// console.log('dpto_current',dpto_current);
			if (dpto_current) {
				$.ajax({
					url: '<?php echo STATIC_URL.'ubigeo/provincias.json' ?>',
					beforeSend: function () {
						$('.g4-loading').addClass('active');
						$('#form-distrito').html('').prop('disabled', 'disabled');
						$('.input-label[for="form-distrito"]').removeClass('fijar');
						$('.input-label[for="form-provincia"]').removeClass('fijar');
					},            
					type: 'get',
					dataType: 'json',
					// data:form.serialize(),
					success: function( response ) {
						// console.log('response',response);
						let prov_data  = response[dpto_current];
						let prov_list ='<option value=""></option>';

						for (var i = 0; i < prov_data.length; i++) {
							let item_prov = prov_data[i];
							prov_list = prov_list + `<option data-ubigeo="${item_prov.id_ubigeo}" value="${item_prov.nombre_ubigeo}">${item_prov.nombre_ubigeo}</option>`;
						}
						// console.log('prov_list',prov_list)
						$('#form-provincia').html(prov_list).removeAttr('disabled');


						$('.g4-loading').removeClass('active');
						

					},
					error: function (response) {
						$('.g4-loading').removeClass('active');
						responseMessage('Se produjo un error inténtalo de nuevo.','error');
						 
					}                        
				});             
			}
		});
		$('#form-provincia').on('change', function(event) {
			let prov_current = $(event.currentTarget).find('option:selected').attr('data-ubigeo');
			
			if (prov_current) {
				$.ajax({
					url: '<?php echo STATIC_URL.'ubigeo/distritos.json' ?>',
					beforeSend: function () {
						$('.g4-loading').addClass('active');
					},            
					type: 'get',
					dataType: 'json',
					// data:form.serialize(),
					success: function( response ) {
						let dist_data  = response[prov_current];
						// console.log('response',dist_data);

						let dist_list ='<option value=""></option>';

						for (var i = 0; i < dist_data.length; i++) {
							let item_dist = dist_data[i];
							dist_list = dist_list + `<option data-ubigeo="${item_dist.id_ubigeo}" value="${item_dist.nombre_ubigeo}">${item_dist.nombre_ubigeo}</option>`;
						}
						
						$('#form-distrito').html(dist_list).removeAttr('disabled');
						$('.g4-loading').removeClass('active');
						

					},
					error: function (response) {
						$('.g4-loading').removeClass('active');
						responseMessage('Se produjo un error inténtalo de nuevo.','error');
						 
					}                        
				});             
			}
		});
		// ubigeo




		// console.log('date',today);


		  //efecto levantar label de formulario
		  var inputs = document.getElementsByClassName("form-input");
		  for (var i = 0; i < inputs.length; i++) {
			inputs[i].addEventListener("blur", function(e) {
				e.currentTarget.closest('.g5-item-input').classList.remove('inFocus');
			});     
			inputs[i].addEventListener("focus", function(e) {
				e.currentTarget.closest('.g5-item-input').classList.add('inFocus');
			  if (this.value.length >= 1) {
				this.nextElementSibling.classList.add("fijar");
			  } else {
				this.nextElementSibling.classList.remove("fijar");
			  }
			});
			inputs[i].addEventListener("change", function() {
			  if (this.value == "") {
				this.nextElementSibling.classList.remove("fijar");
			  } else {
				this.nextElementSibling.classList.add("fijar");
			  }
			});
		  }
		  //efecto levantar label de formulario


	});
</script>
<?php endif; ?>

<?php endwhile; ?>
