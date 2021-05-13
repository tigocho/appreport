<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="index.html">

        <img src="<?php echo base_url();?>resources/images/inicio.png" class="img-fluid" alt="">
        <span>bitacora novedades</span>
        </a>
        <div class="iq-menu-bt-sidebar">
                <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="ri-more-fill"></i></div>
                    <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                </div>
                </div>
            </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="active">
                <a href="<?php echo base_url();?>inicio/index" class="iq-waves-effect"><i class="fa fa-home"></i><span>inicio</span></a>
                </li>  
                <li>
                    <a href="#novedad" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-folder"></i><span>novedades</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="novedad" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="<?php echo base_url();?>novelty/index" id="abiertas"  class="iq-waves-effect"><i class="ri-book-open-fill"></i><span  >novedades abiertas</span></a></li>
                        <li><a href="<?php echo base_url();?>novelty/index" id="cerradas"  class="iq-waves-effect"><i class="fa fa-book"></i><span>novedades cerradas</span></a></li>
                    </ul>
                </li>
                <?php if ($this->session->userdata('rol_id')== 1){?>
                <li>
                <a href="<?php echo base_url();?>collaborator/index" class="iq-waves-effect"><i class="ri-user-3-fill"></i><span>colaboradores</span></a>
                </li>
               <li>
                <a href="<?php echo base_url();?>area/index" class="iq-waves-effect"><i class="ri-group-fill"></i><span>areas</span></a>
                </li>
                <li>
                    <a href="#tipnovedad" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-tasks"></i><span>incidencias</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="tipnovedad" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="<?php echo base_url();?>Category/index"  class="iq-waves-effect"><i class="ri-bookmark-fill"></i><span>categoria</span></a></li>
                        <li><a href="<?php echo base_url();?>typeincident/index" class="iq-waves-effect"><i class="ri-device-fill"></i><span>tipo incidencia</span></a></li>
                    </ul>
                </li>
                <li>
                <a href="<?php echo base_url();?>user/index" class="iq-waves-effect"><i class="fa fa-user-circle"></i><span>usuarios</span></a>
                </li>
                <li>
                <a href="<?php echo base_url();?>report/index" class="iq-waves-effect"><i class="fa fa-download"></i><span>reportes</span></a>
                </li>
                <?php }?>
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
<div id="content-page" class="content-page">

 <!-- sweetalert -->
<script src="<?php echo site_url();?>resources/lib/sweetalert/sweetalert.min.js"></script>






