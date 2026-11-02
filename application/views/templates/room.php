<?php
$CI = &get_Instance();
$CI->load->model("admin/common_model");
$room_id = "S-" . $this->uri->segment(4);
$tbl = "vw_habitaciones_disponibles";
$col = "txt_serie";
$room = $this->common_model->get_item_by_id($tbl, $col, $room_id);

$CI->db->select('*');
$CI->db->from('vw_habitaciones_disponibles');
$CI->db->where('txt_zip', $room['txt_zip']);
$CI->db->limit(12);
$CI->db->order_by('txt_zip', 'ASC'); // Agrupa los resultados visualmente por sector

$related_rooms = $CI->db->get()->result_array();
?>

<div class="bradcam_area bradcam_bg_1">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text text-center">
          <h3>CODIGO DE CUARTO:
            <?php if (!empty($room['txt_serie'])) {
              echo $room['txt_serie'];
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
            <h3 class="mb-4">Detalles de la Habitación</h3>
            <div class="row no-gutters">
              <?php
              // Definimos los atributos en un array para iterar limpiamente
              $atributos = [
                ['val' => $room['int_wifi'],       'label' => 'WiFi',            'icon' => 'fas fa-wifi'],
                ['val' => $room['int_amoblado'],   'label' => 'Amoblado',        'icon' => 'fas fa-bed'],
                ['val' => $room['int_bpriv'],      'label' => 'Baño Privado',    'icon' => 'fas fa-restroom'],
                ['val' => $room['int_cocina'],     'label' => 'Cocina',          'icon' => 'fas fa-utensils'],
                ['val' => $room['int_ascensor'],   'label' => 'Elevador',        'icon' => 'fas fa-arrow-up'],
                ['val' => $room['int_pareja'],     'label' => 'Pareja',          'icon' => 'fas fa-users'],
                ['val' => $room['int_kds'],        'label' => 'Niños',           'icon' => 'fas fa-child'],
                ['val' => $room['int_visita'],     'label' => 'Visita',          'icon' => 'fas fa-user-friends'],
                ['val' => $room['int_ind'],        'label' => 'Independente',     'icon' => 'fas fa-user-lock'],
                ['val' => $room['int_lavanderia'], 'label' => 'Laundry',         'icon' => 'fas fa-tshirt'],
                ['val' => $room['int_sotano'],     'label' => 'Basement',        'icon' => 'fas fa-level-down-alt'],
                ['val' => $room['int_mascota'],    'label' => 'Mascota',         'icon' => 'fas fa-paw'],
                ['val' => $room['int_fumar'],      'label' => 'Fumar',           'icon' => 'fas fa-smoking'],
              ];

              foreach ($atributos as $atrib):
                if ($atrib['val'] == 1): ?>
                  <div class="col-6 col-md-4 col-lg-3 mb-3 px-2">
                    <div class="d-flex align-items-center p-3 rounded shadow-sm border" style="background: #ffffff; height: 100%;">
                      <div class="mr-3 text-center" style="width: 35px;">
                        <i class="<?php echo $atrib['icon']; ?> text-primary" style="font-size: 1.2rem;"></i>
                      </div>
                      <div>
                        <span class="d-block font-weight-bold text-dark" style="font-size: 13px; line-height: 1.2;">
                          <?php echo $atrib['label']; ?>
                        </span>
                        <small class="text-success">
                          <i class="fas fa-check-circle" style="font-size: 14px;"></i>
                        </small>
                      </div>
                    </div>
                  </div>
              <?php endif;
              endforeach; ?>
            </div>

            <div class="mt-4 mb-4 text-center">
              <button type="button"
                id="btn-main-favorito"
                class="btn btn-outline-danger btn-lg btn-favorito shadow-sm font-weight-bold d-inline-flex align-items-center justify-content-center"
                data-id="<?php echo $room['pk_listing']; ?>"
                style="border-radius: 30px; padding: 12px 35px; transition: all 0.3s ease;">
                <i class="far fa-heart mr-2" id="icon-fav-main" style="font-size: 20px;"></i>
                <span id="text-fav-main">AGREGAR A FAVORITOS</span>
              </button>

              <p class="text-muted mt-3 mb-0" style="font-size: 14px; max-width: 500px; margin: 0 auto; line-height: 1.4;">
                <i class="fas fa-info-circle text-info"></i> <strong>¿Cómo funciona?</strong> Al hacer clic, este cuarto se guardará en tu lista personalizada. Podrás compararlos más tarde y acceder rápidamente desde el menú superior.
              </p>
            </div>


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

            <?php
            // 0 => se muestra, 1 => ocultar
            if ($room['fk_precio'] == 1):
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

            <?php endif; // Fin del condicional fk_precio 
            ?>

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

        <a class="btn2 whatsapp-channel" href="https://whatsapp.com/channel/0029ValgvIjDjiOaDfHBEn3m">
          <i class="fab fa-whatsapp"></i>
        </a>

        <a class="btn2" href="https://open.spotify.com/artist/44xBeRILz5V0VBMoResHKI?si=QI7cWVFPQ_6OWlq8u7pdiQ">
          <i class="fab fa-spotify"></i>
        </a>

        <a class="btn2" href="https://www.youtube.com/channel/UCwEsIp3LpTuVh5sGvAAzn4g/videos">
          <i class="fab fa-youtube"></i>
        </a>
      </div>
    </div>
  </div>
</div>

<section class="popular_property section-padding" style="background-color: #f9f9f9; padding-top: 50px;">
  <div class="container box_1170">
    <h2 class="mb-5 text-center">HABITACIONES QUE LE PODRIA INTERESAR</h2>

    <?php if (!empty($related_rooms)): ?>
      <div class="row">
        <?php foreach ($related_rooms as $cuarto):
          
          // ==========================================
          // 1. CALCULAR COLOR TEMÁTICO (Lógica para Array)
          // ==========================================
          $tipo_completo = isset($cuarto['tipo']) ? $cuarto['tipo'] : '';
          $tipo_cuarto = '';
          if (!empty($tipo_completo)) {
              if (preg_match('/^(H\/P|M\/P|U\/P)/i', $tipo_completo, $matches)) {
                  $tipo_cuarto = strtoupper($matches[1]);
              } else {
                  $primer_caracter = strtoupper(trim(substr($tipo_completo, 0, 1)));
                  if (in_array($primer_caracter, array('H', 'M', 'U', 'P'))) {
                      $tipo_cuarto = $primer_caracter;
                  }
              }
          }
          $colors_map = array(
              'M' => '#FF69B4', 'H' => '#4169E1', 'U' => '#FFD700', 'P' => '#32CD32',
              'H/P' => '#D2B48C', 'M/P' => '#FF8C00', 'U/P' => '#9370DB'
          );
          $theme_color = isset($colors_map[$tipo_cuarto]) ? $colors_map[$tipo_cuarto] : '#6c757d';
          
          $codigo_limpio = str_replace("S-", "", $cuarto['txt_serie']);
          $url_detalle = base_url() . 'sorayarooms/cuartos_vacios/' . str_replace(' ', '-', safename($cuarto['txt_ciudad'])) . '/' . $codigo_limpio;

          // ==========================================
          // 2. PRECIOS Y PERIODO
          // ==========================================
          $periodo = "";
          $precio_solo = "";
          $precio_pareja = "";

          if (!empty($cuarto['txt_precio_solo']) || !empty($cuarto['txt_precio_pareja'])) {
              $periodo = "SEMANAL";
              $precio_solo = "$ " . $cuarto['txt_precio_solo'];
              $precio_pareja = "$ " . $cuarto['txt_precio_pareja'];
          } else {
              $periodo = "MENSUAL";
              $precio_solo = "$ " . $cuarto['txt_precio_mensual'];
              $precio_pareja = "$ " . $cuarto['txt_precio_mensual01'];
          }

          // ==========================================
          // 3. ETIQUETAS NUEVO / ACTUALIZADO
          // ==========================================
          date_default_timezone_set('America/New_York');
          $hoy_sistema = date('Y-m-d');
          $f_registro = trim(substr((string)$cuarto['fecha_registro'], 0, 10));
          $f_ingreso  = trim(substr((string)$cuarto['fecha_ingreso'], 0, 10));

          $mostrar_tag = false;
          $texto_tag = "";
          $clase_borde_cuadro = "";
          
          if ($f_registro == $hoy_sistema) {
              $mostrar_tag = true;
              $texto_tag = "NUEVO";
              $clase_borde_cuadro = "card-nuevo";
          } elseif ($f_ingreso == $hoy_sistema) {
              $mostrar_tag = true;
              $texto_tag = "ACTUALIZADO";
              $clase_borde_cuadro = "card-actualizado";
          }

          $etiqueta = $cuarto['txt_etiqueta'];
        ?>

        <!-- ==========================================
             TARJETA MODERNA DE CUARTO RELACIONADO
             ========================================== -->
        <div class="col-xl-3 col-md-4 col-lg-3 col-sm-6 mb-4">
            <div class="card-cuarto-modern <?php echo $clase_borde_cuadro; ?>" style="border-top: 3px solid <?php echo $theme_color; ?>;">
                
                <!-- Badges Superiores -->
                <div class="badge-top-right">
                    <button class="btn-favorito-circle btn-favorito" 
                            data-id="<?php echo $codigo_limpio; ?>" 
                            title="Agregar a favoritos"
                            data-text-add="Agregar a Favoritos"
                            data-text-remove="Quitar de Favoritos">
                        <i class="far fa-heart"></i>
                        <span class="btn-favorito-text">Agregar a Favoritos</span>
                    </button>
                </div>

                <?php if ($mostrar_tag): ?>
                    <div class="badge-top-left">
                        <span class="badge-top" style="background-color: <?php echo ($texto_tag == 'NUEVO') ? '#10b981' : '#3b82f6'; ?>; color: white; font-size: 10px; font-weight: 700; padding: 4px 10px; border-radius: 20px;">
                            <?php echo $texto_tag; ?>
                        </span>
                    </div>
                <?php endif; ?>

                <!-- Icono de Casa y Código -->
                <div class="card-header-info">
                    <div class="icon-casa-circle" style="background-color: <?php echo $theme_color; ?>20; color: <?php echo $theme_color; ?>;">
                        <i class="fas fa-home"></i>
                    </div>
                    
                    <div class="codigo-wrapper">
                        <span class="codigo-label">CÓDIGO</span>
                        <h3 class="codigo-cuarto" style="color: <?php echo $theme_color; ?>;"><?php echo $codigo_limpio; ?></h3>
                        
                        <?php if ($cuarto['int_mapa'] == 1 && !empty($cuarto['txt_latitud']) && !empty($cuarto['txt_longitud'])): ?>
                            <a href="<?php echo $url_detalle; ?>" class="btn-ver-mapa-modern" style="color: <?php echo $theme_color; ?>; background-color: <?php echo $theme_color; ?>15;">
                                <i class="fas fa-map-marked-alt"></i> VER MAPA
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Ubicación -->
                <div class="card-ubicacion-mini">
                    <div class="ubicacion-item ciudad">
                        <i class="fas fa-city" style="color: <?php echo $theme_color; ?>;"></i>
                        <span><?php echo $cuarto['txt_ciudad']; ?></span>
                    </div>
                    <div class="ubicacion-item direccion">
                        <i class="fas fa-street-view" style="color: <?php echo $theme_color; ?>;"></i>
                        <span><?php echo $cuarto['txt_sector']; ?></span>
                    </div>
                </div>

                <!-- Badges de Tipo y Período -->
                <div class="card-badges-row">
                    <span class="badge-pill" style="background-color: <?php echo $theme_color; ?>; color: white;">
                        <?php echo $cuarto['tipo']; ?>
                    </span>
                    <span class="badge-pill" style="border: 1px solid <?php echo $theme_color; ?>; color: <?php echo $theme_color; ?>;">
                        <?php echo $periodo; ?>
                    </span>
                    <?php if (!empty($etiqueta)): ?>
                        <span class="badge-pill" style="background-color: #ffc107; color: #000;">
                            <?php echo $etiqueta; ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Precios -->
                <div class="card-precios-box">
                    <div class="precios-grid">
                        <div class="precio-item">
                            <div class="precio-icon">
                                <i class="fas fa-user" style="color: <?php echo $theme_color; ?>;"></i>
                            </div>
                            <div class="precio-label">SOLO</div>
                            <div class="precio-valor" style="color: <?php echo $theme_color; ?>;">
                                <?php echo !empty($precio_solo) ? $precio_solo : '$ -'; ?>
                            </div>
                        </div>
                        <div class="precio-item">
                            <div class="precio-icon">
                                <i class="fas fa-users" style="color: <?php echo $theme_color; ?>;"></i>
                            </div>
                            <div class="precio-label">PAREJA</div>
                            <div class="precio-valor <?php echo empty($precio_pareja) ? 'sin-precio' : ''; ?>" style="color: <?php echo $theme_color; ?>;">
                                <?php echo !empty($precio_pareja) ? $precio_pareja : '$ -'; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Atributos (Iconos) -->
                <?php if (isset($cuarto['int_atributos']) && $cuarto['int_atributos'] == 1) { ?>
                    <div class="card-atributos-compact">
                        <?php if (isset($cuarto['int_wifi']) && $cuarto['int_wifi'] == 1): ?><i class="fas fa-wifi attr-icon-mini" title="WiFi" style="color: <?php echo $theme_color; ?>;"></i><?php endif; ?>
                        <?php if (isset($cuarto['int_bpriv']) && $cuarto['int_bpriv'] == 1): ?><i class="fas fa-bath attr-icon-mini" title="Baño Privado" style="color: <?php echo $theme_color; ?>;"></i><?php endif; ?>
                        <?php if (isset($cuarto['int_cocina']) && $cuarto['int_cocina'] == 1): ?><i class="fas fa-utensils attr-icon-mini" title="Cocina" style="color: <?php echo $theme_color; ?>;"></i><?php endif; ?>
                        <?php if (isset($cuarto['int_amoblado']) && $cuarto['int_amoblado'] == 1): ?><i class="fas fa-bed attr-icon-mini" title="Amoblado" style="color: <?php echo $theme_color; ?>;"></i><?php endif; ?>
                        <?php if (isset($cuarto['int_mascota']) && $cuarto['int_mascota'] == 1): ?><i class="fas fa-paw attr-icon-mini" title="Mascotas" style="color: <?php echo $theme_color; ?>;"></i><?php endif; ?>
                        <?php if (isset($cuarto['int_lavanderia']) && $cuarto['int_lavanderia'] == 1): ?><i class="fas fa-tshirt attr-icon-mini" title="Lavandería" style="color: <?php echo $theme_color; ?>;"></i><?php endif; ?>
                    </div>
                <?php } ?>

                <!-- Barra de Acciones -->
                <div class="card-acciones-bar" style="background-color: <?php echo $theme_color; ?>;">
                    <a target="_blank" href="https://wa.me/17185771511?text=Interesado%20en%20cuarto%20CODIGO:%20<?php echo $codigo_limpio; ?>" 
                       class="btn-accion-bar" style="color: white;">
                        <i class="fab fa-whatsapp"></i>
                        <span>CHAT</span>
                    </a>
                    
                    <a href="<?php echo $url_detalle; ?>" 
                       class="btn-accion-bar" style="color: white;">
                        <i class="fas fa-plus-circle"></i>
                        <span>DETALLES</span>
                    </a>
                    
                    <?php if (isset($cuarto['total_videos']) && $cuarto['total_videos'] > 0): ?>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#overlay" data-id="<?php echo $codigo_limpio; ?>" 
                           class="btn-accion-bar" style="color: white;">
                            <i class="fas fa-play-circle"></i>
                            <span>VIDEO</span>
                        </a>
                    <?php else: ?>
                        <span class="btn-accion-bar disabled" style="color: white;">
                            <i class="fas fa-play-circle"></i>
                            <span>VIDEO</span>
                        </span>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="row">
        <div class="col-12 text-center py-5">
            <p class="text-muted">No hay habitaciones similares disponibles en este momento.</p>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

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
    var serie = "<?php echo $room['txt_serie']; ?>";

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
      var whatsappUrl = "https://wa.me/17185771511?text=Yo%20estoy%20interesado%20en%20este%20cuarto%20SERIE:%20" + serie;

      var popupContent = `
            <div style="text-align:center; min-width: 150px;">
                <div style="margin-bottom: 5px;">
                    <b style="font-size:14px;">CODIGO: ${serie}</b>
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