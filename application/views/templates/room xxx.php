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
        <?php 
          // Mostramos la Ciudad y el Sector juntos para mayor claridad
          if (!empty($room['txt_ciudad'])) {
              echo strtoupper($room['txt_ciudad']); 
          }
          if (!empty($room['txt_sector'])) {
              echo " - " . $room['txt_sector'];
          }
        ?>
      </h3>
      <p class="sample-text mb-30">
        Llámenos o un Texto al <b>718-577-1511</b> Para Agendar una Cita
        <a target="_new" href="https://api.whatsapp.com/send?phone=17185771511&text=Mas%20Informacion" class="btn btn-danger">LLAMAR AHORA</a>
      </p>
      <div class="row">


       <div class="col-md-9 mt-sm-20">
    <div class="typography">
        <h3>Detalles de la Habitación</h3>
        <table class="table table-bordered table-sm text-center" style="font-size: 13px; background: #f9f9f9;">
            <tbody>
                <tr>
                    <td class="text-left"><i class="fas fa-wifi"></i> WiFi</td>
                    <td><strong><?php echo ($room['int_wifi'] == 1) ? '<i class="fas fa-check-circle text-success" style="font-size: 16px;"></i>' : '-'; ?></strong></td>
                   
                </tr>
                <tr>
                    <td class="text-left"><i class="fas fa-bed"></i> Amoblado</td>
                    <td><strong><?php echo ($room['int_amoblado'] == 1) ? '<i class="fas fa-check-circle text-success" style="font-size: 16px;"></i>' : '-'; ?></strong></td>
                    <td class="text-left"><i class="fas fa-users"></i> Pareja</td>
                    <td><strong><?php echo ($room['int_pareja'] == 1) ? '<i class="fas fa-check-circle text-success" style="font-size: 16px;"></i>' : '-'; ?></strong></td>
                </tr>
                <tr>
                    <td class="text-left"><i class="fas fa-restroom"></i> Baño Privado</td>
					<td><strong><?php echo ($room['int_bpriv'] == 1) ? '<i class="fas fa-check-circle text-success" style="font-size: 16px;"></i>' : '-'; ?></strong></td>
                    <td class="text-left"><i class="fas fa-child"></i> Niños</td>
                    <td><strong><?php echo ($room['int_kds'] == 1) ? '<i class="fas fa-check-circle text-success" style="font-size: 16px;"></i>' : '-'; ?></strong></td>
                </tr>
                <tr>
					<td class="text-left"><i class="fas fa-utensils"></i> Cocina</td>
                    <td><strong><?php echo ($room['int_cocina'] == 1) ? '<i class="fas fa-check-circle text-success" style="font-size: 16px;"></i>' : '-'; ?></strong></td>

                    <td class="text-left"><i class="fas fa-user-friends"></i> Visita</td>
                    <td><strong><?php echo ($room['int_visita'] == 1) ? '<i class="fas fa-check-circle text-success" style="font-size: 16px;"></i>' : '-'; ?></strong></td>
                </tr>
                <tr>                  
					<td class="text-left"><i class="fas fa-arrow-up"></i> Elevador</td>
                    <td><strong><?php echo ($room['int_ascensor'] == 1) ? '<i class="fas fa-check-circle text-success" style="font-size: 16px;"></i>' : '-'; ?></strong></td>
                    <td class="text-left"><i class="fas fa-smoking"></i> Fumar</td>
                    <td><strong><?php echo ($room['int_fumar'] == 1) ? '<i class="fas fa-check-circle text-danger" style="font-size: 16px;"></i>' : '-'; ?></strong></td>
                </tr>
            </tbody>
        </table>

        <div class="mt-20 text-center">
            <a href="<?php echo base_url(); ?>" class="genric-btn info-border circle btn-sm" style="font-weight: bold; padding: 0 20px; font-size: 12px; height: 35px; line-height: 33px;">
                <i class="fas fa-arrow-left"></i> VER MAS CUARTOS
            </a>
        </div>
    </div>
</div>

        <div class="col-md-3 mt-sm-20">
          <div class="typography text-center">
            <?php
            $periodo = "";
            $precio_solo = "";
            $precio_pareja = "";

            if (!empty($room['txt_precio_solo']) || !empty($room['txt_precio_pareja'])) {
              $periodo = "SEMANAL";
              $precio_solo = "$ " . ($room['txt_precio_solo'] ?: '0');
              $precio_pareja = "$ " . ($room['txt_precio_pareja'] ?: '0');
            } elseif (!empty($room['txt_precio_mensual']) || !empty($room['txt_precio_mensual01'])) {
              $periodo = "MENSUAL";
              $precio_solo = "$ " . ($room['txt_precio_mensual'] ?: '0');
              $precio_pareja = "$ " . ($room['txt_precio_mensual01'] ?: '0');
            }
            ?>

            <div class="price_side_block p-3 mb-3" style="background: #fdfdfd; border: 1px solid #eee; border-radius: 12px;">

            <ul class="unordered-list mt-2">
              Cuarto Para: <strong><?php echo !empty($room['tipo']) ? $room['tipo'] : 'N/A'; ?></strong>
              <?php if (!empty($room['txt_otros'])): ?>
                <li>Otros: <strong><?php echo $room['txt_otros']; ?></strong></li>
              <?php endif; ?>
            </ul>

              <div class="d-flex align-items-center justify-content-around mt-3">

              
                <div class="text-center px-2">
                  <small class="d-block text-muted" style="font-size: 10px; text-transform: uppercase; margin-bottom: 5px;">SOLO</small>
                  <div class="d-flex align-items-center justify-content-center">
                    <i class="fas fa-user mr-1" style="font-size: 14px; color: #6c757d;"></i>
                    <span class="font-weight-bold" style="font-size: 18px; color: #3d5afe;">
                      <?php echo $precio_solo; ?>
                    </span>
                  </div>
                </div>

                <div style="border-left: 1px solid #eee; height: 40px;"></div>

                <div class="text-center px-2">
                  <small class="d-block text-muted" style="font-size: 10px; text-transform: uppercase; margin-bottom: 5px;">PAREJA</small>
                  <div class="d-flex align-items-center justify-content-center">
                    <i class="fas fa-user-friends mr-1" style="font-size: 14px; color: #6c757d;"></i>
                    <span class="font-weight-bold" style="font-size: 18px; color: #3d5afe;">
                      <?php echo $precio_pareja; ?>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <?php if (!empty($periodo)): ?>
              <div class="mb-3">
                <span class="genric-btn info circle btn-sm px-4" style="cursor: default; font-weight: bold; pointer-events: none;">
                  <?php echo $periodo; ?>
                </span>
              </div>
            <?php endif; ?>

            <a href="https://www.youtube.com/@sorayarooms/shorts" target="_new" class="d-block mt-4">
              <img src="<?php echo base_url(); ?>assets/img/subscribe_now.png" class="img-fluid" style="max-width: 150px; opacity: 0.8;">
            </a>
          </div>
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