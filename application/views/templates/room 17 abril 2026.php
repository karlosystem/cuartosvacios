<?php
//$sub_product_detail come from controller
$CI = &get_Instance();
$CI->load->model("admin/common_model");
$room_id = $this->uri->segment(4); // .../printing/printing_cards/B.-Full-Color-Postcards/19
$tbl = "vw_habitaciones_disponibles";
$col = "pk_listing";
$room = $this->common_model->get_item_by_id($tbl, $col, $room_id);
?>


<div class="bradcam_area bradcam_bg_1">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text text-center">
          <h3>CODIGO DE CUARTO:
            <?php if (!empty($room['auto'])) {
              echo $room['auto'];
            } ?>
          </h3>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="whole-wrap">

<?php if ($room['int_mapa'] == 1 && !empty($room['txt_latitud']) && !empty($room['txt_longitud'])) { ?>
<div class="container box_1170 mt-50">
    <h3 class="mb-20">Ubicación de la Habitación</h3>
    <p>Nota: La ubicación no es la direccián exácta solo es un punto de referencia.</p>
    <div id="map" style="height: 400px; width: 100%; border-radius: 10px; border: 2px solid #eee;"></div>
</div>
<?php } ?>

  <div class="container box_1170">
    <div class="section-top-border">
      <h3 class="mb-30">
        <?php if (!empty($room['txt_sector'])) {
          echo $room['txt_sector'];
        } ?>
      </h3>
      <p class="sample-text mb-30">
        Llámenos o un Texto al <b>718-577-1511</b> Para Agendar una Cita
        <a target="_new" href="https://api.whatsapp.com/send?phone=17185771511&text=Mas%20Informacion" class="btn btn-danger">LLAMAR AHORA</a>
      </p>
      <div class="row">
        <div class="col-md-3">
          <div class="typography">
            <h3>Disponible Ahora</h3>
            <p>
            <div class="fb-like" data-href="https://www.facebook.com/sorayacuartos" data-width="" data-layout="button" data-action="like" data-size="large" data-share="false"></div>
            </p>

            <ul class="unordered-list">
              <li><span>CODIGO:
                  <?php if (!empty($room['auto'])) {
                    echo $room['auto'];
                  } ?>
                </span></li>
            </ul>

          </div>



          <a href="https://www.youtube.com/@sorayarooms/shorts" target="_new">
            <img src="<?php echo base_url(); ?>assets/images/video.png" class="img-fluid center-block d-block mx-auto" alt="See Video">
          </a>

        </div>
        <div class="col-md-6 mt-sm-20">
          <div class="">
            <ul class="unordered-list">

              <li>Cuarto Para: <strong>
                  <?php if (!empty($room['tipo'])) {
                    echo $room['tipo'];
                  } ?>
                </strong></li>
              <!-- <li><?php if (!empty($room['txt_caracteristicas'])) {
                          echo $room['txt_caracteristicas'];
                        } ?></li> -->

            </ul>
          </div>
        </div>

        <div class="col-md-3 mt-sm-20">
          <div class="typography">
            <!-- <h4>ROOMS VIDEOS:</h4> -->
            <a href="https://www.youtube.com/@sorayarooms/shorts" target="_new">
              <img src="<?php echo base_url(); ?>assets/img/subscribe_now.png" class="img-fluid">
            </a>
          </div>
          <a href="https://www.instagram.com/sorayarooms/" target="_blank">
            <img src="<?php echo base_url(); ?>assets/img/instagram.png" class="img-fluid">
          </a>
          <a href="https://www.tiktok.com/@sorayarooms" target="_blank">
            <img src="<?php echo base_url(); ?>assets/images/tiktok.jpg" class="img-fluid">
          </a>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="container-fluid" id="cont">
  <h3 class="text-white text-center">Siguenos en Nuestras Redes Sociales</h3>
  <div class="row">
    <div class="col-sm-12">
      <div class="middle">
        <a class="btn2" href="https://www.facebook.com/sorayaroomsoficial">
          <i class="fab fa-facebook-f"></i>
        </a>

        <a class="btn2" href="https://www.tiktok.com/@sorayarooms">
          <i class="fab fa-tiktok"></i>
        </a>

        <a class="btn2" href="https://www.instagram.com/sorayarooms/?hl=es-la">
          <i class="fab fa-instagram"></i>
        </a>

        <a class="btn2" href="https://api.whatsapp.com/send?phone=17185771511&text=Mas%20Informacion">
          <i class="fab fa-whatsapp"></i>
        </a>

        <a class="btn2" href="https://www.youtube.com/channel/UCwEsIp3LpTuVh5sGvAAzn4g/videos">
          <i class="fab fa-youtube"></i>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="property_details">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
        <div class="contact_field">
          <h3>Nuestro Canal de YouTube</h3>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
        <a href="https://www.youtube.com/channel/UCwEsIp3LpTuVh5sGvAAzn4g/videos" target="_new">
          <img src="<?php echo base_url(); ?>assets/img/youtube.jpg" class="img-fuid">
        </a>
      </div>
    </div>
  </div>

</div>



<section class="sample-text-area">
  <div class="container box_1170">
    <h3 class="text-heading">AVISO IMPORTANTE DE SORAYA ROOM</h3>
    <p class="sample-text">
      La información de las habitaciones es referencial y puede variar. Recomendamos verificar todos los detalles durante la visita. Soraya Rooms actúa como intermediario en el proceso y no asume responsabilidad por condiciones o situaciones futuras relacionadas con el inmueble, tanto para el inquilino como para el propietario. La decisión final y la verificación de la información quedan bajo responsabilidad del cliente.
    </p>
  </div>
</section>

<script>
  // Estilos del marcador (Mantenemos tu diseño original con pulsación)
  var styles = `.custom-div-icon { position: relative; border: none; background: transparent; } .custom-div-icon-marker { width: 14px; height: 14px; background: #e91e63; border-radius: 50%; position: absolute; left: 50%; top: 50%; margin: -7px 0 0 -7px; box-shadow: 0 0 10px rgba(0,0,0,0.5); border: 2px solid #fff; z-index: 2; } .custom-div-icon::after { content: ''; width: 20px; height: 20px; background-color: #e91e63; border-radius: 50%; position: absolute; top: 50%; left: 50%; margin: -10px 0 0 -10px; opacity: 0; animation: pulsar 1.5s ease-out infinite; z-index: 1; } @keyframes pulsar { 0% { transform: scale(0.1); opacity: 0; } 50% { opacity: 0.5; } 100% { transform: scale(2.5); opacity: 0; } }`;
  var styleSheet = document.createElement("style");
  styleSheet.innerText = styles;
  document.head.appendChild(styleSheet);

  document.addEventListener('DOMContentLoaded', function() {
    // 1. Obtener datos desde PHP
    var lat = "<?php echo $room['txt_latitud']; ?>"; 
    var lon = "<?php echo $room['txt_longitud']; ?>";
    var direccionMapa = "<?php echo $room['txt_mapa']; ?>"; 
    var roomId = "<?php echo $room['auto']; ?>";

    // 2. Validar coordenadas
    if (lat !== "" && lon !== "") {
        var latFloat = parseFloat(lat);
        var lonFloat = parseFloat(lon);

        // 3. Inicializar el mapa
        var map = L.map('map').setView([latFloat, lonFloat], 17); 
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        var customIcon = L.divIcon({
          className: 'custom-div-icon',
          html: "<div class='custom-div-icon-marker'></div>",
          iconSize: [20, 20],
          iconAnchor: [10, 10]
        });

        // --- NUEVA LÓGICA: WHATSAPP EN POPUP ---
        var whatsappUrl = "https://wa.me/17185771511?text=Yo%20estoy%20interesado%20en%20este%20cuarto%20ID:%20" + roomId;

        var popupContent = `
            <div style="text-align:center; min-width: 150px;">
                <div style="margin-bottom: 5px;">
                    <b style="font-size:14px;">ID: ${roomId}</b>
                    <a href="${whatsappUrl}" target="_blank" style="margin-left:8px; text-decoration:none;" title="Contactar por WhatsApp">
                        <i class="fab fa-whatsapp" style="color:#25D366; font-size:18px; vertical-align:middle;"></i>
                    </a>
                </div>
                <div style="font-size:12px; color:#555; line-height: 1.4;">
                    ${direccionMapa}
                </div>
            </div>
        `;
        // ---------------------------------------

        // 4. Colocar el marcador con el nuevo Popup
        L.marker([latFloat, lonFloat], {
            icon: customIcon
        }).addTo(map)
        .bindPopup(popupContent) 
        .openPopup();
        
    } else {
        console.warn("No hay coordenadas para el ID: " + roomId);
    }
  });
</script>