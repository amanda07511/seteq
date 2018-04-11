 <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="appNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?=base_url()?>index.php/welcome"><i class="fas fa-arrow-left"></i></a>
        <a class="navbar-brand js-scroll-trigger" >Gestor de documentos SETEQ</a>
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item" >
              <div class="dropdown">

              <a class="nav-link js-scroll-trigger" data-toggle="dropdown" href="#">
                <?=$this->session->userdata('nombre')?>
                <?=$this->session->userdata('apellido')?>  &nbsp;
                <i class="fas fa-user-circle fa-3x"></i></a>
              <ul class="dropdown-menu" id="subNav">
                <li><a class="nav-link js-scroll-trigger" href="<?=base_url()?>index.php/cLogin/logout" style=" color: #1b1e21;">Cerrar sesión</a></li>
              </ul> 
          </li>
        </ul>

      </div>
    </nav>

    