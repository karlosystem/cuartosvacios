<?php $codigo_url = $this->input->get('codigo'); ?>
<script>
  window.console = window.console || function(t) {};
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/50598/jquery.fancybox-three.min.css'>
<style>
  .form-control-borderless {
    border: none;
  }

  .form-control-borderless:hover,
  .form-control-borderless:active,
  .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
  }

  #keyword {
    font-size: 24px;
    /* tamaño del texto cuando escribes */
  }

  #keyword::placeholder {
    font-size: 24px;
    /* Cambia el tamaño a lo que desees */
  }
</style>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


<div class="bradcam_area bradcam_bg_1">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text text-center">
          <h3>Room's Videos</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <br />
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">


      <form id="formBuscar" action="<?php echo base_url(); ?>videos/search_video" method="POST" class="card card-sm mb-3">

        <div class="card-body row no-gutters align-items-center">

          <div class="col-auto">
            <i class="fas fa-search h4 text-body"></i>
          </div>
          <!--end of col-->
          <div class="col">
            <!-- <input class="form-control form-control-lg form-control-borderless" type="text" placeholder="00000" id="keyword" name="keyword"> -->
            <input class="form-control form-control-lg form-control-borderless" type="text" placeholder="00000" id="keyword" name="keyword" value="<?php echo ($codigo_url) ? $codigo_url : ''; ?>">
          </div>
          <!--end of col-->
          <div class="col-auto">
            <button class="btn btn-lg btn-success mr-2" id="btnBuscar02" type="submit" disabled>Buscar</button>
          </div>

          <!--end of col-->
        </div>


      </form>
      <small class="mt-3">(*) ingrese el codigo del video de 5 digitos.</small>
    </div>
    <!--end of col-->
  </div>
</div>

<section class="ftco-section ftc-no-pb mt-5">
  <div class="container card-default">
    <div class="row">
      <div class="col-lg-12 mt-3">
        <div class="video-grid front-page" id="front-page-videos">

          <!-- PAGINACIÓN -->
          <div class="pagination-wrapper text-center mt-4 mb-4">
            <?= $links ?>
          </div>

         <ul class="video-list featured" style="display: flex; flex-wrap: wrap; justify-content: center; padding: 0; margin: 0; list-style: none;">
    <?php if (!empty($video_youtube) && is_array($video_youtube)): ?>
        <?php foreach ($video_youtube as $row): ?>
            <?php if (isset($row['status']) && $row['status'] == 1): ?>
                <li class="video featured" style="flex: 0 0 33.333%; max-width: 33.333%; padding: 15px; box-sizing: border-box;">
                    <a data-fancybox href="https://www.youtube.com/embed/<?php echo $row['yt_id'] ?>?autoplay=1&controls=0&showinfo=0&color=white&rel=0" class="featured-video" style="display: block; position: relative; overflow: hidden; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                        <figure style="margin: 0; position: relative;">
                            <img src="https://img.youtube.com/vi/<?php echo $row['yt_id'] ?>/hqdefault.jpg" 
                                 alt="<?php echo $row['video_title'] ?>" 
                                 style="width: 100%; height: auto; display: block;">
                            
                            <figcaption class="top-title" style="position: absolute; top: 0; left: 0; right: 0; padding: 15px; background: rgba(0,0,0,0.7); color: white; z-index: 2;">
                                <span class="title-left" style="font-size: 16px; font-weight: bold;">
                                    <?php echo $row['serie_random']; ?>
                                </span>
                                <?php if (!empty($row['txt_etiqueta'])): ?>
                                    <span class="badge badge-hot" style="background: #ff1744; color: white; padding: 3px 7px; border-radius: 4px; font-size: 11px; margin-left: 10px;">
                                        <?php echo $row['txt_etiqueta']; ?>
                                    </span>
                                <?php endif; ?>
                            </figcaption>

                            <figcaption class="bottom-title" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 15px; background: rgba(255,0,0,0.8); color: white; z-index: 2;">
                                <div class="bottom-left" style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="font-size: 14px;">
                                        <?php echo isset($row['habitacion']) ? $row['habitacion'] : ''; ?>
                                    </span>
                                    <span style="font-size: 14px; font-weight: bold;">
                                        $ <?php echo $row['precio_solo'] ?> - $ <?php echo $row['precio_pareja'] ?>
                                    </span>
                                </div>
                                <div class="bottom-right" style="text-align: center; margin-top: 10px;">
                                    <span class="btn-ver-video" style="background: white; color: #ff0000; padding: 8px 15px; border-radius: 20px; font-weight: bold; font-size: 12px; display: inline-block;">
                                        Ver Video ▶
                                    </span>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <li style="width: 100%; text-align: center; padding: 40px; color: #666;">
            <p style="font-size: 18px;">No hay videos disponibles</p>
        </li>
    <?php endif; ?>
</ul>

          <!-- PAGINACIÓN -->
          <div class="pagination-wrapper text-center mt-4 mb-4">
            <?= $links ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function() {

    const input = document.getElementById("keyword");
    const boton = document.getElementById("btnBuscar02");
    const form = document.getElementById("formBuscar");

    // Funci�n para habilitar/deshabilitar el bot�n
    function validarBoton() {
      boton.disabled = input.value.trim() === "00000";
    }

    // Evento mientras se escribe
    input.addEventListener("input", validarBoton);

    // Validaci�n del formulario con alert
    form.addEventListener("submit", function(e) {
      if (input.value.trim() === "00000") {
        e.preventDefault();
        alert("Por favor, ingresa el codigo en el campo de busqueda.");
      }
    });

    // Ejecutar validaci�n inicial
    validarBoton();
  });
</script>