<div class="bradcam_area bradcam_bg_1">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text text-center">
          <h3>Search rooms:</h3>
        </div>

        <div class="property_form d-flex justify-content-center align-items-center mt-3">
          <form action="<?php echo base_url(); ?>rooms/search_rooms" method="POST">
            <div class="row">
              <div class="col-xl-12">
                <div class="form_wrap d-flex">
                  <div class="single-field max_width ">
                    <label for="#"> <span class="text-primary">Enter Zip Code</span></label>
                    <input type="numeric" name="keyword" id="keyword" class="form-control wide">
                  </div>

                  <div class="serach_icon">
                    <input style="margin-top: 28px; margin-left:10px;" class="btn btn-success" type="submit" value="Search">
                  </div>

                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="popular_property plus_padding">
  <div class="container-fluid">


    <div class="row">
      <div class="col-xl-12">
        <div class="section_title mb-40 text-center">
          <h4>Search Rooms by Zip Code: <strong><?php if (!empty($dato)) {
                                                  echo $dato;
                                                }  ?></strong></h4>
        </div>
      </div>
    </div>

    <div class="row">

      <?php if (!empty($room_array)) { ?>
        <?php foreach ($room_array as $cuarto) {

          if (!empty($cuarto['txt_precio_solo']) || !empty($cuarto['txt_precio_pareja'])) {
            $periodo = "W E E K L Y";
            $precio_solo = "$ " . $cuarto['txt_precio_solo'];
            $precio_pareja = "$ " . $cuarto['txt_precio_pareja'];
          }
          if (!empty($cuarto['txt_precio_mensual']) || !empty($cuarto['txt_precio_mensual01'])) {
            $periodo = "M O N T H L Y";
            $precio_solo = "$ " . $cuarto['txt_precio_mensual'];
            $precio_pareja = "$ " . $cuarto['txt_precio_mensual01'];
          }

        ?>


          <div class="col-xl-3 col-md-4 col-lg-3">
            <div class="single_property">
              <div class="property_content">
                <div class="main_pro">
                  <h3>
                    <a href="<?php echo base_url() . 'sorayarooms/cuartos_vacios/' . str_replace(' ', '-', safename($cuarto['txt_ciudad'])) . '/' . $cuarto['pk_listing']; ?>">ID ROOM: <?php echo $cuarto['auto']; ?></a>

                    <span><a class="btn btn-primary btn-sm rounded-pill" href="<?php echo base_url() . 'sorayarooms/cuartos_vacios/' . str_replace(' ', '-', safename($cuarto['txt_ciudad'])) . '/' . $cuarto['pk_listing']; ?>">Ver Más</a></span>
                  </h3>
                  <div class="mark_pro">
                    <img src="<?php echo base_url(); ?>assets/images/location.svg" alt="">
                    <span><?php echo $cuarto['txt_ciudad']; ?></span>
                  </div>

                  <span class="amount"><?php echo $cuarto['tipo']; ?></span><br>
                  <span class="periodo"><?php echo $periodo; ?></span>

                </div>
              </div>

              <div class="footer_pro">
                <ul>
                  <li>
                    <div class="single_info_doc">
                      <img src="<?php echo base_url(); ?>assets/images/square.svg" alt="">
                      <span>Single: <strong><?php echo $precio_solo; ?></strong></span>
                    </div>
                  </li>
                  <li>
                    <div class="single_info_doc">
                      <img src="<?php echo base_url(); ?>assets/images/bed.svg" alt="">
                      <span>Couple: <strong><?php echo $precio_pareja; ?></strong></span>
                    </div>
                  </li>

                </ul>
              </div>


            </div>
          </div>

        <?php } ?>
      <?php } else { ?>
        <h1 style="width:100%;text-align:center;">No hay Cuartos</h1>
      <?php } ?>



    </div>


  </div>
</div>