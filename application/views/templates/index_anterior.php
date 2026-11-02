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
          Referencia Cuarto ID: <span id="modal_cuarto_id" class="font-weight-bold text-dark">---</span>
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
            if (empty($banners)) {
              foreach ($banners as $s) {
                if ($s['int_estado'] == 1) {
            ?>
                  <h3><?php echo $s['txt_nombre']; ?></h3>
                  <p><?php echo $s['txt_descripcion']; ?>
                    <?php
                    setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
                    echo strftime("%A %d de %B del %Y");
                    ?>
                  </p>
                  <div class="row justify-content-center">
                    <div class="button-group-area">
                      <a href="<?php echo $s['txt_url']; ?>" target="<?php echo $s['txt_destino']; ?>" class="genric-btn primary circle">Ingresa Aquí</a>

                      <a href="https://www.youtube.com/channel/UCwEsIp3LpTuVh5sGvAAzn4g/videos" target="_new" class="genric-btn primary circle">Suscribete a YouTube</a>

                    </div>
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


<?php if (isset($premium_results) && !empty($premium_results)): ?>
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="font-weight-bold" style="font-size: 2.5rem;">
                🔥 CUARTOS <span class="text-danger">DESTACADOS</span> 🔥
            </h2>
            <p class="text-muted">Las mejores opciones seleccionadas para ti</p>
        </div>

        <div class="row justify-content-center">
            <?php foreach ($premium_results as $vip): ?>
                <?php 
                    // Lógica de precios
                    //$is_weekly = ($vip->txt_precio_solo_semanal > 0);
                    //$p_solo = $is_weekly ? $vip->txt_precio_solo_semanal : $vip->txt_precio_solo_mensual;
                    //$p_pareja = $is_weekly ? $vip->txt_precio_pareja_semanal : $vip->txt_precio_pareja_mensual;

					$p_solo_sem = floatval($vip->txt_precio_solo_semanal);
					$p_pareja_sem = floatval($vip->txt_precio_pareja_semanal);
					$p_solo_mens = floatval($vip->txt_precio_solo_mensual);
					$p_pareja_mens = floatval($vip->txt_precio_pareja_mensual);

					// Determinamos si es Semanal o Mensual basándonos en si hay algún valor mayor a 0
					$is_weekly = ($p_solo_sem > 0 || $p_pareja_sem > 0);

					if ($is_weekly) {
						$p_solo = $p_solo_sem;
						$p_pareja = $p_pareja_sem; // Aquí capturará el 350.00
						$label_periodo = 'WEEKLY';
					} else {
						$p_solo = $p_solo_mens;
						$p_pareja = $p_pareja_mens;
						$label_periodo = 'MONTHLY';
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
                <div class="col-xl-4 col-md-6 mb-5">
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
                                    <i class="far fa-calendar-alt"></i> <?php echo $is_weekly ? 'WEEKLY' : 'MONTHLY'; ?>
                                </span>
                            </div>

                            <div class="row no-gutters text-center border rounded py-3 mb-4 bg-light" style="border-radius: 20px;">
                               <div class="col-6 border-right">
									<small class="text-muted font-weight-bold d-block">SINGLE</small>
									<span class="h3 font-weight-bold text-primary">
										<?php echo ($p_solo > 0) ? '$'.number_format($p_solo, 0) : '$0'; ?>
									</span>
								</div>
								<div class="col-6">
									<small class="text-muted font-weight-bold d-block">COUPLE</small>
									<span class="h3 font-weight-bold text-primary">
										<?php echo ($p_pareja > 0) ? '$'.number_format($p_pareja, 0) : '$'; ?>
									</span>
								</div>
                            </div>

                           <div class="row no-gutters" style="gap: 12px;">
                                <div class="col">
                                    <?php if(!empty($youtube_id)): ?>
                                        <a data-fancybox href="https://www.youtube.com/embed/<?php echo $youtube_id; ?>?autoplay=1&controls=1&rel=0" class="btn btn-block btn-yt-red py-2 shadow-sm">
                                            <i class="fab fa-youtube mr-2"></i> VER VIDEO
                                        </a>
                                    <?php else: ?>
                                        <button class="btn btn-block btn-secondary py-2 shadow-sm disabled" style="border-radius: 15px; font-size: 0.85rem;" disabled>
                                            <i class="fas fa-video-slash mr-2"></i> SIN VIDEO
                                        </button>
                                    <?php endif; ?>
                                </div>
                                <div class="col">
                                    <a href="https://wa.me/17185771511?text=Hola, estoy interesado en este cuarto ID:<?php echo $vip->pk_listing; ?>" class="btn btn-block btn-success py-2 font-weight-bold shadow-sm" style="background: #25d366; border: none; border-radius: 15px; font-size: 0.85rem;">
                                        <i class="fab fa-whatsapp mr-1"></i> CHAT AQUI
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


    <div class="container mb-5">
      <div class="row d-flex justify-content-center">
        <?php if (isset($cuartos_array)) { ?>
          <div align="center"><?php echo $cuartos_array ?></div>
        <?php } ?>
      </div>
    </div>

    <div class="row">

      <?php if (isset($results)) { ?>

        <?php foreach ($results as $cuarto) {
          $etiqueta = $cuarto->txt_etiqueta;

          if (!empty($cuarto->txt_precio_solo) || !empty($cuarto->txt_precio_pareja)) {
            $periodo = "W E E K L Y";
            $precio_solo = "$ " . $cuarto->txt_precio_solo;
            $precio_pareja = "$ " . $cuarto->txt_precio_pareja;
          }
          if (!empty($cuarto->txt_precio_mensual) || !empty($cuarto->txt_precio_mensual01)) {
            $periodo = "M O N T H L Y";
            $precio_solo = "$ " . $cuarto->txt_precio_mensual;
            $precio_pareja = "$ " . $cuarto->txt_precio_mensual01;
          }

			
		    // 1. Forzamos la zona horaria para que coincida con el servidor de la DB
			date_default_timezone_set('America/New_York');
			$hoy_sistema = date('Y-m-d'); 

			// 2. Limpieza absoluta de fechas de la DB
			// Usamos trim() y substr() para obtener solo "YYYY-MM-DD"
			$f_registro = trim(substr((string)$cuarto->fecha_registro, 0, 10));
			$f_ingreso  = trim(substr((string)$cuarto->fecha_ingreso, 0, 10));

			// Variables de control inicializadas
			$mostrar_tag = false;
			$clase_tag   = "";
			$texto_tag   = "";

			$clase_borde_cuadro = "";
			
			// 3. Lógica de comparación
			if ($f_registro == $hoy_sistema) {
				$mostrar_tag = true;
				$clase_tag   = "label-nuevo";
				$texto_tag   = "NUEVO";
				$clase_borde_cuadro = "card-nuevo";
			} elseif ($f_ingreso == $hoy_sistema) {
				$mostrar_tag = true;
				$clase_tag   = "label-actualizado";
				$texto_tag   = "ACTUALIZADO";
				$clase_borde_cuadro = "card-actualizado";
			}

        ?>
          <div class="col-xl-3 col-md-4 col-lg-3">


            <div class="single_property <?php echo $clase_borde_cuadro; ?>" style="transition: all 0.3s ease; border-radius: 15px;">
			

              <div class="property_content">
                <div class="main_pro">


                  <div class="d-flex justify-content-between align-items-start mb-3">
					
					<h3 class="m-0" style="display: flex; align-items: center; width: 100%; justify-content: space-between;">
						<a href="<?php echo base_url() . 'sorayarooms/cuartos_vacios/' . str_replace(' ', '-', safename($cuarto->txt_ciudad)) . '/' . $cuarto->pk_listing; ?>">
							ID: <span class="font-weight-bold"><?php echo $cuarto->pk_listing; ?></span>
						</a>

						<?php if ($mostrar_tag): ?>
							<a href="#" class="tag-casa-nuevo" title="Este anuncio es nuevo">
								<img src="<?php echo base_url(); ?>assets/images/nuevo-actualizado.png" alt="Cuarto Nuevo">
							</a>
						<?php endif; ?>

					</h3>
                  
                  </div>


                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="location_box">
                      <p class="text-muted small mb-1">
                        <i class="fas fa-map-marker-alt text-danger mr-1"></i> <?php echo $cuarto->txt_ciudad; ?>
                      </p>
                      <p class="text-dark small font-weight-bold mb-0">
                        <i class="fas fa-street-view mr-1"></i> <?php echo $cuarto->txt_sector; ?>
                      </p>
                    </div>

                    <?php if ($cuarto->fk_precio == 1): ?>
                      <?php
                      $clase_precio = 'text-primary';
                      if (isset($etiqueta) && strpos(strtolower($etiqueta), 'independiente') !== false) {
                        $clase_precio = 'precio-naranja';
                      }
                      ?>
                      <div class="price_side_block text-right">
                       
						<div class="d-flex align-items-center justify-content-end">
							<div class="d-inline-block text-center mr-3">
								<small class="d-block text-muted" style="font-size: 10px; text-transform: uppercase; margin-bottom: 4px;">SOLO</small>
								<div style="display: flex; align-items: center; justify-content: center;">
									<i class="fas fa-user mr-1" style="font-size: 12px; color: #6c757d;"></i>
									<span class="<?php echo $clase_precio; ?> font-weight-bold" style="font-size: 14px; color: #3d5afe;">
										 <?php echo $precio_solo; ?>
									</span>
								</div>
							</div>

							<div class="d-inline-block text-center border-left pl-3" style="border-color: #eee !important;">
								<small class="d-block text-muted" style="font-size: 10px; text-transform: uppercase; margin-bottom: 4px;">PAREJA</small>
								<div style="display: flex; align-items: center; justify-content: center;">
									<div class="d-flex mr-1"> 
										<i class="fas fa-user" style="font-size: 11px; color: #6c757d;"></i>
										<i class="fas fa-user" style="font-size: 11px; color: #6c757d; margin-left: -3px;"></i>
									</div>
									<span class="<?php echo $clase_precio; ?> font-weight-bold" style="font-size: 14px; color: #3d5afe;">
										 <?php echo $precio_pareja; ?>
									</span>
								</div>
							</div>
						</div>
						
                      </div>
                    <?php endif; ?>
                  </div>


                  <div class="labels_box mb-3">
                    <?php if (!empty($etiqueta)): ?>
                      <span class="badge badge-warning custom-label"><?php echo $etiqueta; ?></span>
                    <?php endif; ?>
                    <span class="badge badge-success custom-label"><?php echo $cuarto->tipo; ?></span>
                    <span class="badge badge-primary custom-label"><?php echo $periodo; ?></span>
                  </div>

                  <hr>

                  <div class="row no-gutters mt-3 mb-2">

                    <?php if (isset($cuarto->total_videos) && $cuarto->total_videos > 0): ?>
                      <div class="col-6 pr-1">
                       <a class="btn btn-block btn-modern d-flex align-items-center justify-content-center"
                        style="background-color: #007bff; color: #ffffff; border: none; border-radius: 12px; font-weight: 600; padding: 10px 0;"
                        href="javascript:void(0)" 
                        data-toggle="modal" 
                        data-target="#overlay" 
                        data-id="<?php echo $cuarto->auto; ?>">
                        <i class="fas fa-play-circle mr-2"></i> VER VIDEO
                      </a>
                      </div>
                    <?php endif; ?>

                    <div class="col-6 pl-1">
                      <a href="https://wa.me/17185771511?text=Yo%20estoy%20interesado%20en%20este%20cuarto%20:%20<?php echo $cuarto->auto; ?>" class="btn btn-whatsapp btn-block btn-modern">
                        <i class="fab fa-whatsapp"></i> CHAT AQUI
                      </a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>

        <?php } ?>
      <?php } else { ?>

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