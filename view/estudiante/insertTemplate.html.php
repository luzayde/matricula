<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php view::includePartial('default/menuPrincipal') ?>
<h1>NUEVO ESTUDIANTE</h1>
<?php
view::includePartial('estudiante/form', array('objCiudad' => $objCiudad,
    'objMadre' => $objMadre, 'objPadre' => $objPadre, 'objRh' => $objRh,
    'objTipoId' => $objTipoId, 'objDiscapacidad' => $objDiscapacidad))
?>
