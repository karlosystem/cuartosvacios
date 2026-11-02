<div class="bradcam_area bradcam_bg_1">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text text-center">
          <h3><?php echo $condado['nombre']; ?></h3>
          <p><?php echo $condado['descripcion']; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="popular_property section-padding">
  <div class="container-fluid">
    <h2 class="mb-5 text-center">Cuartos disponibles en <?php echo $condado['nombre']; ?></h2>

    <?php if (!empty($habitaciones)): ?>
      <div class="row">
        <?php foreach ($habitaciones as $cuarto):
        $etiqueta = $cuarto->txt_etiqueta;

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

          date_default_timezone_set('America/New_York');
          $hoy_sistema = date('Y-m-d');

          $f_registro = trim(substr((string)$cuarto->fecha_registro, 0, 10));
          $f_ingreso  = trim(substr((string)$cuarto->fecha_ingreso, 0, 10));

          $mostrar_tag = false;
          $clase_tag   = "";
          $texto_tag   = "";

          $clase_borde_cuadro = "";
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
                    <button class="btn btn-light btn-sm shadow-sm btn-favorito d-flex align-items-center font-weight-bold"
                      data-id="<?php echo str_replace("S-", "", $cuarto->txt_serie); ?>"
                      style="color: #ff4757; border-radius: 20px; padding: 5px 12px; font-size: 11px; border: 1px solid #eee;">
                      <i class="fa-heart far mr-1" style="font-size: 10px;"> Favorito</i>
                    </button>
                    <?php if ($mostrar_tag): ?>
                      <a href="#" class="tag-casa-nuevo" title="Este anuncio es nuevo" style="display: flex;">
                        <img src="<?php echo base_url(); ?>assets/images/nuevo-actualizado.png"
                          alt="Cuarto Nuevo"
                          style="width: 25px; height: 25px; object-fit: contain;">
                      </a>
                    <?php endif; ?>
                  </div>
                  <div class="d-flex justify-content-between align-items-start mb-3">
                    <h3 class="m-0" style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                      <a href="<?php echo base_url() . 'sorayarooms/cuartos_vacios/' . str_replace(' ', '-', safename($cuarto->txt_ciudad)) . '/' . str_replace("S-", "", $cuarto->txt_serie); ?>"
                        style="display: flex; align-items: center;">
                        CODIGO: <span class="font-weight-bold" style="margin-right: 8px;"><?php echo str_replace("S-", "", $cuarto->txt_serie); ?></span>
                      </a>

                      <?php if ($cuarto->int_mapa == 1 && !empty($cuarto->txt_latitud) && !empty($cuarto->txt_longitud)): ?>
                        <a href="<?php echo base_url() . 'sorayarooms/cuartos_vacios/' . str_replace(' ', '-', safename($cuarto->txt_ciudad)) . '/' . str_replace("S-", "", $cuarto->txt_serie); ?>"
                          class="btn-ver-mapa-tag"
                          style="white-space: nowrap; font-size: 11px;"
                          title="Ver ubicación exacta">
                          <i class="fas fa-map-marked-alt"></i> VER MAPA
                        </a>
                      <?php endif; ?>
                    </h3>
                  </div>


                  <div>

                    <div class="mb-3 w-100 px-2">
                      <p class="text-muted small mb-1" style="line-height: 1.4; display: flex; align-items: flex-start;">
                        <i class="fas fa-map-marker-alt text-danger mr-2 mt-1"></i>
                        <span><?php echo $cuarto->txt_ciudad; ?></span>
                      </p>
                      <p class="text-dark small font-weight-bold mb-0" style="line-height: 1.4; display: flex; align-items: flex-start;">
                        <i class="fas fa-street-view mr-2 mt-1"></i>
                        <span><?php echo $cuarto->txt_sector; ?></span>
                      </p>
                    </div>

                    <?php if ($cuarto->fk_precio == 1): ?>
                      <?php
                      $clase_precio = 'text-primary';
                      if (isset($etiqueta) && strpos(strtolower($etiqueta), 'independiente') !== false) {
                        $clase_precio = 'precio-naranja';
                      }
                      ?>
                      <div class="d-flex justify-content-center align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center">
                          <!-- Precio Solo -->
                          <div class="d-inline-block text-center mr-3">
                            <small class="d-block text-muted" style="font-size: 10px; text-transform: uppercase; margin-bottom: 4px;">SOLO</small>
                            <div style="display: flex; align-items: center; justify-content: center;">
                              <i class="fas fa-user mr-1" style="font-size: 12px; color: #6c757d;"></i>
                              <span class="<?php echo $clase_precio; ?> font-weight-bold" style="font-size: 14px; color: #3d5afe;">
                                <?php echo $precio_solo; ?>
                              </span>
                            </div>
                          </div>

                          <!-- Separador -->
                          <div style="height: 25px; border-left: 1px solid #eee; margin-right: 15px;"></div>

                          <!-- Precio Pareja -->
                          <div class="d-inline-block text-center">
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

                  <div class="atributos-cuarto-final mt-3 mb-3"
                    style="display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            gap: 10px 5px; 
            border-top: 1px solid #eee; 
            padding-top: 12px;">

                    <?php if ($cuarto->int_wifi == 1): ?>
                      <div style="font-size: 10px; color: #666; text-align: center;" title="WiFi">
                        <i class="fas fa-wifi d-block mb-1" style="font-size: 14px;"></i> WiFi
                      </div>
                    <?php endif; ?>

                    <?php if ($cuarto->int_bpriv == 1): ?>
                      <div style="font-size: 10px; color: #666; text-align: center;" title="Baño Privado">
                        <i class="fas fa-bath d-block mb-1" style="font-size: 14px;"></i> Baño Privado
                      </div>
                    <?php endif; ?>

                    <?php if ($cuarto->int_cocina == 1): ?>
                      <div style="font-size: 10px; color: #666; text-align: center;" title="Cocina">
                        <i class="fas fa-utensils d-block mb-1" style="font-size: 14px;"></i> Cocina
                      </div>
                    <?php endif; ?>

                    <?php if ($cuarto->int_amoblado == 1): ?>
                      <div style="font-size: 10px; color: #666; text-align: center;" title="Amoblado">
                        <i class="fas fa-bed d-block mb-1" style="font-size: 14px;"></i> Amoblado
                      </div>
                    <?php endif; ?>

                    <?php if ($cuarto->int_pareja == 1): ?>
                      <div style="font-size: 10px; color: #666; text-align: center;" title="Parejas">
                        <i class="fas fa-users d-block mb-1" style="font-size: 14px;"></i> Pareja
                      </div>
                    <?php endif; ?>

                    <?php if ($cuarto->int_mascota == 1): ?>
                      <div style="font-size: 10px; color: #666; text-align: center;" title="Mascotas">
                        <i class="fas fa-paw d-block mb-1" style="font-size: 14px;"></i> Mascota
                      </div>
                    <?php endif; ?>

                    <?php if ($cuarto->int_ascensor == 1): ?>
                      <div style="font-size: 10px; color: #666; text-align: center;" title="Ascensor">
                        <i class="fas fa-arrow-up d-block mb-1" style="font-size: 14px;"></i> Ascensor
                      </div>
                    <?php endif; ?>


                    <?php if ($cuarto->int_visita == 1): ?>
                      <div style="font-size: 10px; color: #666; text-align: center;" title="Visitas">
                        <i class="fas fa-user-friends d-block mb-1" style="font-size: 14px;"></i> Visita
                      </div>
                    <?php endif; ?>

                    <?php if ($cuarto->int_kds == 1): ?>
                      <div style="font-size: 10px; color: #666; text-align: center;" title="Niños">
                        <i class="fas fa-child d-block mb-1" style="font-size: 14px;"></i> Niños
                      </div>
                    <?php endif; ?>

                    <?php if ($cuarto->int_fumar == 1): ?>
                      <div style="font-size: 10px; color: #666; text-align: center;" title="Permite Fumar">
                        <i class="fas fa-smoking d-block mb-1" style="font-size: 14px;"></i> Fumar
                      </div>
                    <?php endif; ?>

                    <?php if ($cuarto->int_sotano == 1): ?>
                      <div style="font-size: 10px; color: #666; text-align: center;" title="Sótano">
                        <i class="fas fa-level-down-alt d-block mb-1" style="font-size: 14px;"></i> Bsmt
                      </div>
                    <?php endif; ?>

                    <?php if ($cuarto->int_lavanderia == 1): ?>
                      <div style="font-size: 10px; color: #666; text-align: center;" title="Lavandería">
                        <i class="fas fa-tshirt d-block mb-1" style="font-size: 14px;"></i> Laundry
                      </div>
                    <?php endif; ?>

                    <?php if ($cuarto->int_ind == 1): ?>
                      <div style="font-size: 10px; color: #666; text-align: center;" title="Cuarto Independiente">
                        <i class="fas fa-user-lock d-block mb-1" style="font-size: 14px;"></i> Independiente
                      </div>
                    <?php endif; ?>
                  </div>

                  <hr>
                  <div class="row no-gutters mt-3 mb-2 text-center">

                    <div class="col-4 px-1">
                      <a href="<?php echo base_url() . 'sorayarooms/cuartos_vacios/' . str_replace(' ', '-', safename($cuarto->txt_ciudad)) . '/' . str_replace("S-", "", $cuarto->txt_serie); ?>"
                        class="btn btn-secondary btn-block d-flex align-items-center justify-content-center rounded py-2 px-0 font-weight-bold"
                        style="font-size: 11px; height: 35px;">
                        <i class="fas fa-plus-circle mr-1" style="font-size: 16px;"></i> DETALLES
                      </a>
                    </div>

                    <div class="col-4 px-1">
                      <a target="new" href="https://wa.me/17185771511?text=Hola,%20estoy%20interesado%20en%20el%20cuarto%20SERIE:%20<?php echo str_replace("S-", "", $cuarto->txt_serie); ?>"
                        class="btn btn-success btn-block d-flex align-items-center justify-content-center rounded py-2 px-0 font-weight-bold"
                        style="font-size: 11px; height: 35px;">
                        <i class="fab fa-whatsapp mr-1" style="font-size: 16px;"></i> CHAT AQUI
                      </a>
                    </div>

                    <div class="col-4 px-1">
                      <?php if (isset($cuarto->total_videos) && $cuarto->total_videos > 0): ?>
                        <a class="btn btn-outline-primary btn-block d-flex align-items-center justify-content-center rounded py-2 px-0 font-weight-bold"
                          style="font-size: 11px; height: 35px;"
                          href="javascript:void(0)"
                          data-toggle="modal"
                          data-target="#overlay"
                          data-id="<?php echo str_replace("S-", "", $cuarto->txt_serie); ?>">
                          <i class="fas fa-play-circle mr-1" style="font-size: 16px;"></i> VER VIDEO
                        </a>
                      <?php else: ?>
                        <div class="btn btn-block disabled py-2 px-0 border-0" style="height: 45px;"></div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="alert alert-info text-center">No hay habitaciones disponibles.</div>
    <?php endif; ?>

  </div>
</section>