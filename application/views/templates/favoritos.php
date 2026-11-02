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


<div class="bradcam_area bradcam_bg_1">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text text-center">
          <h3>Mis Cuartos Favoritos</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="popular_property">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h2 class="contact-title"><i class="fas fa-heart text-danger"></i> Mis Favoritos Guardados</h2>

        <div class="container text-center my-5">
            <button onclick="enviarFavoritosWhatsApp()" class="btn-wasap-canal btn-cabecera" style="height: 50px !important; padding: 0 30px !important; font-size: 16px !important; border-radius: 10px !important;">
                <i class="fab fa-whatsapp" style="margin-right: 10px;"></i> 
                ENVIAR ESTAS SERIES POR WHATSAPP
            </button>
        </div>

      <!--   <p class="text-muted">Aquí aparecen los cuartos que has marcado con un corazón.</p> -->

      </div>
    </div>

    <div class="row mt-4" id="contenedor-favoritos">
      <div class="col-12 text-center py-5" id="loader-favoritos">
        <div class="spinner-border text-primary" role="status"></div>
        <p class="mt-3">Buscando tus favoritos en este dispositivo...</p>

      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12">
        <a href="<?php echo base_url(); ?>" class="btn btn-outline-primary mt-3" style="border-radius: 12px; padding: 10px 20px;">
          <i class="fas fa-arrow-left mr-2"></i> Volver al Inicio
        </a>
      </div>
    </div>

  </div>
</div>