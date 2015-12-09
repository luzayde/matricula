<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\config\configClass ?>
<?php
use mvc\view\viewClass as view ?>
<?php // header("Content-type: image/jpeg");                                  ?>
<?php view::includePartial('default/menuPrincipal') ?>
<div class="container container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
          <div class="item active text-center" style="text-align: center">
            <img src="<?php echo routing::getInstance()->getUrlImg("alumnos 1.jpg") ?>" alt="..." style="max-width: 400px; margin: 0 auto;">
          </div>
          <div class="item">
            <img src="<?php echo routing::getInstance()->getUrlImg("alumnos 2.jpg") ?>" alt="..." style="width: 100%; max-width: 400px; margin: 0 auto;">
          </div>
          <div class="item">
            <img src="<?php echo routing::getInstance()->getUrlImg("alumnos 3.jpg") ?>" alt="..." style="max-width: 400px; max-height: 225px; margin: 0 auto;">
          </div>
        </div>

        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      MISION
      <p>
        En el presente artículo, se incluye una breve descripción del significado (aplicado a empresas y organizaciones) de los terminos misión y visión, las diferencias que tienen conceptualmente entre ambos y el caso en el que se fusionan o equivalen a lo mismo. Esto, con la finalidad de brindar una básica pero útil referencia a todos aquellos empresarios o ejecutivos que se encuentran en la delicada tarea de elaborar un plan estratégico para su empresa u organización.
      </p>
    </div>
    <div class="col-lg-6">
      VISION
      <p>
        Se refiere a lo que la empresa quiere crear, la imagén futura de la organización.

        La visión es creada por la persona encargada de dirigir la empresa, y quien tiene que valorar e incluir en su análisis muchas de las aspiraciones de los agentes que componen la organización, tanto internos como externos.

        La visión se realiza formulando una imagen ideal del proyecto y poniéndola por escrito, a fin de crear el sueño (compartido por todos los que tomen parte en la iniciativa) de lo que debe ser en el futuro la empresa.

        Una vez que se tiene definida la visión de la empresa, todas las acciones se fijan en este punto y las decisiones y dudas se aclaran con mayor facilidad. Todo miembro que conozca bien la visión de la empresa, puede tomar decisiones acorde con ésta.
      </p>
    </div>
  </div>
</div>