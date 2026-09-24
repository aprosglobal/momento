<?php get_header();
/* Template Name: Contacto */
?>


<?php while (have_posts()):
    the_post();

    $title_contact = get_field('title_contact');
    $call_contact_group = get_field('call_contact_group');
    $phone_1 = $call_contact_group['phone_1'];
    $phone_2 = $call_contact_group['phone_2'];

    $email_contact = get_field('email_contact');
    $ubication_contact_group = get_field('ubication_contact_group');
    $text_ubication = $ubication_contact_group['text_ubication'];
    $url_ubication_data = $ubication_contact_group['url_ubication'];
    $url_ubication = $url_ubication_data ? 'href="' . $url_ubication_data . '"' : '';

    $maps_contact = get_field('maps_contact');
    $waze_contact = get_field('waze_contact');

    ?>

    <!-- BLOQUE 12 -->


    <section class="b12 g3-anima">
        <div class="wancho">
            <h3 class="b10-title mb g3-move-up-0"><?php echo $title_contact ?></h3>
            <div class="b12-inner">
                <div class="b12-left g3-move-left-1">
                    <div class="b12-list-left">
                        <?php if ($phone_1 | $phone_2): ?>
                            <div class="b12-item-left">
                                <div class="f-title"> <i class="icon-phone1"></i>Llámanos</div>
                                <div class="f-phones">
                                    <a href="tel:<?php echo $phone_1 ?>"><?php echo $phone_1 ?></a>
                                    <a href="tel:<?php echo $phone_2 ?>"><?php echo $phone_2 ?></a>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if ($email_contact): ?>
                            <div class="b12-item-left">
                                <div class="f-title"> <i class="icon-msj msj"></i>Escríbenos</div>
                                <a href="mailto:<?php echo $email_contact ?>" class="f-correo"><?php echo $email_contact ?></a>
                            </div>
                        <?php endif ?>
                        <?php if ($text_ubication): ?>
                            <div class="b12-item-left">
                                <div class="f-title"> <i class="icon-gps gps"></i>Ubícanos</div>
                                <a <?php echo $url_ubication ?> class="f-correo"><?php echo $text_ubication ?></a>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="g0-cnt-btn b12_btn_ubicacion">
                        <?php if ($maps_contact): ?>
                            <a href="<?php echo $maps_contact ?>" class="b12-btn-maps">
                                <img src="<?php echo STATIC_URL ?>img/maps.svg" alt="">
                                Maps
                            </a>
                        <?php endif ?>
                        <?php if ($waze_contact): ?>
                            <a href="<?php echo $waze_contact ?>" class="b12-btn-maps">
                                <img src="<?php echo STATIC_URL ?>img/waze.svg" alt="">
                                Waze
                            </a>
                        <?php endif ?>
                    </div>
                </div>
                <?php
                $description_form = get_field('description_form');
                $response_mailing_contact = get_field('response_mailing_contact');
                ?>
                <div class="b12-right g3-move-right-1">
                    <div class="b12-wrap-formulario">
                        <div class="b12-description-form">
                            <?php echo $description_form ?>
                        </div>
                        <div class="b12-formulario">
                            <form id="sd_form_contact" method="post">
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
                                $projects_featured = new WP_Query($argsProjects);

                                $text_field_message = get_field('text_field_message');
                                ?>
                                <div class="g5-input-two">
                                    <div class="g5-select g5-item-input">
                                        <select id="form-proyecto" name="your-project"
                                            class="form-input validate[required]">
                                            <option value=""></option>
                                            <?php

                                            while ($projects_featured->have_posts()):
                                                $projects_featured->the_post();
                                                $name_project = get_the_title();
                                                ?>
                                                <option value="<?php echo $name_project ?>"><?php echo $name_project ?></option>
                                            <?php endwhile;
                                            wp_reset_postdata(); ?>
                                        </select>
                                        <label class="input-label" for="form-proyecto"><span>Proyecto de interés</span><i
                                                class="icon-arrow-down"></i></label>
                                    </div>
                                </div>
                                <div class="g5-item-input g5-textarea">
                                    <textarea id="form_message" name="your-message" required="required"
                                        class="form-input"></textarea>
                                    <label class="input-label"
                                        for="form_message"><span><?php echo $text_field_message ?></span></label>
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
                                <input type="hidden" name="your-subject" value="Formulario Contacto">
                                <input type="hidden" name="current-date" class="g5-date-input" value="">
                                <input type="hidden" name="response_mailing_contact"
                                    value="<?php echo $response_mailing_contact ?>">
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
                let data_form = new FormData(document.getElementById("sd_form_contact"))
                // Agregar campo obligatorio para Contact Form 7
                data_form.append('_wpcf7_unit_tag', 'wpcf7-f604-o1');
                $.ajax({
                    url: urlSite + '/wp-json/contact-form-7/v1/contact-forms/604/feedback',
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