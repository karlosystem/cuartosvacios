<div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content custom-modal-shadow">

      <div class="modal-header border-0">
        <h5 class="modal-title w-100 text-center font-weight-bold" id="myModalLabel">
          Videos de cuartos en YouTube
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body text-center pt-0">
        <img src="<?php echo base_url(); ?>assets/images/channel.png" class="img-fluid mb-2" style="max-height: 120px;">
        <p class="text-muted small">Visite nuestro canal oficial <strong>SORAYA ROOMS</strong> haciendo click
          <a target="_new" href="https://whatsapp.com/channel/0029ValgvIjDjiOaDfHBEn3m">aquí</a>
        </p>

        <p class="text-muted small mb-1">
          Referencia Serie del Cuarto: <span id="modal_cuarto_id" class="font-weight-bold text-dark">---</span>
        </p>

        <p class="text-primary small">Solicite el código de video haciendo click
          <a id="link_whatsapp_dinamico" target="_new" href="https://wa.me/17185771511?text=Hola">
            aquí
          </a>
        </p>

        <div class="px-4">
          <div class="input-group mb-3">
            <input type="text" id="codigo_video" maxlength="5" class="form-control rounded-left py-2" placeholder="Ingrese su código aquí..." required>

            <div class="input-group-append">
              <button class="btn btn-dark px-3" type="button" id="btn_buscar_codigo">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
          <div id="mensaje_error" class="small text-danger mt-n2 mb-2" style="display:none;">
            Código no válido o inexistente.
          </div>
        </div>

      </div>

      <div class="modal-footer border-0 justify-content-center pb-4">
        <button type="button" class="btn btn-danger px-4" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<div class="slider_area">
  <div class="single_slider d-flex align-items-center slider_bg_1">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-10 offset-xl-1">
          <div class="slider_text text-center justify-content-center">
            <?php
            if (!empty($banners)) {
              foreach ($banners as $s) {
                if ($s['int_estado'] == 1) {
            ?>
                  <!-- <h3><?php echo $s['txt_nombre']; ?></h3>
                  <p><?php echo $s['txt_descripcion']; ?>
                    <?php
                    setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
                    echo strftime("%A %d de %B del %Y");
                    ?>
                  </p> -->
                  <div class="row justify-content-center">
                    <!-- <div class="button-group-area">
                      <a href="<?php echo $s['txt_url']; ?>" target="<?php echo $s['txt_destino']; ?>" class="genric-btn primary circle">Ingresa Aquí</a>

                      <a href="https://www.youtube.com/channel/UCwEsIp3LpTuVh5sGvAAzn4g/videos" target="_new" class="genric-btn primary circle">Suscribete a YouTube</a>

                    </div> -->
                  </div>
            <?php
                }
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- SECCIÓN DE BANNERS - CARRUSELES RESPONSIVE -->
<section class="banner-section py-5 bg-white">
  <div class="container">
    <div class="row">

      <!-- CARRUSEL PARA ESCRITORIO/LAPTOP (Solo visible en desktop) -->
      <div class="col-12 d-none d-md-block">
        <div id="carouselDesktop" class="carousel slide shadow-lg rounded overflow-hidden" data-ride="carousel" style="border-bottom: 5px solid #3d5afe;">

          <div class="carousel-inner">
            <?php
            if (isset($banners) && !empty($banners)):
              // Filtrar banners activos que tengan imagen de escritorio
              $banners_desktop = array_filter($banners, function ($b) {
                $b_array = (array) $b;
                return isset($b_array['int_estado']) && $b_array['int_estado'] == 1
                  && isset($b_array['txt_imagen_escritorio']) && !empty($b_array['txt_imagen_escritorio']);
              });
              $banners_desktop = array_values($banners_desktop);
              
              if (!empty($banners_desktop)):
                foreach ($banners_desktop as $key => $bn):
                  $b = (array) $bn;
                  $nombre      = isset($b['txt_nombre']) ? $b['txt_nombre'] : '';
                  $descripcion = isset($b['txt_descripcion']) ? $b['txt_descripcion'] : '';
                  $precio      = isset($b['txt_precio']) ? $b['txt_precio'] : '';
                  $periodo     = isset($b['txt_periodo']) ? $b['txt_periodo'] : '';
                  $imagen      = isset($b['txt_imagen_escritorio']) ? $b['txt_imagen_escritorio'] : '';
                  $url         = isset($b['txt_url']) ? $b['txt_url'] : '#';
                  $destino     = isset($b['txt_destino']) ? $b['txt_destino'] : '_self';
            ?>

                <div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>">

                  <!-- IMAGEN DEL BANNER CON ENLACE CLICKEABLE -->
                  <a href="<?php echo $url; ?>" target="<?php echo $destino; ?>" style="display: block; width: 100%;">
                    <img src="https://sorayarooms.com/intranet/images/public/banner/<?php echo $imagen; ?>"
                      class="d-block w-100"
                      alt="<?php echo $nombre; ?>"
                      style="min-height: 400px; max-height: 600px; object-fit: cover; cursor: pointer;">
                  </a>

                </div>
              <?php endforeach; ?>
              <?php else: ?>
              <div class="carousel-item active">
                <img src="<?php echo base_url('assets/images/banner-default.jpg'); ?>"
                  class="d-block w-100"
                  alt="Soraya Rooms"
                  style="min-height: 400px; max-height: 600px; object-fit: cover;">
              </div>
            <?php endif; ?>
            <?php else: ?>
              <div class="carousel-item active">
                <img src="<?php echo base_url('assets/images/banner-default.jpg'); ?>"
                  class="d-block w-100"
                  alt="Soraya Rooms"
                  style="min-height: 400px; max-height: 600px; object-fit: cover;">
              </div>
            <?php endif; ?>
          </div>

          <!-- Controles personalizados con botones de navegación -->
          <div class="carousel-controls-custom text-center pb-3 pt-2">
            <button class="btn btn-sm btn-outline-primary mx-1" data-slide="0" title="Primero">
              <i class="fas fa-angle-double-left"></i> Primero
            </button>
            <button class="btn btn-sm btn-outline-primary mx-1 carousel-prev" title="Anterior">
              <i class="fas fa-angle-left"></i> Anterior
            </button>
            <button class="btn btn-sm btn-outline-primary mx-1 carousel-next" title="Siguiente">
              <i class="fas fa-angle-right"></i> Siguiente
            </button>
            <button class="btn btn-sm btn-outline-primary mx-1" data-slide="last" title="Último">
              Último <i class="fas fa-angle-double-right"></i>
            </button>
          </div>

        </div>
      </div>

      <!-- CARRUSEL PARA MÓVIL (Solo visible en celulares) -->
      <div class="col-12 d-md-none">
        <div id="carouselMobile" class="carousel slide shadow-lg rounded overflow-hidden" data-ride="carousel" style="border-bottom: 5px solid #3d5afe;">

          <div class="carousel-inner">
            <?php
            if (isset($banners) && !empty($banners)):
              // Filtrar banners activos que tengan imagen de celular
              $banners_mobile = array_filter($banners, function ($b) {
                $b_array = (array) $b;
                return isset($b_array['int_estado']) && $b_array['int_estado'] == 1
                  && isset($b_array['txt_imagen_celular']) && !empty($b_array['txt_imagen_celular']);
              });
              $banners_mobile = array_values($banners_mobile);
              
              if (!empty($banners_mobile)):
                foreach ($banners_mobile as $key => $bn):
                  $b = (array) $bn;
                  $nombre      = isset($b['txt_nombre']) ? $b['txt_nombre'] : '';
                  $descripcion = isset($b['txt_descripcion']) ? $b['txt_descripcion'] : '';
                  $precio      = isset($b['txt_precio']) ? $b['txt_precio'] : '';
                  $periodo     = isset($b['txt_periodo']) ? $b['txt_periodo'] : '';
                  $imagen      = isset($b['txt_imagen_celular']) ? $b['txt_imagen_celular'] : '';
                  $url         = isset($b['txt_url']) ? $b['txt_url'] : '#';
                  $destino     = isset($b['txt_destino']) ? $b['txt_destino'] : '_self';
            ?>

                <div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>">

                  <!-- IMAGEN DEL BANNER CON ENLACE CLICKEABLE -->
                  <a href="<?php echo $url; ?>" target="<?php echo $destino; ?>" style="display: block; width: 100%;">
                    <img src="https://sorayarooms.com/intranet/images/public/banner/<?php echo $imagen; ?>"
                      class="d-block w-100"
                      alt="<?php echo $nombre; ?>"
                      style="min-height: 250px; max-height: 400px; object-fit: cover; cursor: pointer;">
                  </a>

                </div>
              <?php endforeach; ?>
              <?php else: ?>
              <div class="carousel-item active">
                <img src="<?php echo base_url('assets/images/banner-default.jpg'); ?>"
                  class="d-block w-100"
                  alt="Soraya Rooms"
                  style="min-height: 250px; max-height: 400px; object-fit: cover;">
              </div>
            <?php endif; ?>
            <?php else: ?>
              <div class="carousel-item active">
                <img src="<?php echo base_url('assets/images/banner-default.jpg'); ?>"
                  class="d-block w-100"
                  alt="Soraya Rooms"
                  style="min-height: 250px; max-height: 400px; object-fit: cover;">
              </div>
            <?php endif; ?>
          </div>

          <!-- Controles personalizados para móvil -->
          <div class="carousel-controls-custom text-center pb-3 pt-2">
            <button class="btn btn-sm btn-outline-primary mx-1" data-slide="0" title="Primero">
              <i class="fas fa-angle-double-left"></i>
            </button>
            <button class="btn btn-sm btn-outline-primary mx-1 carousel-prev" title="Anterior">
              <i class="fas fa-angle-left"></i>
            </button>
            <button class="btn btn-sm btn-outline-primary mx-1 carousel-next" title="Siguiente">
              <i class="fas fa-angle-right"></i>
            </button>
            <button class="btn btn-sm btn-outline-primary mx-1" data-slide="last" title="Último">
              <i class="fas fa-angle-double-right"></i>
            </button>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<?php if (isset($premium_results) && !empty($premium_results)): ?>
  <div class="container-fluid py-5 bg-light">
    <div class="container-fluid">
      <div class="text-center mb-5">
        <h2 class="font-weight-bold" style="font-size: 2.5rem;">
          🔥 CUARTOS <span class="text-danger">DESTACADOS</span> 🔥
        </h2>
        <p class="text-muted">Las mejores opciones seleccionadas para ti</p>
      </div>

      <div class="row justify-content-center">
        <?php foreach ($premium_results as $vip): ?>
          <?php
          $p_solo_sem = floatval($vip->txt_precio_solo_semanal);
          $p_pareja_sem = floatval($vip->txt_precio_pareja_semanal);
          $p_solo_mens = floatval($vip->txt_precio_solo_mensual);
          $p_pareja_mens = floatval($vip->txt_precio_pareja_mensual);
          $is_weekly = ($p_solo_sem > 0 || $p_pareja_sem > 0);
          if ($is_weekly) {
            $p_solo = $p_solo_sem;
            $p_pareja = $p_pareja_sem;
            $label_periodo = 'SEMANAL';
          } else {
            $p_solo = $p_solo_mens;
            $p_pareja = $p_pareja_mens;
            $label_periodo = 'MENSUAL';
          }


          // CORRECCIÓN DE ERRORES PHP (Validación de propiedades)
          $abr = isset($vip->inquilino_abreviado) ? $vip->inquilino_abreviado : (isset($vip->txt_abreviado) ? $vip->txt_abreviado : '');
          $badge_color = ($abr == 'M') ? '#e83e8c' : '#28a745';
          $nombre_inq = isset($vip->nombre_inquilino) ? $vip->nombre_inquilino : (isset($vip->tipo_inquilino_completo) ? $vip->tipo_inquilino_completo : 'UNISEX');

          // CAMPO DE YOUTUBE: Obtenemos el ID de la columna yt_id de tu tabla 'video'
          $youtube_id = isset($vip->yt_id) ? $vip->yt_id : '';

          // OBTENCIÓN DEL TELÉFONO PARA LLAMADA DIRECTA
          $telf_limpio = isset($vip->telefono) ? preg_replace('/[^0-9]/', '', $vip->telefono) : '17185771511';
          $telf_mostrar = isset($vip->telefono) ? $vip->telefono : 'LLAMAR';

          ?>
          <div class="col-xl-3 col-md-4 mb-5">
            <div class="card h-100 card-premium-highlight">

              <div style="position: absolute; top: -15px; right: 25px; z-index: 10;">
                <a href="tel:<?php echo $telf_limpio; ?>" class="btn btn-danger shadow shadow-lg font-weight-bold"
                  style="background: #ff0050; color: white; border-radius: 50px; padding: 8px 20px; border: none; font-size: 12px;">
                  <i class="fas fa-phone-alt"></i> Llamar Aquí
                </a>
              </div>

              <div class="card-body p-4 text-left">
                <div class="d-flex justify-content-between mb-3">
                  <span class="badge badge-dark px-3 py-1">ID: <?php echo $vip->pk_listing; ?></span>
                  <span class="text-danger font-weight-bold">
                    <i class="fas fa-bolt"></i> <?php echo !empty($vip->etiqueta_premium) ? strtoupper($vip->etiqueta_premium) : 'DESTACADO'; ?>
                  </span>
                </div>

                <h4 class="font-weight-bold text-dark mb-1"><?php echo $vip->txt_sector; ?></h4>
                <p class="text-muted mb-4 small"><i class="fas fa-map-marker-alt text-danger"></i> <?php echo $vip->txt_ciudad; ?></p>

                <div class="mb-4 d-flex flex-wrap" style="gap: 8px;">
                  <span class="badge text-white px-3 py-2" style="background-color: <?php echo $badge_color; ?>; border-radius: 12px;">
                    <i class="fas fa-users"></i> <?php echo $nombre_inq; ?>
                  </span>
                  <span class="badge badge-primary px-3 py-2" style="border-radius: 12px;">
                    <i class="far fa-calendar-alt"></i> <?php echo $is_weekly ? 'SEMANAL' : 'MENSUAL'; ?>
                  </span>
                </div>

                <div class="row no-gutters text-center border rounded py-3 mb-4 bg-light" style="border-radius: 20px;">
                  <div class="col-6 border-right">
                    <small class="text-muted font-weight-bold d-block">SOLO</small>
                    <span class="h3 font-weight-bold text-primary">
                      <?php echo ($p_solo > 0) ? '$' . number_format($p_solo, 0) : '$0'; ?>
                    </span>
                  </div>
                  <div class="col-6">
                    <small class="text-muted font-weight-bold d-block">PAREJA</small>
                    <span class="h3 font-weight-bold text-primary">
                      <?php echo ($p_pareja > 0) ? '$' . number_format($p_pareja, 0) : '$'; ?>
                    </span>
                  </div>
                </div>

                <div class="row no-gutters" style="gap: 8px;">
                  <div class="col px-1">
                    <?php if (!empty($youtube_id)): ?>
                      <a data-fancybox href="https://www.youtube.com/embed/<?php echo $youtube_id; ?>?autoplay=1&controls=1&rel=0"
                        class="btn btn-block btn-yt-red py-2 shadow-sm" style="font-size: 0.75rem; border-radius: 12px; padding: 10px 2px !important;">
                        <i class="fab fa-youtube"></i> VIDEO
                      </a>
                    <?php else: ?>
                      <button class="btn btn-block btn-secondary py-2 shadow-sm disabled"
                        style="border-radius: 12px; font-size: 0.75rem; padding: 10px 2px !important;" disabled>
                        <i class="fas fa-video-slash"></i> NO
                      </button>
                    <?php endif; ?>
                  </div>

                  <div class="col px-1">
                    <?php if ($vip->int_mapa == 1 && !empty($vip->txt_latitud)): ?>
                      <a href="<?php echo base_url() . 'sorayarooms/cuartos_vacios/' . str_replace(' ', '-', safename($vip->txt_ciudad)) . '/' . $vip->pk_listing; ?>"
                        class="btn btn-block btn-info py-2 shadow-sm font-weight-bold"
                        style="background: #e91e63; border: none; border-radius: 12px; font-size: 0.75rem; color: white; padding: 10px 2px !important;">
                        <i class="fas fa-map-marker-alt"></i> VER MAPA
                      </a>
                    <?php else: ?>
                      <button class="btn btn-block btn-secondary py-2 shadow-sm disabled"
                        style="border-radius: 12px; font-size: 0.75rem; opacity: 0.5; padding: 10px 2px !important;" disabled>
                        <i class="fas fa-map-marker-alt"></i> SIN MAPA
                      </button>
                    <?php endif; ?>
                  </div>

                  <div class="col px-1">
                    <a href="https://wa.me/17185771511?text=Hola, estoy interesado en este cuarto ID:<?php echo $vip->pk_listing; ?>"
                      class="btn btn-block btn-success py-2 font-weight-bold shadow-sm"
                      style="background: #25d366; border: none; border-radius: 12px; font-size: 0.75rem; padding: 10px 2px !important;">
                      <i class="fab fa-whatsapp"></i> CHAT
                    </a>
                  </div>

                </div>

              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="popular_property">
  <div class="container-fluid">

    <div class="row">

      <?php if (isset($results)) { ?>
        <?php foreach ($results as $cuarto) {
          $etiqueta = $cuarto->txt_etiqueta;

          // Determinar precios y periodo
          if (!empty($cuarto->txt_precio_solo) || !empty($cuarto->txt_precio_pareja)) {
            $periodo = "SEMANAL";
            $precio_solo = "$ " . $cuarto->txt_precio_solo;
            $precio_pareja = "$ " . $cuarto->txt_precio_pareja;
          }
          if (!empty($cuarto->txt_precio_mensual) || !empty($cuarto->txt_precio_mensual01)) {
            $periodo = "MENSUAL";
            $precio_solo = "$ " . $cuarto->txt_precio_mensual;
            $precio_pareja = "$ " . $cuarto->txt_precio_mensual01;
          }

          // Lógica de etiquetas NUEVO / ACTUALIZADO
          date_default_timezone_set('America/New_York');
          $hoy_sistema = date('Y-m-d');
          $f_registro = trim(substr((string)$cuarto->fecha_registro, 0, 10));
          $f_ingreso  = trim(substr((string)$cuarto->fecha_ingreso, 0, 10));

          $mostrar_tag = false;
          $texto_tag   = "";
          $clase_borde_cuadro = "";

          if ($f_registro == $hoy_sistema) {
            $mostrar_tag = true;
            $texto_tag   = "NUEVO";
            $clase_borde_cuadro = "card-nuevo";
          } elseif ($f_ingreso == $hoy_sistema) {
            $mostrar_tag = true;
            $texto_tag   = "ACTUALIZADO";
            $clase_borde_cuadro = "card-actualizado";
          }

          // OBTENER COLOR TEMÁTICO
          $theme_color = isset($cuarto->room_color) ? $cuarto->room_color : '#6c757d';
          $codigo_limpio = str_replace("S-", "", $cuarto->txt_serie);
          $url_detalle = base_url() . 'sorayarooms/cuartos_vacios/' . str_replace(' ', '-', safename($cuarto->txt_ciudad)) . '/' . $codigo_limpio;
        ?>

          <div class="col-xl-3 col-md-4 col-lg-3 col-sm-6 mb-4">
            <div class="card-cuarto-modern <?php echo $clase_borde_cuadro; ?>" style="border-top: 3px solid <?php echo $theme_color; ?>;">

              <!-- Badges Superiores -->
              <div class="badge-top-left">
                <?php if ($cuarto->int_destacado == 1): ?>
                  <span class="badge-top" style="background-color: <?php echo $theme_color; ?>; color: white;">
                    <i class="fas fa-star"></i> TOP
                  </span>
                <?php endif; ?>
              </div>

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

              <!-- Encabezado: Icono y Código -->
              <div class="card-header-info">
                <div class="icon-casa-circle" style="background-color: <?php echo $theme_color; ?>20; color: <?php echo $theme_color; ?>;">
                  <i class="fas fa-home"></i>
                </div>

                <div class="codigo-wrapper">
                  <span class="codigo-label">CÓDIGO</span>
                  <h3 class="codigo-cuarto" style="color: <?php echo $theme_color; ?>;"><?php echo $codigo_limpio; ?></h3>

                  <?php if ($cuarto->int_mapa == 1 && !empty($cuarto->txt_latitud) && !empty($cuarto->txt_longitud)): ?>
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
                  <span><?php echo $cuarto->txt_ciudad; ?></span>
                </div>
                <div class="ubicacion-item direccion">
                  <i class="fas fa-street-view" style="color: <?php echo $theme_color; ?>;"></i>
                  <span><?php echo $cuarto->txt_sector; ?></span>
                </div>
              </div>

              <!-- Badges de Tipo y Período -->
              <div class="card-badges-row">
                <span class="badge-pill" style="background-color: <?php echo $theme_color; ?>; color: white;">
                  <?php echo $cuarto->tipo; ?>
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
              <?php if ($cuarto->int_atributos == 1) { ?>
                <div class="card-atributos-compact">
                  <?php if ($cuarto->int_wifi == 1): ?><i class="fas fa-wifi attr-icon-mini" title="WiFi" style="color: <?php echo $theme_color; ?>;"></i><?php endif; ?>
                  <?php if ($cuarto->int_bpriv == 1): ?><i class="fas fa-bath attr-icon-mini" title="Baño Privado" style="color: <?php echo $theme_color; ?>;"></i><?php endif; ?>
                  <?php if ($cuarto->int_cocina == 1): ?><i class="fas fa-utensils attr-icon-mini" title="Cocina" style="color: <?php echo $theme_color; ?>;"></i><?php endif; ?>
                  <?php if ($cuarto->int_amoblado == 1): ?><i class="fas fa-bed attr-icon-mini" title="Amoblado" style="color: <?php echo $theme_color; ?>;"></i><?php endif; ?>
                  <?php if ($cuarto->int_mascota == 1): ?><i class="fas fa-paw attr-icon-mini" title="Mascotas" style="color: <?php echo $theme_color; ?>;"></i><?php endif; ?>
                  <?php if ($cuarto->int_lavanderia == 1): ?><i class="fas fa-tshirt attr-icon-mini" title="Lavandería" style="color: <?php echo $theme_color; ?>;"></i><?php endif; ?>
                </div>
              <?php } ?>

              <!-- Barra de Acciones -->
              <div class="card-acciones-bar" style="background-color: <?php echo $theme_color; ?>;">
                <a target="_blank" href="https://wa.me/17185771511?text=Hola,%20interesado%20en%20cuarto%20CODIGO:%20<?php echo $codigo_limpio; ?>"
                  class="btn-accion-bar" style="color: white;">
                  <i class="fab fa-whatsapp"></i>
                  <span>CHAT</span>
                </a>

                <a href="<?php echo $url_detalle; ?>"
                  class="btn-accion-bar" style="color: white;">
                  <i class="fas fa-plus-circle"></i>
                  <span>DETALLES</span>
                </a>

                <?php if (isset($cuarto->total_videos) && $cuarto->total_videos > 0): ?>
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

        <?php } ?>
      <?php } ?>

      <div class="container mb-5">
        <div class="row d-flex justify-content-center">
          <?php if (isset($cuartos_array)) { ?>
            <div align="center"><?php echo $cuartos_array ?></div>
          <?php } ?>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-xl-12">
        <div class="more_property_btn text-center">
          <a href="#" class="boxed-btn3-line">Mas Cuartos Disponibles</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ==========================================
     BANNER CTA - WHATSAPP CONTACTO
     ========================================== -->
<div class="container">
    <div class="banner-cta-whatsapp">
        
        <!-- Sección Izquierda: Logo y Marca -->
        <div class="banner-cta-left">
            <div class="banner-cta-crown">
                <i class="fas fa-crown"></i>
            </div>
            <div class="banner-cta-brand">
                <h3>Soraya Rooms</h3>
                <p>Más que una habitación,<br>tu nuevo hogar.</p>
            </div>
        </div>

        <!-- Sección Central: Mensaje WhatsApp -->
        <div class="banner-cta-center">
            <div class="banner-cta-whatsapp-icon">
                <i class="fas fa-mobile-alt phone-mockup"></i>
                <div class="whatsapp-badge">
                    <i class="fab fa-whatsapp"></i>
                </div>
            </div>
            <div class="banner-cta-message">
                <h4>¿Listo para encontrar <span>tu habitación</span>?</h4>
                <p>Contáctanos por WhatsApp y te ayudamos ahora mismo</p>
            </div>
        </div>

        <!-- Sección Derecha: Botón CTA -->
        <div class="banner-cta-right">
            <a href="https://wa.me/17185771511?text=Hola,%20estoy%20interesado%20en%20rentar%20un%20cuarto" 
               target="_blank" 
               class="btn-cta-whatsapp">
                <span class="btn-cta-text">
                    <i class="fab fa-whatsapp"></i>
                    ESCRÍBENOS AHORA
                </span>
                <span class="btn-cta-subtext">
                    Respuesta rápida garantizada <i class="fas fa-check-circle"></i>
                </span>
            </a>
        </div>

    </div>
</div>