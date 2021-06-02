  <!-- TOP Nav Bar -->
  <div class="iq-top-navbar header-top-sticky">
            <div class="iq-navbar-custom">
               <div class="iq-sidebar-logo">
                  <div class="top-logo">
                     <a href="index.html" class="logo">
                     <img src="<?php echo base_url();?>resources/images/logo.png" class="img-fluid" alt="">
                     <span>G-8</span>
                     </a>
                  </div>
               </div>
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-more-fill"></i></div>
                           <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                     </div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  </div>
                  <ul class="navbar-list">
                     <li>
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                           <img src="<?php echo base_url();?>resources/images/icono.ico" class="img-fluid rounded mr-3" alt="user">
                           <div class="caption">
                              <h6 class="mb-0 line-height"><?php echo $this->session->userdata('usu_nom')." ".$this->session->userdata('usu_ape') ?></h6>
                           </div>
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hola <?php echo $this->session->userdata('usu_nom')." ".$this->session->userdata('usu_nom_two');?></h5>
                                    <span class="text-white font-size-12"><?php echo ucwords($this->session->userdata('rol_des'))?></span>
                                 </div>               
                                 <div class="d-inline-block w-100 text-center p-3">
                                    <a class="bg-primary iq-sign-btn" href="<?php echo base_url() ?>login/logout" role="button">Cerrar sesión<i class="ri-login-box-line ml-2"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </nav>

            </div>
         </div>

