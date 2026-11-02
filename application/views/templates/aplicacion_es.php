<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplicaci&oacute;n | Cuartos Vac&iacute;os</title>

    <link rel="stylesheet" href="https://cuartosvacios.com/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Cabecera con Logo e Imagen de Fondo */
        .hero-section {
            background: linear-gradient(rgba(40, 167, 69, 0.8), rgba(32, 201, 151, 0.8)), url('banner_room.webp');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 60px 0;
            margin-bottom: -40px;
        }

        .logo-container img {
            max-width: 180px;
            margin-bottom: 20px;
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.2));
        }

        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }

        .card-header-custom {
            background-color: #fff;
            border-bottom: 1px solid #eef2f1;
            padding: 15px 20px;
            border-radius: 12px 12px 0 0 !important;
        }

        .section-title {
            color: #28a745;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
            font-weight: bold;
        }

        .input-group-text {
            background-color: #f8f9fa;
            border-right: none;
            color: #6c757d;
        }

        .form-control-sm {
            border-left: none;
        }

        .form-control:focus {
            border-color: #ced4da;
            box-shadow: none;
        }

        label {
            font-weight: 600;
            color: #495057;
            font-size: 0.8rem;
            margin-bottom: 4px;
        }

        .btn-success {
            border-radius: 50px;
            padding: 12px 40px;
            font-weight: bold;
        }

        .answer {
            display: none;
            margin-top: 10px;
            border-left: 3px solid #28a745;
            padding-left: 15px;
        }

        .error {
            color: #dc3545;
            font-size: 11px;
            margin-top: 4px;
            display: block;
            width: 100%;
            font-weight: normal;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        /* Estilo para imagen lateral de bienvenida */
        .welcome-img {
            width: 100%;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <section class="hero-section text-center">
        <div class="container">
            <div class="logo-container">
                <img src="https://cuartosvacios.com/assets/img/logo-soraya.png" alt="Soraya Rooms Logo">
            </div>
            <h2 class="font-weight-bold">Formulario de Aplicaci&oacute;n</h2>
            <p>Completa todos los campos para procesar tu solicitud de renta.</p>
            <a href="https://cuartosvacios.com/" class="btn btn-outline-light btn-sm"><i class="fas fa-arrow-left"></i> Regresar al Inicio</a>
        </div>
    </section>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card card-custom mt-5 p-3">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <img src="https://cuartosvacios.com/assets/img/couple_room.jpg" alt="Pareja buscando cuarto" class="welcome-img">
                        </div>
                        <div class="col-md-7">
                            <h4 class="text-success font-weight-bold">&iexcl;Est&aacute;s a un paso de tu nuevo hogar!</h4>
                            <p class="text-muted small">En Soraya Rooms nos esforzamos por ofrecerte la mejor experiencia. Completa la informaci&oacute;n de abajo para que nuestro equipo pueda validar tu perfil lo antes posible.</p>
                        </div>
                    </div>
                </div>

                <form id="app_us" name="app_us" action="<?php echo base_url(); ?>aplicacion/guardar" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="karlosystem@gmail.com" name="txt_email" />
                    <input type="hidden" value="CV" name="txtprocedencia" />

                    <div class="card card-custom">
                        <div class="card-header-custom">
                            <h6 class="section-title"><i class="fas fa-user mr-2"></i> INFORMACI&Oacute;N PERSONAL</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Nombre Completo <span class="text-success">(*)</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-id-card"></i></span></div>
                                        <input type="text" class="form-control form-control-sm" name="txt_full_name" id="txt_full_name">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Celular <span class="text-success">(*)</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-mobile-alt"></i></span></div>
                                        <input type="text" class="form-control form-control-sm" name="txt_phone" id="txt_phone" placeholder="(000) 000-0000">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Direcci&oacute;n Actual <span class="text-success">(*)</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span></div>
                                        <input type="text" class="form-control form-control-sm" name="txt_present_address" id="txt_present_address">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Ciudad <span class="text-success">(*)</span></label>
                                    <input type="text" class="form-control form-control-sm" name="txt_city" id="txt_city" style="border-left: 1px solid #ced4da;">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Estado <span class="text-success">(*)</span></label>
                                    <input type="text" class="form-control form-control-sm" name="txt_estado" id="txt_estado" style="border-left: 1px solid #ced4da;">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Propietario Actual</label>
                                    <input type="text" class="form-control form-control-sm" name="txt_present_landlord" id="txt_present_landlord" style="border-left: 1px solid #ced4da;">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Numero del propietario</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                                        <input type="text" class="form-control form-control-sm" name="txt_present_phone" id="txt_present_phone" placeholder="(000) 000-0000">
                                    </div>
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox mt-2">
                                <input type="checkbox" class="custom-control-input coupon_question" id="coupon_question" name="coupon_question" value="1">
                                <label class="custom-control-label font-weight-normal" for="coupon_question" style="font-size: 0.85rem;">&iquest;Tiene acompa&ntilde;ante?</label>
                            </div>
                            <div class="answer col-md-6 px-0">
                                <label>Nombre del Acompa&ntilde;ante</label>
                                <input type="text" class="form-control form-control-sm" name="txtcouple" id="txtcouple" style="border-left: 1px solid #ced4da;">
                            </div>
                        </div>
                    </div>

                    <div class="card card-custom">
                        <div class="card-header-custom">
                            <h6 class="section-title"><i class="fas fa-briefcase mr-2"></i> INFORMACI&Oacute;N DE TRABAJO</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Empresa <span class="text-success">(*)</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-building"></i></span></div>
                                        <input type="text" class="form-control form-control-sm" name="txt_company_name" id="txt_company_name">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Tel&eacute;fono Trabajo <span class="text-success">(*)</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone-square"></i></span></div>
                                        <input type="text" class="form-control form-control-sm" name="txt_company_phone" id="txt_company_phone" placeholder="(000) 000-0000">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Posicion en el Trabajo <span class="text-success">(*)</span></label>
                                    <input type="text" class="form-control form-control-sm" name="txt_company_rubro" id="txt_company_rubro" style="border-left: 1px solid #ced4da;">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>&iquest;Hace cuanto trabaja aqui? <span class="text-success">(*)</span></label>
                                    <input type="text" class="form-control form-control-sm" name="txt_company_how_long" id="txt_company_how_long" style="border-left: 1px solid #ced4da;">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Direcci&oacute;n Empresa <span class="text-success">(*)</span></label>
                                    <input type="text" class="form-control form-control-sm" name="txt_company_address" id="txt_company_address" style="border-left: 1px solid #ced4da;">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Ciudad <span class="text-success">(*)</span></label>
                                    <input type="text" class="form-control form-control-sm" name="txt_company_city" id="txt_company_city" style="border-left: 1px solid #ced4da;">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Estado <span class="text-success">(*)</span></label>
                                    <input type="text" class="form-control form-control-sm" name="txt_company_state" id="txt_company_state" style="border-left: 1px solid #ced4da;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-custom">
                        <div class="card-header-custom">
                            <h6 class="section-title"><i class="fas fa-users mr-2"></i> REFERENCIAS PERSONALES</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-4 mb-3"><label>Ref 1: Nombre <span class="text-success">(*)</span></label><input type="text" name="txt_full_name_reference_1" id="txt_full_name_reference_1" class="form-control form-control-sm" style="border-left: 1px solid #ced4da;"></div>
                                <div class="col-md-4 mb-3"><label>Ref 1: Celular <span class="text-success">(*)</span></label><input type="text" name="txt_phone_reference_1" id="txt_phone_reference_1" placeholder="(000) 000-0000" class="form-control form-control-sm" style="border-left: 1px solid #ced4da;"></div>
                                <div class="col-md-4 mb-3"><label>Ref 1: Relaci&oacute;n <span class="text-success">(*)</span></label><input type="text" name="txt_relation_reference_1" id="txt_relation_reference_1" class="form-control form-control-sm" style="border-left: 1px solid #ced4da;"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 mb-3"><label>Ref 2: Nombre</label><input type="text" name="txt_full_name_reference_2" class="form-control form-control-sm" style="border-left: 1px solid #ced4da;"></div>
                                <div class="col-md-4 mb-3"><label>Ref 2: Celular</label><input type="text" name="txt_phone_reference_2" id="txt_phone_reference_2" placeholder="(000) 000-0000" class="form-control form-control-sm" style="border-left: 1px solid #ced4da;"></div>
                                <div class="col-md-4 mb-3"><label>Ref 2: Relaci&oacute;n</label><input type="text" name="txt_relation_reference_2" class="form-control form-control-sm" style="border-left: 1px solid #ced4da;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-custom">
                        <div class="card-header-custom">
                            <h6 class="section-title"><i class="fas fa-exclamation-triangle mr-2"></i> CASO DE EMERGENCIA</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Nombre <span class="text-success">(*)</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-shield"></i></span></div>
                                        <input type="text" class="form-control form-control-sm" name="txt_name_emergency" id="txt_name_emergency">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3"><label>Celular <span class="text-success">(*)</span></label><input type="text" class="form-control form-control-sm" name="txt_phone_emergency" id="txt_phone_emergency" placeholder="(000) 000-0000" style="border-left: 1px solid #ced4da;"></div>
                                <div class="col-md-4 mb-3"><label>Relaci&oacute;n <span class="text-success">(*)</span></label><input type="text" class="form-control form-control-sm" name="txt_relation_emergency" id="txt_relation_emergency" style="border-left: 1px solid #ced4da;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-custom">
                        <div class="card-header-custom">
                            <h6 class="section-title"><i class="fas fa-calendar-check mr-2"></i> DETALLES Y ENV&Iacute;O</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Fecha tentativa de renta</label>
                                    <div class="row no-gutters">
                                        <div class="col-3 pr-1"><select class="form-control form-control-sm custom-select" name="sle_dia" id="sle_dia" style="border-left: 1px solid #ced4da;"></select></div>
                                        <div class="col-5 pr-1"><select class="form-control form-control-sm custom-select" name="sle_mes" id="sle_mes" style="border-left: 1px solid #ced4da;">
                                                <option value="1">Enero</option>
                                                <option value="2">Febrero</option>
                                                <option value="3">Marzo</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Mayo</option>
                                                <option value="6">Junio</option>
                                                <option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Noviembre</option>
                                                <option value="12">Diciembre</option>
                                            </select></div>
                                        <div class="col-4"><select class="form-control form-control-sm custom-select" name="sle_anio" id="sle_anio" style="border-left: 1px solid #ced4da;">
                                                <option value="2026">2026</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>&iquest;C&oacute;mo se enter&oacute;? <span class="text-success">(*)</span></label>
                                    <select class="form-control form-control-sm custom-select" name="optorigen" id="optorigen" style="border-left: 1px solid #ced4da;">
                                        <option value="">Seleccionar</option>
                                        <option value="Tarjeta">Tarjeta</option>
                                        <option value="Amigos">Amigos</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Periodico">Periodico</option>
                                        <option value="Caminando">Caminando</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Acerca de M&iacute;</label>
                                    <textarea name="txt_acerca" id="txt_acerca" class="form-control form-control-sm" rows="3" placeholder="Cu&eacute;ntanos algo breve..." style="border-left: 1px solid #ced4da;"></textarea>
                                </div>


                                <div class="col-md-12 mb-3">
                                    <label>Adjuntar un ID <span class="text-muted font-weight-normal">(Opcional)</span></label>
                                    <input type="file" class="form-control-file" name="txt_id_image" id="txt_id_image" accept="image/jpeg, image/png, image/gif">

                                    <!-- CONTENEDOR DE VISTA PREVIA Y ERRORES -->
                                    <div id="preview_container" style="display:none; margin-top:15px; border: 2px dashed #28a745; padding: 10px; border-radius: 5px;">
                                        <p style="font-size: 0.7rem; color: #28a745; font-weight: bold; margin-bottom: 5px;">VISTA PREVIA DE TU DOCUMENTO:</p>
                                        <img id="image_preview" src="#" alt="Preview" style="max-width: 100%; height: auto; border-radius: 4px;" />
                                    </div>
                                    <div id="file_error" style="display:none; color: #dc3545; font-weight: bold; margin-top: 10px; padding: 10px; background: #ffe6e6; border-radius: 5px;"></div>
                                    <!-- FIN -->

                                    <small class="text-muted d-block mt-1">
                                        <i class="fas fa-lock"></i> Formatos: JPG, PNG, GIF. Tamaño máximo: 2MB.
                                    </small>
                                </div>

                            </div>

                            <div class="row mt-3 align-items-center">
                                <div class="col-md-6 mb-3">
                                    <div style="transform:scale(0.85); transform-origin:0 0;"><?php echo $this->recaptcha->render(); ?></div>
                                    <small class="text-muted d-block mt-1">
                                        <i class="fas fa-info-circle"></i> Por favor, marca el recuadro del reCAPTCHA primero y luego pulsa el botón <strong>ENVIAR AHORA</strong>.
                                    </small>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-success px-5">ENVIAR AHORA <i class="fas fa-paper-plane ml-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cuartosvacios.com/assets/js/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cuartosvacios.com/assets/js/jquery.maskedinput.js"></script>

    <script>
        $(document).ready(function() {
            for (let i = 1; i <= 31; i++) {
                $('#sle_dia').append('<option value="' + i + '">' + i + '</option>');
            }
            var d = new Date();
            $("#sle_mes").val(d.getMonth() + 1);
            $("#sle_dia").val(d.getDate());

            $(".coupon_question").click(function() {
                if ($(this).is(":checked")) {
                    $(".answer").fadeIn();
                } else {
                    $(".answer").fadeOut();
                }
            });

            // M�scaras de Tel�fono
            $("#txt_phone, #txt_present_phone, #txt_company_phone, #txt_phone_reference_1, #txt_phone_reference_2, #txt_phone_emergency").mask("(999) 999-9999");

            // VALIDACI�N JQUERY COMPLETA
            $('#app_us').validate({
                rules: {
                    txt_full_name: "required",
                    txt_phone: "required",
                    txt_present_address: "required",
                    txt_city: "required",
                    txt_estado: "required",
                    txt_company_name: "required",
                    txt_company_phone: "required",
                    txt_company_rubro: "required",
                    txt_company_how_long: "required",
                    txt_company_address: "required",
                    txt_company_city: "required",
                    txt_company_state: "required",
                    txt_full_name_reference_1: "required",
                    txt_phone_reference_1: "required",
                    txt_relation_reference_1: "required",
                    txt_name_emergency: "required",
                    txt_phone_emergency: "required",
                    txt_relation_emergency: "required",
                    optorigen: "required"
                },
                messages: {
                    txt_full_name: "Este Registro es Obligatorio",
                    txt_phone: "Este Registro es Obligatorio",
                    txt_present_address: "Este Registro es Obligatorio",
                    txt_city: "Este Registro es Obligatorio",
                    txt_estado: "Este Registro es Obligatorio",
                    txt_company_name: "Este Registro es Obligatorio",
                    txt_company_phone: "Este Registro es Obligatorio",
                    txt_company_rubro: "Este Registro es Obligatorio",
                    txt_company_how_long: "Este Registro es Obligatorio",
                    txt_company_address: "Este Registro es Obligatorio",
                    txt_company_city: "Este Registro es Obligatorio",
                    txt_company_state: "Este Registro es Obligatorio",
                    txt_full_name_reference_1: "Este Registro es Obligatorio",
                    txt_phone_reference_1: "Este Registro es Obligatorio",
                    txt_relation_reference_1: "Este Registro es Obligatorio",
                    txt_name_emergency: "Este Registro es Obligatorio",
                    txt_phone_emergency: "Este Registro es Obligatorio",
                    txt_relation_emergency: "Este Registro es Obligatorio",
                    optorigen: "Este Registro es Obligatorio"
                },
                errorElement: "span",
                errorClass: "error",
                errorPlacement: function(error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    if (grecaptcha.getResponse()) {
                        form.submit();
                    } else {
                        alert('POR FAVOR MARQUE EL CAPTCHA DE SEGURIDAD');
                    }
                }
            });

            // VALIDACIÓN DE IMAGEN EN TIEMPO REAL
            $('#txt_id_image').change(function() {
                var file = this.files[0];
                var errorDiv = $('#file_error');
                var previewContainer = $('#preview_container');
                var previewImg = $('#image_preview');

                // Reset de estados
                errorDiv.hide().text("");
                previewContainer.hide();

                if (file) {
                    // 1. Validar Tamaño (2MB = 2 * 1024 * 1024 bytes)
                    if (file.size > 2097152) {
                        errorDiv.html("❌ ¡ARCHIVO DEMASIADO GRANDE! <br> El archivo supera los 2MB permitidos. Por favor, selecciona una imagen más pequeña.").show();
                        $(this).val(''); // Limpiar input
                        return;
                    }

                    // 2. Validar Formato
                    var validTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    if ($.inArray(file.type, validTypes) === -1) {
                        errorDiv.html("❌ ¡FORMATO NO COMPATIBLE! <br> Solo se permiten imágenes en formato JPG, PNG o GIF.").show();
                        $(this).val(''); // Limpiar input
                        return;
                    }

                    // 3. Vista Previa (Si pasa validaciones)
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.attr('src', e.target.result);
                        previewContainer.fadeIn();
                    }
                    reader.readAsDataURL(file);
                }
            });

        });
    </script>
</body>

</html>