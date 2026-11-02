<div class="bradcam_area bradcam_bg_1">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text text-center">
          <h3>Contáctenos</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="contact-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="contact-title">Get in Touch</h2>
      </div>
      <div class="col-lg-8">
        <form class="form-contact contact_form" action="<?php echo base_url(); ?>contactenos/save" method="post" name="contact_form" id="contact_form">

          <?php
          if ($this->session->userdata("error_box")) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $this->session->userdata("success_message");
            echo '</div>';
            $this->session->unset_userdata("success_message");
            $this->session->unset_userdata("error_box");
          }
          if ($this->session->userdata("valid_box")) {
            echo '<div class="alert alert-success" role="alert">';
            echo $this->session->userdata("success_message");
            echo '</div>';
            $this->session->unset_userdata("success_message");
            $this->session->unset_userdata("valid_box");
          }
          ?>


          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <textarea class="form-control w-100" title="Inrese su consulta" name="enquiry" id="enquiry" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter your Message"></textarea>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input class="form-control valid" title="Inrese su nombre" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input class="form-control valid" title="Inrese su Email" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Enter your Email">
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <input class="form-control" title="Inrese su Telefono" name="mobile" id="mobile" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Mobile'" placeholder="Enter your Mobile">
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <br>
                <?php echo $this->recaptcha->render(); ?>
                <br>
              </div>
            </div>

          </div>
          <div class="form-group mt-3">
            <input type="submit" value="Enviar Mensaje" class="button button-contactForm boxed-btn">
          </div>
        </form>
      </div>
      <div class="col-lg-3 offset-lg-1">
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-home"></i></span>
          <div class="media-body">
            <h3>2020 grand concourse ave Bronx</h3>
            <p>NY, United States</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-tablet"></i></span>
          <div class="media-body">
            <h3>+718-577-1511</h3>
            <p>lun a sab 9am a 8pm <br>
              domingo 10am a 6pm</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-email"></i></span>
          <div class="media-body">
            <h3><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1b686e6b6b74696f5b787477746977727935787476">sorayarooms2020@gmail.com</a></h3>
            <p>Send us your query anytime!</p>
          </div>
        </div>

		 <div class="media contact-info">
			<a href="https://www.youtube.com/channel/UCwEsIp3LpTuVh5sGvAAzn4g/videos" target="_new">
			<img src="<?php echo base_url(); ?>assets/images/youtube-channel_orig.png" class="img-fluid">
			</a>
        </div>

		 <div class="media contact-info">
			<a href="https://www.tiktok.com/@sorayarooms" target="_new">
			<img src="<?php echo base_url(); ?>assets/images/tiktok.jpg" class="img-fluid">
			</a>
        </div>

      </div>
    </div>
  </div>
</section>