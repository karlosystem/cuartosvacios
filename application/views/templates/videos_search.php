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

  /* ==========================================
     ESTILOS PARA VIDEO GRID
     ========================================== */
  
  .video-grid {
    width: 100%;
    padding: 20px 0;
  }

  .video-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 25px;
  }

  .video-list li {
    margin: 0;
  }

  .video-list a {
    display: block;
    text-decoration: none;
    transition: transform 0.3s ease;
  }

  .video-list a:hover {
    transform: translateY(-5px);
  }

  figure {
    position: relative;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    padding-bottom: 56.25%; /* Proporción 16:9 */
    height: 0;
    margin: 0;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  }

  figure img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0; /* Ocultamos la imagen placeholder */
  }

  figure figcaption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    color: white;
    padding: 20px 15px 15px;
    text-align: center;
    font-weight: 700;
    font-size: 16px;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  /* Icono de play overlay */
  figure::before {
    content: '▶';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    background: rgba(255,255,255,0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: #ff5722;
    z-index: 1;
    transition: all 0.3s ease;
  }

  .video-list a:hover figure::before {
    transform: translate(-50%, -50%) scale(1.1);
    background: white;
    box-shadow: 0 0 20px rgba(255,87,34,0.6);
  }

  /* Fancybox styles */
  .fancybox-slide--video .fancybox-content {
    width: 90% !important;
    max-width: 1000px !important;
    margin: 0 auto;
  }

  .fancybox-slide--video .fancybox-slide {
    padding: 40px 20px !important;
  }

  .fancybox-content iframe {
    min-height: 400px !important;
    width: 100% !important;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .video-list {
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 15px;
    }
    
    figure figcaption {
      font-size: 14px;
      padding: 15px 10px 10px;
    }
  }

  @media (max-width: 480px) {
    .video-list {
      grid-template-columns: 1fr;
    }
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
          <h3>Search Room's Videos</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
     <form id="formBuscar" action="<?php echo base_url(); ?>videos/search_video" method="POST" class="card card-sm mb-3">
       
	    <div class="card-body row no-gutters align-items-center">
          <div class="col-auto">
            <i class="fas fa-search h4 text-body"></i>
          </div>
          <div class="col">
            <input class="form-control form-control-lg form-control-borderless" type="text" placeholder="00000" id="keyword" name="keyword">			
          </div>
          <div class="col-auto">
            <button class="btn btn-lg btn-success mr-2" id="btnBuscar02" type="submit">Buscar</button>
          </div>
		  <div class="col-auto">
			  <a href="<?php echo base_url(); ?>videos" class="btn btn-lg btn-danger">Ver Todo</a>
		  </div>
        </div>
      </form>
	  <small class="mt-3">(*) ingrese el codigo de 5 digitos.</small>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="section_title mb-40 text-center mt-30">
        <h4>Search Video by Code: <strong><?php if (!empty($dato)) { echo $dato; }  ?></strong></h4>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftc-no-pb mt-1">
  <div class="container card-default">
    <div class="row">
      <div class="col-lg-12 mt-2">
        <div class="video-grid front-page" id="front-page-videos">
          <ul class="video-list featured">
            <?php
            if (!empty($video_array)) {
              foreach ($video_array as $row) {
            ?>
                  <li class="video featured">
                    <a data-fancybox="videos" 
                       href="https://www.youtube.com/embed/<?php echo $row['yt_id'] ?>?autoplay=0&controls=1&showinfo=1&color=white&rel=0" 
                       class="featured-video"
                       data-width="854"
                       data-height="480">
                      <figure style="background-image: url('https://img.youtube.com/vi/<?php echo $row['yt_id'] ?>/hqdefault.jpg');">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" 
                             alt="Video <?php echo $row['serie_random'] ?>" />
                        <figcaption><?php echo $row['serie_random'] ?></figcaption>
                      </figure>
                    </a>
                  </li>
            <?php
              }
            }
            ?>
          </ul>
        </div>
        <BR></BR>
      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<script>
  $(document).ready(function() {
    $('[data-fancybox]').fancybox({
      youtube: {
        controls: 1,
        showinfo: 1,
        autoplay: 0
      },
      video: {
        width: '90%',
        maxWidth: '1000px',
        aspectRatio: '16:9'
      },
      iframe: {
        css: {
          width: '100%',
          height: '100%'
        }
      }
    });
  });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const input = document.getElementById("keyword");
    const boton = document.getElementById("btnBuscar02");
    const form = document.getElementById("formBuscar");

    // Función para habilitar/deshabilitar el botón
    function validarBoton() {
        boton.disabled = input.value.trim() === "00000";
    }

    // Evento mientras se escribe
    input.addEventListener("input", validarBoton);

    // Validación del formulario con alert
    form.addEventListener("submit", function (e) {
        if (input.value.trim() === "00000") {
            e.preventDefault();
            alert("Por favor, ingresa el codigo en el campo de busqueda.");
        }
    });

    // Ejecutar validación inicial
    validarBoton();
});
</script>