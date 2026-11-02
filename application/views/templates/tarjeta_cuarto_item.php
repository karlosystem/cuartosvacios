<div class="col-xl-3 col-md-4 col-lg-3 col-sm-6 mb-4">
    <div class="card-cuarto-modern <?php echo $clase_borde_cuadro; ?>" style="border-top: 3px solid <?php echo $theme_color; ?>;">
        
        <!-- Badges Superiores -->
        <div class="badge-top-right">
            <button class="btn-favorito-circle btn-favorito" 
                    data-id="<?php echo $codigo_limpio; ?>" 
                    title="Quitar de favoritos"
                    data-text-add="Agregar a Favoritos"
                    data-text-remove="Quitar de Favoritos">
                <i class="fas fa-heart"></i>
                <span class="btn-favorito-text">Quitar de Favoritos</span>
            </button>
        </div>

        <!-- Icono de Casa y Código -->
        <div class="card-header-info">
            <div class="icon-casa-circle" style="background-color: <?php echo $theme_color; ?>20; color: <?php echo $theme_color; ?>;">
                <i class="fas fa-home"></i>
            </div>
            
            <div class="codigo-wrapper">
                <span class="codigo-label">CÓDIGO</span>
                <h3 class="codigo-cuarto" style="color: <?php echo $theme_color; ?>;"><?php echo $codigo_limpio; ?></h3>
                
                <?php if ($cuarto->int_mapa == 1 && !empty($cuarto->txt_latitud) && !empty($cuarto->txt_longitud)): ?>
                    <a href="<?php echo base_url() . 'sorayarooms/cuartos_vacios/' . str_replace(' ', '-', safename($cuarto->txt_ciudad)) . '/' . $codigo_limpio; ?>" 
                       class="btn-ver-mapa-modern" 
                       style="color: <?php echo $theme_color; ?>; background-color: <?php echo $theme_color; ?>15;">
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
            <a target="_blank" href="https://wa.me/17185771511?text=Interesado%20en%20cuarto%20CODIGO:%20<?php echo $codigo_limpio; ?>" 
               class="btn-accion-bar" style="color: white;">
                <i class="fab fa-whatsapp"></i>
                <span>CHAT</span>
            </a>
            
            <a href="<?php echo base_url() . 'sorayarooms/cuartos_vacios/' . str_replace(' ', '-', safename($cuarto->txt_ciudad)) . '/' . $codigo_limpio; ?>" 
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