<?php

use mvc\routing\routingClass as routing ?>
<?php use mvc\config\configClass as config ?>



<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo routing::getInstance()->getUrlWeb(config::getDefaultModule(), config::getDefaultAction()) ?>">Home |</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="<?php echo routing::getInstance()->getUrlWeb("estudiante", "index") ?>" > Estudiante <span></span></a>
        </li>
        <li class="dropdown">
          <a href="<?php echo routing::getInstance()->getUrlWeb("boletin", "index") ?>">Boletin <span></span></a>
        </li>
        <li class="dropdown">
          <a href="<?php echo routing::getInstance()->getUrlWeb("matricula", "index") ?>">Matricula<span></span></a>
        </li>
        <li class="dropdown">
          <a href="<?php echo routing::getInstance()->getUrlWeb("acudiente", "index") ?>">Acudiente<span></span></a>
        </li>
        <li class="dropdown">
          <a href="<?php echo routing::getInstance()->getUrlWeb("default", "index") ?>">Usuario<span></span></a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Sesion <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Perfil</a></li>
            <li><a href="#">Cambiar Contraseña</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'logout') ?>">Cerrar Sesion</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
