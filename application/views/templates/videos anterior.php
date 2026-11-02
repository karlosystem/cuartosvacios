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

          <ul class="video-list featured">
            <?php
            if (!empty($video_youtube)) {
              foreach ($video_youtube as $row) {
                if ($row['status'] == 1) {
            ?>
                  <li class="video featured">
                    <a data-fancybox href="https://www.youtube.com/embed/<?php echo $row['yt_id'] ?>?autoplay=1&controls=0&showinfo=0&color=white&rel=0" class="featured-video">
                      <figure style="background-image: url(https://img.youtube.com/vi/<?php echo $row['yt_id'] ?>/hqdefault.jpg);">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/50598/video-thumb-placeholder-16-9.png" />

                        <figcaption class="top-title">
                          <span class="title-left"><?php echo $row['serie_random']; ?></span>

                          <?php if (!empty($row['txt_etiqueta'])): ?>
                            <span class="badge badge-hot">
                              <?php echo $row['txt_etiqueta']; ?>
                            </span>
                          <?php endif; ?>
                        </figcaption>

                        
                       <figcaption class="bottom-title">
                        <div class="bottom-left">
                            <?php echo $row['habitacion'] ?> / 
                            $ <?php echo $row['precio_solo'] ?> - $ <?php echo $row['precio_pareja'] ?>
                        </div>
                        
                        <div class="bottom-right">
                            <span class="btn-ver-video">Ver Video ▶</span>
                        </div>
                    </figcaption>


                    </a>
                  </li>
            <?php
                }
              }
            }
            ?>
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

