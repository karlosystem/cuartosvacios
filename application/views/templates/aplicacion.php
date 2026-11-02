<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application | Cuartos Vac&iacute;os</title>
    
    <link rel="stylesheet" href="https://cuartosvacios.com/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        /* Hero Section with Banner */
        .hero-section {
            background: linear-gradient(rgba(40, 167, 69, 0.8), rgba(32, 201, 151, 0.8)), url('banner_room.webp');
            background-size: cover;
            background-position: center;
            color: white; 
            padding: 50px 0; 
            margin-bottom: -40px;
        }
        .logo-container img {
            max-width: 170px;
            margin-bottom: 15px;
            filter: drop-shadow(0px 4px 4px rgba(0,0,0,0.2));
        }

        /* Card Styles */
        .card-custom {
            border: none; border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05); margin-bottom: 25px;
        }
        .card-header-custom {
            background-color: #fff; border-bottom: 1px solid #eef2f1;
            padding: 15px 20px; border-radius: 12px 12px 0 0 !important;
        }
        .section-title {
            color: #28a745; text-transform: uppercase;
            font-size: 0.85rem; letter-spacing: 1px; font-weight: bold;
        }

        /* Compact Inputs and Icons */
        .input-group-text { background-color: #f8f9fa; border-right: none; color: #6c757d; }
        .form-control-sm { border-left: none; }
        .form-control:focus { border-color: #ced4da; box-shadow: none; }
        label { font-weight: 600; color: #495057; font-size: 0.8rem; margin-bottom: 4px; }
        .btn-success { border-radius: 50px; padding: 12px 45px; font-weight: bold; font-size: 1rem; }
        
        /* Validation Errors */
        .error { 
            color: #dc3545; 
            font-size: 11px; 
            margin-top: 4px; 
            display: block; 
            width: 100%;
            font-weight: normal;
        }
        .is-invalid { border-color: #dc3545 !important; }

        .welcome-img {
            width: 100%; border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<section class="hero-section text-center">
    <div class="container">
        <div class="logo-container">
            <img src="https://cuartosvacios.com/assets/img/logo-soraya.png" alt="Soraya Rooms Logo">
        </div>
        <h2 class="font-weight-bold">Application Form</h2>
        <p>In order to find a new room, please complete the form.</p>
        <a href="https://cuartosvacios.com/" class="btn btn-outline-light btn-sm"><i class="fas fa-arrow-left"></i> Go Back to Home</a>
    </div>
</section>

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="card card-custom mt-5 p-3">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <img src="https://cuartosvacios.com/assets/img/couple_room.jpg" alt="Welcome" class="welcome-img">
                    </div>
                    <div class="col-md-7">
                        <h4 class="text-success font-weight-bold">You are one step away!</h4>
                        <p class="text-muted small">In order to find a new room, please complete the form.</p>
                    </div>
                </div>
            </div>

            <form id="app_us" name="app_us" action="<?php echo base_url(); ?>aplicacion/guardar" method="post">
                <input type="hidden" value="karlosystem@gmail.com" name="txt_email" />
                <input type="hidden" value="CV" name="txtprocedencia" />

                <div class="card card-custom">
                    <div class="card-header-custom">
                        <h6 class="section-title"><i class="fas fa-user mr-2"></i> PERSONAL INFORMATION</h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Full Name <span class="text-success">(*)</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-id-card"></i></span></div>
                                    <input type="text" class="form-control form-control-sm" name="txt_full_name" id="txt_full_name" placeholder="e.g. John Doe">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone <span class="text-success">(*)</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-mobile-alt"></i></span></div>
                                    <input type="text" class="form-control form-control-sm" name="txt_phone" id="txt_phone" placeholder="(000) 000-0000">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Present Address <span class="text-success">(*)</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span></div>
                                    <input type="text" class="form-control form-control-sm" name="txt_present_address" id="txt_present_address">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>City <span class="text-success">(*)</span></label>
                                <input type="text" class="form-control form-control-sm" name="txt_city" id="txt_city" style="border-left: 1px solid #ced4da;">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>State <span class="text-success">(*)</span></label>
                                <input type="text" class="form-control form-control-sm" name="txt_estado" id="txt_estado" style="border-left: 1px solid #ced4da;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Present Landlord <span class="text-success">(*)</span></label>
                                <input type="text" class="form-control form-control-sm" name="txt_present_landlord" id="txt_present_landlord" style="border-left: 1px solid #ced4da;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Landlor's Phone</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                                    <input type="text" class="form-control form-control-sm" name="txt_present_phone" id="txt_present_phone">
                                </div>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox mt-2">
                            <input type="checkbox" class="custom-control-input coupon_question" id="coupon_question" name="coupon_question" value="1">
                            <label class="custom-control-label font-weight-normal" for="coupon_question" style="font-size: 0.85rem;">Do you have Partner?</label>
                        </div>
                        <div class="answer col-md-6 px-0 mt-3" style="display:none; border-left: 3px solid #28a745; padding-left: 15px;">
                            <label>Partner's Full Name</label>
                            <input type="text" class="form-control form-control-sm" name="txtcouple" id="txtcouple" style="border-left: 1px solid #ced4da;">
                        </div>
                    </div>
                </div>

                <div class="card card-custom">
                    <div class="card-header-custom">
                        <h6 class="section-title"><i class="fas fa-briefcase mr-2"></i> JOBS INFORMATION</h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Company Name <span class="text-success">(*)</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-building"></i></span></div>
                                    <input type="text" class="form-control form-control-sm" name="txt_company_name" id="txt_company_name">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Company Phone <span class="text-success">(*)</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone-square"></i></span></div>
                                    <input type="text" class="form-control form-control-sm" name="txt_company_phone" id="txt_company_phone">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Position / Job <span class="text-success">(*)</span></label>
                                <input type="text" class="form-control form-control-sm" name="txt_company_rubro" id="txt_company_rubro" style="border-left: 1px solid #ced4da;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>How Long? <span class="text-success">(*)</span></label>
                                <input type="text" class="form-control form-control-sm" name="txt_company_how_long" id="txt_company_how_long" style="border-left: 1px solid #ced4da;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Company Address <span class="text-success">(*)</span></label>
                                <input type="text" class="form-control form-control-sm" name="txt_company_address" id="txt_company_address" style="border-left: 1px solid #ced4da;">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>City <span class="text-success">(*)</span></label>
                                <input type="text" class="form-control form-control-sm" name="txt_company_city" id="txt_company_city" style="border-left: 1px solid #ced4da;">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>State <span class="text-success">(*)</span></label>
                                <input type="text" class="form-control form-control-sm" name="txt_company_state" id="txt_company_state" style="border-left: 1px solid #ced4da;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-custom">
                    <div class="card-header-custom">
                        <h6 class="section-title"><i class="fas fa-users mr-2"></i> PERSONAL REFERENCES (FAMILY OR FRIENDS)</h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-4 mb-3"><label>Ref 1: Full Name <span class="text-success">(*)</span></label><input type="text" name="txt_full_name_reference_1" id="txt_full_name_reference_1" class="form-control form-control-sm" style="border-left: 1px solid #ced4da;"></div>
                            <div class="col-md-4 mb-3"><label>Ref 1: Phone <span class="text-success">(*)</span></label><input type="text" name="txt_phone_reference_1" id="txt_phone_reference_1" class="form-control form-control-sm" style="border-left: 1px solid #ced4da;"></div>
                            <div class="col-md-4 mb-3"><label>Ref 1: Relation Ship <span class="text-success">(*)</span></label><input type="text" name="txt_relation_reference_1" id="txt_relation_reference_1" class="form-control form-control-sm" style="border-left: 1px solid #ced4da;"></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 mb-3"><label>Ref 2: Full Name</label><input type="text" name="txt_full_name_reference_2" class="form-control form-control-sm" style="border-left: 1px solid #ced4da;"></div>
                            <div class="col-md-4 mb-3"><label>Ref 2: Phone</label><input type="text" name="txt_phone_reference_2" id="txt_phone_reference_2" class="form-control form-control-sm" style="border-left: 1px solid #ced4da;"></div>
                            <div class="col-md-4 mb-3"><label>Ref 2: Relation Ship</label><input type="text" name="txt_relation_reference_2" class="form-control form-control-sm" style="border-left: 1px solid #ced4da;"></div>
                        </div>
                    </div>
                </div>

                <div class="card card-custom">
                    <div class="card-header-custom">
                        <h6 class="section-title"><i class="fas fa-exclamation-triangle mr-2"></i> IN CASE OF EMERGENCY NOTIFY TO:</h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Full Name <span class="text-success">(*)</span></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-shield"></i></span></div>
                                    <input type="text" class="form-control form-control-sm" name="txt_name_emergency" id="txt_name_emergency">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3"><label>Phone <span class="text-success">(*)</span></label><input type="text" class="form-control form-control-sm" name="txt_phone_emergency" id="txt_phone_emergency" style="border-left: 1px solid #ced4da;"></div>
                            <div class="col-md-4 mb-3"><label>Relation <span class="text-success">(*)</span></label><input type="text" class="form-control form-control-sm" name="txt_relation_emergency" id="txt_relation_emergency" style="border-left: 1px solid #ced4da;"></div>
                        </div>
                    </div>
                </div>

                <div class="card card-custom">
                    <div class="card-header-custom">
                        <h6 class="section-title"><i class="fas fa-calendar-check mr-2"></i> MOVE IN & SENDING</h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Move in date</label>
                                <div class="row no-gutters">
                                    <div class="col-3 pr-1"><select class="form-control form-control-sm custom-select" name="sle_dia" id="sle_dia" style="border-left: 1px solid #ced4da;"></select></div>
                                    <div class="col-5 pr-1"><select class="form-control form-control-sm custom-select" name="sle_mes" id="sle_mes" style="border-left: 1px solid #ced4da;">
                                        <option value="01">January</option><option value="02">February</option><option value="03">March</option>
                                        <option value="04">April</option><option value="05">May</option><option value="06">June</option>
                                        <option value="07">July</option><option value="08">August</option><option value="09">September</option>
                                        <option value="10">October</option><option value="11">November</option><option value="12">December</option>
                                    </select></div>
                                    <div class="col-4"><select class="form-control form-control-sm custom-select" name="sle_anio" id="sle_anio" style="border-left: 1px solid #ced4da;"><option value="2026">2026</option></select></div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>How did you hear about us? <span class="text-success">(*)</span></label>
                                <select class="form-control form-control-sm custom-select" name="optorigen" id="optorigen" style="border-left: 1px solid #ced4da;">
                                    <option value="">Select a Option</option>
                                    <option value="Tarjeta">Business Card</option><option value="Amigos">Friends</option>
                                    <option value="Internet">Internet</option><option value="Periodico">Newspaper</option>
                                    <option value="Walking">Walking</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>About Me</label>
                                <textarea name="txt_acerca" id="txt_acerca" class="form-control form-control-sm" rows="3" placeholder="Tell us something brief..." style="border-left: 1px solid #ced4da;"></textarea>
                            </div>
                        </div>

                        <div class="row mt-3 align-items-center">
                            <div class="col-md-6 mb-3">
                                <div style="transform:scale(0.85); transform-origin:0 0;"><?php echo $this->recaptcha->render(); ?></div>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-success px-5">SEND NOW <i class="fas fa-paper-plane ml-2"></i></button>
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
    $(document).ready(function () {
        for(let i=1; i<=31; i++) { $('#sle_dia').append('<option value="'+(i<10?'0'+i:i)+'">'+i+'</option>'); }
        var d = new Date();
        $("#sle_mes").val(("0" + (d.getMonth() + 1)).slice(-2));
        $("#sle_dia").val(("0" + d.getDate()).slice(-2));

        $(".coupon_question").click(function () {
            if ($(this).is(":checked")) { $(".answer").fadeIn(); } else { $(".answer").fadeOut(); }
        });

        // Phone Masks
        $("#txt_phone, #txt_present_phone, #txt_company_phone, #txt_phone_reference_1, #txt_phone_reference_2, #txt_phone_emergency").mask("(999) 999-9999");

        // JQUERY VALIDATION (English)
        $('#app_us').validate({
            rules: {
                txt_full_name: "required", txt_phone: "required", txt_present_address: "required",
                txt_city: "required", txt_estado: "required", txt_present_landlord: "required",
                txt_company_name: "required", txt_company_phone: "required", txt_company_how_long: "required",
                txt_company_address: "required", txt_company_city: "required", txt_company_state: "required",
                txt_full_name_reference_1: "required", txt_phone_reference_1: "required", txt_relation_reference_1: "required",
                txt_name_emergency: "required", txt_phone_emergency: "required", txt_relation_emergency: "required",
                optorigen: "required"
            },
            messages: {
                required: "This Record is Mandatory"
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
            highlight: function(element) { $(element).addClass('is-invalid'); },
            unhighlight: function(element) { $(element).removeClass('is-invalid'); },
            submitHandler: function(form) {
                if (grecaptcha.getResponse()) {
                    form.submit();
                } else {
                    alert('PLEASE CHECK THE CAPTCHA BOX');
                }
            }
        });
    });
</script>
</body>
</html>