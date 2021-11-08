<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="index.html">

        <img src="<?php echo base_url();?>resources/images/inicio.png" class="img-fluid" alt="">
        <span>Appreport</span>
        </a>
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
                        <li><a href="<?php echo base_url();?>novelty/abiertas"   class="iq-waves-effect"><i class="ri-book-open-fill"></i><span>novedades abiertas</span></a></li>
                        <li><a href="<?php echo base_url();?>novelty/cerradas"   class="iq-waves-effect"><i class="fa fa-book"></i><span>novedades cerradas</span></a></li>
                    </ul>
                </li>
                <?php if ($this->session->userdata('rol_id')== 1){?>
                <li>
                <a href="<?php echo base_url();?>collaborator/index" class="iq-waves-effect"><i class="fa fa-users"></i><span>colaboradores</span></a>
                </li>
                <?php }?>
                <?php if ($this->session->userdata('rol_id')== 1){?>
                    <li>
                    <a href="#areas" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-building"></i><span>Departamentos</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="areas" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="<?php echo base_url();?>area/index" class="iq-waves-effect"><i class="las la-city"></i><span>Areas</span></a></li>
                        <li><a href="<?php echo base_url();?>seccion/index" class="iq-waves-effect"><i class="fa fa-id-card"></i><span>Secciones</span></a></li>
                    </ul>
                </li>
                <?php }?>
                <?php if ($this->session->userdata('rol_id')== 1){?>
                <li>
                    <a href="#tipnovedad" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-tasks"></i><span>incidencias</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="tipnovedad" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="<?php echo base_url();?>Category/index"  class="iq-waves-effect"><i class="ri-bookmark-fill"></i><span>categoria</span></a></li>
                        <li><a href="<?php echo base_url();?>typeincident/index" class="iq-waves-effect"><i class="ri-device-fill"></i><span>tipo incidencia</span></a></li>
                    </ul>
                </li>
                <?php }?>
                <?php if ($this->session->userdata('rol_id')== 1){?>
                <li>
                <a href="<?php echo base_url();?>user/index" class="iq-waves-effect"><i class="fa fa-address-book"></i><span>usuarios</span></a>
                </li>
                <?php }?>
                <?php if ($this->session->userdata('rol_id')== 1){?>
                <li>
                <a href="<?php echo base_url();?>boss/index" class="iq-waves-effect"><i class="ri-account-box-fill"></i><span>jefes</span></a>
                </li>
                <?php }?>
                <?php if ($this->session->userdata('rol_id')== 1 || $this->session->userdata('rol_id')== 3 ){?>
                <li>
                    <a href="#reportes" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-download"></i><span>reportes</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="reportes" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="<?php echo base_url();?>report/index" class="iq-waves-effect"><i class="fa fa-download"></i><span>Todos</span></a></li>
                        <li><a href="<?php echo base_url();?>report/CallCenter" class="iq-waves-effect"><i class="fa fa-download"></i><span>Call center</span></a></li>
                        <li><a href="<?php echo base_url();?>report/GestionRiesgo" class="iq-waves-effect"><i class="fa fa-download"></i><span>Gestion del Riesgo</span></a></li>
                        <li><a href="<?php echo base_url();?>report/Referencias" class="iq-waves-effect"><i class="fa fa-download"></i><span>Ref/Contrareferencia</span></a></li>
                        <li><a href="<?php echo base_url();?>report/Tecnologia" class="iq-waves-effect"><i class="fa fa-download"></i><span>Tecnología</span></a></li>
                    </ul>
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








