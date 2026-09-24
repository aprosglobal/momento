<?php get_header();
/* Template Name: Post Venta */
?>


<?php while (have_posts()):
    the_post();

    $title_sale = get_field('title_sale');
    $description_sale = get_field('description_sale');
    $image_sale_data = get_field('image_sale');
    $image_sale = $image_sale_data['url'];

    ?>

    <!-- BLOQUE 13 -->


    <section class="b13 g3-anima">
        <div class="wancho">
            <h3 class="b10-title mb g3-move-up-1"><?php echo $title_sale ?></h3>
            <div class="b13-inner">
                <div class="b13-left g3-move-left-2">
                    <div class="b13-description">
                        <?php echo $description_sale ?>
                    </div>
                    <?php if ($image_sale): ?>
                        <div class="b13-figura">
                            <div class="b13-bg" style="background-image: url('<?php echo $image_sale ?>');"></div>
                        </div>
                    <?php endif ?>
                </div>
                <?php
                $description_form = get_field('description_form');
                $response_mailing_after_sales = get_field('response_mailing_after_sales');
                ?>
                <div class="b13-right g3-move-right-2">
                    <div class="b12-wrap-formulario">
                        <div class="b12-description-form">
                            <?php echo $description_form ?>
                        </div>
                        <div class="b12-formulario">
                            <form id="sd_form_sales" method="post">
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
                                        <input type="text" id="form_email" name="your-email"
                                            class="validate[required,custom[email]] form-input">
                                        <label for="form_email"><span>Email *</span></label>
                                    </div>
                                    <div class="g5-input g5-item-input">
                                        <input type="text" maxlength="9" id="form_phone" name="your-phone"
                                            class="form-input soloNumber validKeypress validate[required,custom[onlyNumberSp],minSize[9],maxSize[9]]">
                                        <label class="input-label" for="form_phone"><span>Teléfono*</span></label>
                                    </div>
                                </div>
                                <div class="g5-input-two">
                                    <div class="g5-select g5-item-input">
                                        <select id="form-documento" name="your-tipo-documento"
                                            class="form-input validate[required]">
                                            <option value=""></option>
                                            <option value="DNI">DNI</option>
                                            <option value="Pasaporte">Pasaporte</option>
                                            <option value="C.E.">C.E.</option>
                                            <option value="R.U.C.">R.U.C.</option>
                                        </select>
                                        <label class="input-label" for="form-documento"><span>Tipo de documento</span><i
                                                class="icon-arrow-down"></i></label>
                                    </div>
                                    <div class="g5-input g5-item-input">
                                        <input type="text" id="form_numero" name="your-nro-documento"
                                            class="form-input soloNumber validKeypress validate[required,custom[onlyNumberSp]]">
                                        <label class="input-label" for="form_numero"><span>Nº de documento*</span></label>
                                    </div>
                                </div>
                                <?php
                                $argsProjects = array(
                                    'post_type' => 'proyectos',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'etapa-proyecto',
                                            'field' => 'slug',
                                            'terms' => 'entregados',
                                            'operator' => 'NOT IN'
                                        )

                                    ),

                                );
                                $projects_featured_home = new WP_Query($argsProjects);
                                ?>
                                <div class="g5-select g5-item-input">
                                    <select id="form-proyecto" name="your-project" class="form-input validate[required]">
                                        <option value=""></option>
                                        <?php

                                        while ($projects_featured_home->have_posts()):
                                            $projects_featured_home->the_post();
                                            $name_project = get_the_title();
                                            ?>

                                            <option value="<?php echo $name_project ?>"><?php echo $name_project ?></option>

                                        <?php endwhile;
                                        wp_reset_postdata(); ?>
                                    </select>
                                    <label class="input-label" for="form-proyecto"><span>Elegir proyecto *</span><i
                                            class="icon-arrow-down"></i></label>
                                </div>
                                <div class="g5-input-two">
                                    <!-- <div class="g5-select g5-item-input">
                                    <select id="form-departamento" name="your-department" class="form-input validate[required]">
                                        <option value=""></option>
                                        <option value="Elige un Departamento">Elige un Departamento</option>
                                        <option value="option 2">option 2</option>
                                        <option value="option 3">option 3</option>
                                    </select>
                                    <label class="input-label" for="form-departamento"><span>Departamento *</span><i class="icon-arrow-down"></i></label>
                                </div> -->
                                    <div class="g5-input g5-item-input">
                                        <input type="text" id="form-departamento" name="your-department"
                                            class="validKeypress form-input validate[required] ">
                                        <label class="input-label" for="form-departamento"><span>Departamento
                                                *</span></label>
                                    </div>
                                    <div class="g5-select g5-input-file">
                                        <input onchange="inputFile_cv(event)" id="file-reclamo" type="file"
                                            class="validate[custom[validateMIME[jpg|jpeg|png]]"
                                            data-errormessage-custom-error="Debe adjuntar archivo (imágenes JPG, PNG, JPEG)"
                                            name="file-reclamo">
                                        <label class="input-label no-effect" for="file-reclamo">
                                            <!--    <span class="g5-inpufile-text">Adjuntar archivo</span> -->
                                            <i class="g5-icoinput icon-adjuntar"></i>
                                            <div class="g5-text-input">
                                                Adjuntar foto
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="g5-item-input g5-textarea">
                                    <textarea id="form-message" name="your-message" required="required"
                                        class="form-input"></textarea>
                                    <label class="input-label" for="form-message"><span>¿Tienes algún
                                            comentario?</span></label>
                                </div>
                                <span class="b11required g5-required">(*) Campos obligatorios</span>
                                <br>
                                <?php
                                $privacy_policies = get_permalink(617);
                                $terms_conditions = get_permalink(619);
                                ?>
                                <div class="g5-terminos">
                                    <input type="checkbox" checked id="form_contact_privacity" class="validate[required]"
                                        name="agree-terms-privacity">
                                    <label for="checkbox" class="g5-terminos_nota"><span class="g5-terminos_icon"></span>
                                        <div class="g5-terminos_text">
                                            <p>
                                                Acepto las <a class="openPopupJS" target="_blank"
                                                    href="<?php echo $privacy_policies ?>">Políticas de Privacidad </a> y <a
                                                    href="<?php echo $terms_conditions ?>">Términos y Condiciones</a> de
                                                Momento Grupo Inmobiliario.</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="g0-cnt-btn">
                                    <button type="submit" class="g0-btn b12-enviar">Enviar</button>
                                </div>
                                <input type="hidden" name="your-subject" value="Formulario Post Venta">
                                <input type="hidden" name="current-date" class="g5-date-input" value="">
                                <input type="hidden" name="response_mailing_after_sales"
                                    value="<?php echo $response_mailing_after_sales ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php endwhile; ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo STATIC_URL ?>js/jquery.waypoints.js"></script>
<script type="text/javascript">


    var fileCurrent;
    function inputFile_cv(event) {
        fileCurrent = event.currentTarget.files[0];
    }

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
        for (var i = 0;i < inputs.length;i++) {
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

        let urlSite = '<?php echo get_site_url() ?>';

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

        $('.b12-enviar').on('click', function (event) {
            event.preventDefault();
            let form = $(this).closest('form');
            var valid = $(this).closest('form').validationEngine('validate');
            if (!valid) {
                console.log('error: campos vacios');
            } else {
                console.log('formulario OK');
                let data_form = new FormData(document.getElementById("sd_form_sales"))
                // Agregar campo obligatorio para Contact Form 7
                data_form.append('_wpcf7_unit_tag', 'wpcf7-f616-o1');
                $.ajax({
                    url: urlSite + '/wp-json/contact-form-7/v1/contact-forms/616/feedback',
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

    });
</script>