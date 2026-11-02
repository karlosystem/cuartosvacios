<div class="contact_action_area">
  <div class="container">
    <div class="row">
      <div class="col-xl-7">
        <div class="action_heading">
          <h3>&iquest;Tiene un cuarto para rentar?</h3>
        </div>
      </div>
      <div class="col-xl-5">
        <div class="call_add_action">
          <span>718-577-1511</span>
          <a href="https://sorayarooms.com/cuartosdisponibles" class="boxed-btn3-line">Agregar aqui</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <!-- ADD 2 -->
    <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-9207987238843042" data-ad-slot="5565973094"></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </div>
</div>

<footer class="footer">
  <div class="footer_top">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-md-6 col-lg-3">
          <div class="footer_widget">
            <div class="footer_logo">
              <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>assets/img/logo-soraya-footer.png" alt="">
              </a>
            </div>
            <p>
              <a href="mailto:sorayarooms2020@gmail.com"> sorayarooms2020@gmail.com</a>
              <br>
              Whastapp: 718-577-1511 <br>
              2020 grand concourse, Bronx, NY
            </p>
            <div class="socail_links">
              <ul>
                <li>
                  <a href="https://www.facebook.com/sorayaroomsoficial" target="_new">
                    <i class="fab fa-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="https://www.instagram.com/sorayarooms/?hl=es-la" target="_new">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
                <li>
                  <a href="https://www.youtube.com/channel/UCwEsIp3LpTuVh5sGvAAzn4g/videos" target="_new">
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
                <li>
                  <a href="https://www.tiktok.com/@sorayarooms" alt="TIK TOK" title="TIK TOK" target="_new">
                    <i class="fab fa-tiktok"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-md-6 col-lg-3">
          <div class="footer_widget">
            <h3 class="footer_title">
              Servicios
            </h3>
            <ul>
              <li><a href="<?php echo base_url(); ?>favoritos">Favoritos</a></li>
              <li><a href="<?php echo base_url(); ?>aplicacion">Aplicación en Ingles</a></li>
              <li><a href="<?php echo base_url(); ?>aplicacion/espanol">Aplicación en Español</a></li>
              <li><a href="https://sorayarooms.com/cuartosdisponibles">Anuncie Gratis</a></li>
              <li><a href="<?php echo base_url(); ?>contactenos">Contactenos</a></li>
            </ul>
          </div>
        </div>
        <div class="col-xl-2 col-md-6 col-lg-2">
          <div class="footer_widget">
            <h3 class="footer_title">
              Condados
            </h3>
           <ul>
            <?php
              if (!empty($condados)) {
                foreach ($condados as $s) {
                  if ($s['int_estado'] == 1) {
            ?>
                <li><a href="<?php echo base_url('renta/' . $s['slug']); ?>"><?php echo $s['nombre']; ?></a></li>    
            <?php
                  }
                }
              }
            ?>
          </ul>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 col-lg-4">
          <div class="footer_widget">
            <h3 class="footer_title">
              Subscribe
            </h3>
            <form action="#" class="newsletter_form">
              <input type="text" placeholder="Enter your mail">
              <button type="submit">Subscribe</button>
            </form>
            <p class="newsletter_text"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copy-right_text">
    <div class="container">
      <div class="footer_border"></div>
      <div class="row">
        <div class="col-xl-12">
          <p class="copy_right text-center">

            Copyright ©
            <script>
              document.write(new Date().getFullYear());
            </script> Todos los Derechos Reservados | Pagina web desarrollado por <a href="https://sorayarooms.com/" target="_blank">SorayaRooms</a>

          </p>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Slideup social -->
<!-- <div class="float-banner nav-down">
  <div class="float-container">
    <div class="float-row">
      <div class="floar-banner-wrap">
        <div class="btn-close" id="btn-close">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" enable-background="new 0 0 40 40">
            <line x1="5" y1="5" x2="35" y2="35" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-miterlimit="10"></line>
            <line x1="35" y1="5" x2="5" y2="35" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-miterlimit="10"></line>
          </svg>
        </div>
      </div>
    </div>
  </div>
</div> -->


<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/slideup-social.js"></script>

<!-- <script>
  $(function() {
    $('.float-banner').floatbanner({
      // socialName: ['facebook', 'twitter', 'instagram'],
      // userName: ['f4h3m', 'f4h3m', 'f4h3m'],
      // socialUrl: ['#', '#', '#'],
    });
  });
</script> -->

<script type="text/javascript">
  var base_url = '<?php echo base_url(); ?>';
</script>

<!-- <script src="<?php echo base_url(); ?>node_modules/whatsapp-button/dist/wpp_js/whatsappButton.js"></script>
<script>
  new WhatsappButton('17185771511', 'Necesita ayuda ?', '¡Estamos a su servicio! ¿Quiere ayuda para elegir un cuarto? Respondemos de manera inmediata', 'cuartosvacios, necesita ayuda ?', '1', 'green', '#FFFFFF', '#fff', 'https://fonts.googleapis.com/css?family=Roboto&display=swap');
</script> -->


<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"> </script>

<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/general.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/modernizr-3.5.0.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ajax-form.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/waypoints.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scrollIt.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.scrollUp.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/nice-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slicknav.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>

<script src="<?php echo base_url(); ?>assets/js/slick.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/contact.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/mail-script.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<!-- <script async="" src="<?php echo base_url(); ?>assets/js/js.js"></script> -->

<script>
  jQuery(function($) {
    $("#codigo_video").mask("99999", {
      placeholder: "0"
    });
  });
</script>


<script>
  jQuery(function($) {
    $("#mobile").mask("(999)999-9999", {
      placeholder: "0"
    });
  });
</script>

<script>
  jQuery(function($) {
    $("#txt_phone").mask("(999)999-9999", {
      placeholder: "0"
    });
  });
</script>

<script>
  jQuery(function($) {
    $("#txt_present_phone").mask("(999)999-9999", {
      placeholder: "0"
    });
  });
</script>

<script>
  jQuery(function($) {
    $("#txt_company_phone").mask("(999)999-9999", {
      placeholder: "0"
    });
  });
</script>

<script>
  jQuery(function($) {
    $("#txt_phone_reference_1").mask("(999)999-9999", {
      placeholder: "0"
    });
  });
</script>


<script>
  jQuery(function($) {
    $("#txt_phone_reference_2").mask("(999)999-9999", {
      placeholder: "0"
    });
  });
</script>

<script>
  jQuery(function($) {
    $("#txt_phone_emergency").mask("(999)999-9999", {
      placeholder: "0"
    });
  });
</script>

<script>
  jQuery(function($) {
    $("#keyword").mask("99999", {
      placeholder: "0"
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    function actualizarEstadoBotonDetalle() {
      let favoritos = JSON.parse(localStorage.getItem('mis_favoritos')) || [];
      let $btn = $('#btn-main-favorito');
      let idActual = $btn.data('id') ? $btn.data('id').toString() : '';

      if (idActual && favoritos.includes(idActual)) {
        // Estado: Ya es favorito
        $btn.removeClass('btn-outline-danger').addClass('btn-danger text-white');
        $('#icon-fav-main').removeClass('far').addClass('fas');
        $('#text-fav-main').text('QUITAR DE FAVORITOS');
      } else {
        // Estado: No es favorito
        $btn.removeClass('btn-danger text-white').addClass('btn-outline-danger');
        $('#icon-fav-main').removeClass('fas').addClass('far');
        $('#text-fav-main').text('AGREGAR A FAVORITOS');
      }
    }

    // Ejecutar al cargar la página
    actualizarEstadoBotonDetalle();

    // Escuchar el clic en el botón de favoritos (usando el evento que ya tienes definido)
    $(document).on('click', '.btn-favorito', function() {
      // Un pequeño delay para esperar a que el script principal actualice el LocalStorage
      setTimeout(actualizarEstadoBotonDetalle, 50);
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {

    function procesarBusqueda() {
      var inputCodigo = $('#codigo_video');
      var codigo = inputCodigo.val().trim(); // Quitamos espacios vacíos
      var msgError = $('#mensaje_error');

      // VALIDACIÓN MANUAL DEL "REQUIRED"
      if (codigo === "") {
        inputCodigo.addClass('is-invalid'); // Borde rojo
        msgError.text("Por favor, ingrese un código para buscar.").fadeIn();
        inputCodigo.focus();
        return; // Detiene la ejecución aquí
      }

      // Si pasó la validación, procedemos con AJAX
      $.ajax({
        url: "<?php echo base_url('videos/validar_codigo_ajax'); ?>",
        type: "POST",
        data: {
          codigo: codigo
        },
        dataType: "json",
        beforeSend: function() {
          // Opcional: Deshabilitar botón para evitar múltiples clics
          $('#btn_buscar_codigo').attr('disabled', true);
        },
        success: function(response) {
          if (response.status === 'success') {
            window.location.href = response.url;
          } else {
            msgError.text(response.message).fadeIn();
            inputCodigo.addClass('is-invalid');
            $('#btn_buscar_codigo').attr('disabled', false);
          }
        },
        error: function() {
          msgError.text("Error de conexión al servidor.").fadeIn();
          $('#btn_buscar_codigo').attr('disabled', false);
        }
      });
    }

    // Botón lupa
    $('#btn_buscar_codigo').click(function() {
      procesarBusqueda();
    });

    // Tecla Enter
    $('#codigo_video').keypress(function(e) {
      if (e.which == 13) {
        procesarBusqueda();
      }
    });

    // Limpiar alertas cuando el usuario empiece a escribir de nuevo
    $('#codigo_video').on('input', function() {
      $(this).removeClass('is-invalid');
      $('#mensaje_error').fadeOut();
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {

    $('#overlay').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget); // Botón que activó el modal
      var idDelCuarto = button.data('id'); // Extrae el ID del atributo data-id

      var modal = $(this);

      // 1. Actualizamos el texto visual en el modal
      modal.find('#modal_cuarto_id').text(idDelCuarto);

      // 2. Creamos el mensaje personalizado para WhatsApp
      // Usamos encodeURIComponent para que los espacios y caracteres especiales sean válidos en la URL
      var mensaje = "Solicito el codigo de Video de la serie : " + idDelCuarto;
      var urlWhatsapp = "https://wa.me/17185771511?text=" + encodeURIComponent(mensaje);

      // 3. Actualizamos el atributo href del enlace de WhatsApp
      modal.find('#link_whatsapp_dinamico').attr('href', urlWhatsapp);

      // Limpiamos campos de búsqueda previos
      $('#codigo_video').val('').removeClass('is-invalid');
      $('#mensaje_error').hide();
    });

  });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    var inputKeyword = $('#keyword');
    var btnBuscar = $('#btnBuscar');

    // SOLO ejecutar si el elemento existe en la página actual
    if (inputKeyword.length > 0) {
      function validarInput() {
        // Verificamos que el valor no sea undefined antes de usar trim()
        var valor = inputKeyword.val();
        if (valor && valor.trim().length > 0) {
          btnBuscar.prop('disabled', false);
        } else {
          btnBuscar.prop('disabled', true);
        }
      }

      validarInput();

      inputKeyword.on('input', function() {
        validarInput();
      });
    }
  });
</script>

<!-- ==========================================
     SISTEMA DE FAVORITOS - LOCALSTORAGE
     ========================================== -->
<script type="text/javascript">
$(document).ready(function() {
    
    // ==========================================
    // FUNCIÓN: Actualizar estado de botones de favoritos
    // ==========================================
    function actualizarBotonesFavoritos() {
        let favoritos = JSON.parse(localStorage.getItem('mis_favoritos')) || [];
        
        $('.btn-favorito').each(function() {
            let $btn = $(this);
            let id = $btn.data('id') ? $btn.data('id').toString() : '';
            let $icon = $btn.find('i');
            let $text = $btn.find('.btn-favorito-text');
            
            if (id && favoritos.includes(id)) {
                // Ya es favorito
                $btn.addClass('active');
                $icon.removeClass('far').addClass('fas');
                if ($text.length) {
                    $text.text($btn.data('text-remove') || 'Quitar de Favoritos');
                }
            } else {
                // No es favorito
                $btn.removeClass('active');
                $icon.removeClass('fas').addClass('far');
                if ($text.length) {
                    $text.text($btn.data('text-add') || 'Agregar a Favoritos');
                }
            }
        });
        
        // Actualizar contador global
        actualizarContadorUI();
    }

    // ==========================================
    // FUNCIÓN: Actualizar contador de favoritos
    // ==========================================
    function actualizarContadorUI() {
        let favoritos = JSON.parse(localStorage.getItem('mis_favoritos')) || [];
        let total = favoritos.length;

        let $contadores = $('.contador-global-favoritos, #contador-favoritos-movil');
        let $badges = $('.badge-favoritos, .badge-movil');

        $contadores.text(total);

        if (total === 0) {
            $badges.hide();
        } else {
            $badges.show();
            // Animación de salto
            $badges.css('transform', 'scale(1.3)');
            setTimeout(() => {
                $badges.css('transition', '0.3s').css('transform', 'scale(1)');
            }, 200);
        }
    }

    // ==========================================
    // FUNCIÓN: Mostrar notificación Toast
    // ==========================================
    function mostrarNotificacion(mensaje, tipo = 'success') {
        // Crear elemento de notificación
        let $notificacion = $('<div class="toast-notificacion">' + 
            '<i class="fas fa-check-circle"></i> ' + mensaje + 
        '</div>');
        
        if (tipo === 'error') {
            $notificacion.addClass('error');
            $notificacion.find('i').removeClass('fa-check-circle').addClass('fa-exclamation-circle');
        }
        
        $('body').append($notificacion);
        
        // Animar entrada
        setTimeout(() => $notificacion.addClass('show'), 100);
        
        // Remover después de 3 segundos
        setTimeout(() => {
            $notificacion.removeClass('show');
            setTimeout(() => $notificacion.remove(), 300);
        }, 3000);
    }

    // ==========================================
    // INICIALIZAR AL CARGAR LA PÁGINA
    // ==========================================
    actualizarBotonesFavoritos();

    // ==========================================
    // EVENTO CLICK EN BOTÓN DE FAVORITOS
    // ==========================================
    $(document).on('click', '.btn-favorito', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        let $btn = $(this);
        let idData = $btn.data('id');
        if (!idData) return;

        let idCuarto = idData.toString();
        let listaFavoritos = JSON.parse(localStorage.getItem('mis_favoritos')) || [];
        let yaExiste = listaFavoritos.includes(idCuarto);

        if (yaExiste) {
            // Mostrar alerta si ya está en favoritos
            if (confirm('Este cuarto ya está en tu lista de favoritos.\n\n¿Deseas quitarlo de favoritos?')) {
                // Quitar de favoritos
                listaFavoritos = listaFavoritos.filter(id => id !== idCuarto);
                localStorage.setItem('mis_favoritos', JSON.stringify(listaFavoritos));
                
                // Actualizar UI
                $btn.removeClass('active');
                $btn.find('i').removeClass('fas').addClass('far');
                let $text = $btn.find('.btn-favorito-text');
                if ($text.length) {
                    $text.text($btn.data('text-add') || 'Agregar a Favoritos');
                }
                
                actualizarContadorUI();
                
                // Feedback visual
                $btn.addClass('added');
                setTimeout(() => $btn.removeClass('added'), 300);
                
                // Mostrar notificación
                mostrarNotificacion('Eliminado de favoritos', 'error');
            }
        } else {
            // Agregar a favoritos
            listaFavoritos.push(idCuarto);
            localStorage.setItem('mis_favoritos', JSON.stringify(listaFavoritos));
            
            // Actualizar UI
            $btn.addClass('active');
            $btn.find('i').removeClass('far').addClass('fas');
            let $text = $btn.find('.btn-favorito-text');
            if ($text.length) {
                $text.text($btn.data('text-remove') || 'Quitar de Favoritos');
            }
            
            actualizarContadorUI();
            
            // Animación de éxito
            $btn.addClass('added');
            setTimeout(() => $btn.removeClass('added'), 300);
            
            // Mostrar notificación de éxito
            mostrarNotificacion('¡Agregado a favoritos exitosamente!', 'success');
        }
    });

});
</script>

<script>
  $(document).ready(function() {
    // 1. Extraer los IDs del almacenamiento local del navegador
    let favoritos = JSON.parse(localStorage.getItem('mis_favoritos')) || [];

    if (favoritos.length === 0) {
      // Si no hay nada guardado, mostramos un mensaje amigable
      $('#contenedor-favoritos').html(`
            <div class="col-12 text-center py-5" style="background: #f9f9f9; border-radius: 20px;">
                <i class="far fa-heart fa-4x mb-3" style="color: #ddd;"></i>
                <h4 class="text-muted">No tienes favoritos todavía</h4>
                <p>Navega por nuestra lista de cuartos y haz clic en el corazón para guardarlos aquí.</p>
                <a href="<?php echo base_url(); ?>" class="btn btn-primary mt-3" style="border-radius: 12px;">
                    Ver Cuartos Disponibles
                </a>
            </div>
        `);
    } else {
      // 2. Si hay IDs, pedirlos al controlador Favoritos.php mediante AJAX
      $.ajax({
        url: "<?php echo base_url('favoritos/cargar_favoritos_ajax'); ?>",
        method: "POST",
        data: {
          ids: favoritos
        },
        beforeSend: function() {
          // Opcional: mostrar algo mientras carga
        },
        success: function(html) {
          // Inyectamos las tarjetas generadas por el servidor
          $('#contenedor-favoritos').html(html);
        },
        error: function() {
          $('#contenedor-favoritos').html('<p class="text-danger text-center">Hubo un error al recuperar tus favoritos. Intenta de nuevo.</p>');
        }
      });
    }
  });

  function enviarFavoritosWhatsApp() {
    // Buscamos específicamente los spans con la clase que acabamos de crear
    const elementosId = document.querySelectorAll('.id-habitacion');

    let idsEncontrados = [];

    elementosId.forEach(el => {
      // Obtenemos el texto (ej: "7813")
      const idTexto = el.innerText.trim();
      if (idTexto) {
        idsEncontrados.push(idTexto);
      }
    });

    if (idsEncontrados.length === 0) {
      alert("No tienes IDs en tus favoritos para enviar.");
      return;
    }

    // Datos del administrador
    const telefonoAdmin = "17185771511";
    const listaIds = idsEncontrados.join(", ");

    // Mensaje personalizado para el mercado de New York
    const mensaje = encodeURIComponent(`Hola SorayaRooms, estoy interesado en estas habitaciones de mis favoritos. SERIES: ${listaIds}`);

    // Abrir WhatsApp en una nueva pestaña
    window.open(`https://wa.me/${telefonoAdmin}?text=${mensaje}`, '_blank');
  }
</script>

<script type="text/javascript">
$(document).ready(function() {
    // Función para obtener el índice del último slide
    function getLastSlideIndex(carouselId) {
        return $(carouselId + ' .carousel-inner .carousel-item').length - 1;
    }

    // Botón Primero - Desktop
    $('#carouselDesktop').on('click', '.carousel-controls-custom button[data-slide="0"]', function() {
        $('#carouselDesktop').carousel(0);
    });

    // Botón Último - Desktop
    $('#carouselDesktop').on('click', '.carousel-controls-custom button[data-slide="last"]', function() {
        var lastIndex = getLastSlideIndex('#carouselDesktop');
        $('#carouselDesktop').carousel(lastIndex);
    });

    // Botón Anterior - Desktop
    $('#carouselDesktop').on('click', '.carousel-controls-custom .carousel-prev', function() {
        $('#carouselDesktop').carousel('prev');
    });

    // Botón Siguiente - Desktop
    $('#carouselDesktop').on('click', '.carousel-controls-custom .carousel-next', function() {
        $('#carouselDesktop').carousel('next');
    });

    // Botón Primero - Móvil
    $('#carouselMobile').on('click', '.carousel-controls-custom button[data-slide="0"]', function() {
        $('#carouselMobile').carousel(0);
    });

    // Botón Último - Móvil
    $('#carouselMobile').on('click', '.carousel-controls-custom button[data-slide="last"]', function() {
        var lastIndex = getLastSlideIndex('#carouselMobile');
        $('#carouselMobile').carousel(lastIndex);
    });

    // Botón Anterior - Móvil
    $('#carouselMobile').on('click', '.carousel-controls-custom .carousel-prev', function() {
        $('#carouselMobile').carousel('prev');
    });

    // Botón Siguiente - Móvil
    $('#carouselMobile').on('click', '.carousel-controls-custom .carousel-next', function() {
        $('#carouselMobile').carousel('next');
    });
});
</script>

</body>

</html>