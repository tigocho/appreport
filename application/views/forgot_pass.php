<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>appreport</title>
      <!-- Favicon -->
       <!-- Favicon -->
       <link rel="shortcut icon" href="<?php echo base_url();?>resources/images/icono.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>resources/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>resources/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>resources/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>resources/css/responsive.css">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container sign-in-page-bg mt-5 p-0">
                <div class="row no-gutters">
                    <div class="col-md-6 text-center">
                        <div class="sign-in-detail text-white">
                        <img src="<?php echo base_url();?>resources/images/ospedale.png" height="110" >
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="<?php echo base_url();?>resources/images/1.jpeg" class="img-fluid mb-4" alt="logo">
                                </div>
                                <div class="item">
                                    <img src="<?php echo base_url();?>resources/images/2.jpeg" class="img-fluid mb-4" alt="logo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <div class="sign-in-from">
                        <h1 class="mb-0">Recuperar contraseña</h1>
								<p>Recuerda Utilizar el correo con el se encuentra registrado.</p>
								<b><?php echo @$error;?></b>
								<form class="mt-4" method="post" action=''>

									<div class="form-group">
										<label for="exampleInputEmail1">Correo</label>
										<input type="email" class="form-control mb-0" name="email" id="name" placeholder="ingresar correo"/>
									</div>

									<div class="d-inline-block w-100">

										<button type="submit" value="login" name="forgot_pass" class="btn btn-primary float-right">Recuperar contraseña</button>
									</div>

								</form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="<?php echo base_url();?>resources/js/jquery.min.js"></script>
      <script src="<?php echo base_url();?>resources/js/popper.min.js"></script>
      <script src="<?php echo base_url();?>resources/js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="<?php echo base_url();?>resources/js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="<?php echo base_url();?>resources/js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="<?php echo base_url();?>resources/js/waypoints.min.js"></script>
      <script src="<?php echo base_url();?>resources/js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="<?php echo base_url();?>resources/js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="<?php echo base_url();?>resources/js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="<?php echo base_url();?>resources/js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="<?php echo base_url();?>resources/js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="<?php echo base_url();?>resources/js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="<?php echo base_url();?>resources/js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="<?php echo base_url();?>resources/js/smooth-scrollbar.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="<?php echo base_url();?>resources/js/chart-custom.js"></script>
      <!-- Custom JScript -->
      <script src="<?php echo base_url();?>resources/js/custom.js"></script>
   </body>
</html>
        